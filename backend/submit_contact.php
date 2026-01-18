<?php
session_start();
require_once 'config/conn.php';

// PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../backend/vendor/autoload.php'; // Adjust path to your PHPMailer autoload

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Get form data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate inputs
if (empty($name) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Get patient ID if logged in
$patient_id = null;
if (!empty($_SESSION['PK_tbluser'])) {
    $user_id = $_SESSION['PK_tbluser'];
    $patient_query = "SELECT PK_tblpatient FROM tblpatient WHERE FK_tbluser = ?";
    $stmt = $conn->prepare($patient_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $patient_id = $row['PK_tblpatient'];
    }
    $stmt->close();
}

// Insert into database
$insert_query = "INSERT INTO tblcontactmessages (FK_tblpatient, name, email, phone, subject, message, status, is_active) 
                 VALUES (?, ?, ?, ?, ?, ?, 'Pending', 1)";
$stmt = $conn->prepare($insert_query);
$stmt->bind_param("isssss", $patient_id, $name, $email, $phone, $subject, $message);

if (!$stmt->execute()) {
    echo json_encode(['success' => false, 'message' => 'Failed to save message']);
    $stmt->close();
    exit;
}
$stmt->close();

// Send email notification
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'onlineappointmentsystem00@gmail.com'; // Your Gmail
    $mail->Password = 'your_app_password_here'; // Use App Password, not regular password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('onlineappointmentsystem00@gmail.com', 'Online Appointment System');
    $mail->addAddress('onlineappointmentsystem00@gmail.com'); // Clinic email
    $mail->addReplyTo($email, $name); // User can reply directly to sender

    // Content
    $mail->isHTML(true);
    $mail->Subject = "Contact Form: $subject";
    
    $emailBody = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background-color: #2f9e8f; color: white; padding: 20px; text-align: center; }
            .content { background-color: #f9f9f9; padding: 20px; margin-top: 20px; }
            .info-row { margin-bottom: 15px; }
            .label { font-weight: bold; color: #2f9e8f; }
            .message-box { background-color: white; padding: 15px; border-left: 4px solid #2f9e8f; margin-top: 15px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
            </div>
            <div class='content'>
                <div class='info-row'>
                    <span class='label'>Name:</span> $name
                </div>
                <div class='info-row'>
                    <span class='label'>Email:</span> $email
                </div>
                <div class='info-row'>
                    <span class='label'>Phone:</span> $phone
                </div>
                <div class='info-row'>
                    <span class='label'>Subject:</span> $subject
                </div>
                <div class='message-box'>
                    <p class='label'>Message:</p>
                    <p>" . nl2br(htmlspecialchars($message)) . "</p>
                </div>
                <p style='margin-top: 20px; color: #666; font-size: 12px;'>
                    Submitted on: " . date('F d, Y h:i A') . "
                </p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $mail->Body = $emailBody;
    $mail->AltBody = "New contact form submission from $name ($email)\n\nSubject: $subject\n\nMessage:\n$message\n\nPhone: $phone";

    $mail->send();
    
    // Also send confirmation to the user
    $confirmMail = new PHPMailer(true);
    $confirmMail->isSMTP();
    $confirmMail->Host = 'smtp.gmail.com';
    $confirmMail->SMTPAuth = true;
    $confirmMail->Username = 'onlineappointmentsystem00@gmail.com';
    $confirmMail->Password = 'your_app_password_here';
    $confirmMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $confirmMail->Port = 587;
    
    $confirmMail->setFrom('onlineappointmentsystem00@gmail.com', 'Online Appointment System');
    $confirmMail->addAddress($email, $name);
    
    $confirmMail->isHTML(true);
    $confirmMail->Subject = "We received your message - Online Appointment System";
    
    $confirmBody = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background-color: #2f9e8f; color: white; padding: 20px; text-align: center; }
            .content { background-color: #f9f9f9; padding: 20px; margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Thank You for Contacting Us</h2>
            </div>
            <div class='content'>
                <p>Dear $name,</p>
                <p>We have received your message regarding: <strong>$subject</strong></p>
                <p>Our support team will review your message and respond within 24 hours.</p>
                <p>If you need immediate assistance, please call us at +63 9127339200.</p>
                <p style='margin-top: 30px;'>Best regards,<br>Online Appointment System Team</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $confirmMail->Body = $confirmBody;
    $confirmMail->send();
    
    echo json_encode([
        'success' => true, 
        'message' => 'Thank you for contacting us! We will respond to your message within 24 hours.'
    ]);
    
} catch (Exception $e) {
    // Message saved but email failed
    echo json_encode([
        'success' => true, 
        'message' => 'Your message has been saved. We will contact you soon.',
        'email_error' => $mail->ErrorInfo
    ]);
}
?>
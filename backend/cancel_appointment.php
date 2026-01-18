<?php
session_start();
header('Content-Type: application/json');

// Check if user is logged in
if (empty($_SESSION['is_login'])) {
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

require_once '../config/conn.php';

// Get current user ID from session
$user_id = $_SESSION['PK_tbluser'] ?? null;
$patient_id = null;

if ($user_id) {
    // Get patient ID from tblpatient
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

if (!$patient_id) {
    echo json_encode(['success' => false, 'message' => 'Patient not found']);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);
$appointment_id = $input['appointment_id'] ?? null;

if (!$appointment_id) {
    echo json_encode(['success' => false, 'message' => 'Appointment ID is required']);
    exit;
}

// Verify appointment belongs to this patient and get appointment details
$verify_query = "SELECT appointmentDate, status FROM tblappointment 
                 WHERE PK_tblappointment = ? AND FK_tblpatient = ?";
$stmt = $conn->prepare($verify_query);
$stmt->bind_param("ii", $appointment_id, $patient_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $stmt->close();
    echo json_encode(['success' => false, 'message' => 'Appointment not found or access denied']);
    exit;
}

$appointment = $result->fetch_assoc();
$stmt->close();

// Check if already cancelled
if ($appointment['status'] === 'cancelled') {
    echo json_encode(['success' => false, 'message' => 'Appointment is already cancelled']);
    exit;
}

// Check if appointment date is more than 1 day away
$apt_date = new DateTime($appointment['appointmentDate']);
$today = new DateTime();
$interval = $today->diff($apt_date);
$days_until = $interval->days;

if ($days_until <= 1) {
    echo json_encode([
        'success' => false, 
        'message' => 'Appointments within 24 hours cannot be cancelled online. Please contact our staff for assistance.'
    ]);
    exit;
}

// Update appointment status to cancelled
$update_query = "UPDATE tblappointment 
                 SET status = 'cancelled', 
                     cancelled_at = NOW(),
                     cancelled_by = ?
                 WHERE PK_tblappointment = ?";
$stmt = $conn->prepare($update_query);
$stmt->bind_param("ii", $user_id, $appointment_id);

if ($stmt->execute()) {
    $stmt->close();
    
    // Optional: Log the cancellation in a separate table
    $log_query = "INSERT INTO appointment_cancellation_log 
                  (FK_tblappointment, FK_tblpatient, FK_tbluser, cancellation_date, reason)
                  VALUES (?, ?, ?, NOW(), 'Patient cancelled online')";
    $log_stmt = $conn->prepare($log_query);
    $log_stmt->bind_param("iii", $appointment_id, $patient_id, $user_id);
    $log_stmt->execute();
    $log_stmt->close();
    
    echo json_encode(['success' => true, 'message' => 'Appointment cancelled successfully']);
} else {
    $stmt->close();
    echo json_encode(['success' => false, 'message' => 'Failed to cancel appointment']);
}

$conn->close();
?>
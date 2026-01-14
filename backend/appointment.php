<?php
include "db_conn/db.php";

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

// Collect dynamic data from POST
$patient = $input['patient'] ?? 'John Doe'; // default if not provided
$department = $input['department'] ?? 'Cardiology';   // dynamic department
$doctor = $input['doctor'] ?? 'Dr. Ana Reyes';
$date = $input['date'] ?? date('Y-m-d');
$time = $input['time'] ?? '09:30:00';
$reason = $input['reason'] ?? 'Routine Check-up / General Consultation';
$contact_number = $input['contact_number'] ?? '+63 9123456789';
$email = $input['email'] ?? 'johndoe@example.com';
$additional_information = $input['additional_information'] ?? 'No additional notes.';
$status = 'pending'; // default status

// Basic validation
if (!$department) {
    echo json_encode(["success" => false, "message" => "Department is required"]);
    exit;
}

// Escape all values
$patient_safe = mysqli_real_escape_string($conn, $patient);
$department_safe = mysqli_real_escape_string($conn, $department);
$doctor_safe = mysqli_real_escape_string($conn, $doctor);
$reason_safe = mysqli_real_escape_string($conn, $reason);
$contact_safe = mysqli_real_escape_string($conn, $contact_number);
$email_safe = mysqli_real_escape_string($conn, $email);
$notes_safe = mysqli_real_escape_string($conn, $additional_information);
$status_safe = mysqli_real_escape_string($conn, $status);

// Insert query
$sql = "INSERT INTO appointments (
    patient, department, doctor, date, time, reason, contact_number, email, additional_information, status
) VALUES (
    '$patient_safe', '$department_safe', '$doctor_safe', '$date', '$time', '$reason_safe', '$contact_safe', '$email_safe', '$notes_safe', '$status_safe'
)";

// Execute query
if (mysqli_query($conn, $sql)) {
    echo json_encode([
        "success" => true,
        "message" => "Appointment successfully booked!",
        "data" => [
            "patient" => $patient,
            "department" => $department,
            "doctor" => $doctor,
            "date" => $date,
            "time" => $time,
            "reason" => $reason
        ]
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
}
?>

<?php
include 'config/conn.php';

// Only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

// Required user input
$username = trim($input['username'] ?? 'user'.rand(1000,9999));
$password = trim($input['password'] ?? 'Password123!');
$confirm_password = trim($input['confirm_password'] ?? $password);
$fname = trim($input['fname'] ?? 'John');
$lname = trim($input['lname'] ?? 'Doe');
$email = trim($input['email'] ?? strtolower($username).'@example.com');

// Optional input with defaults
$mname = trim($input['mname'] ?? 'Middle');
$csuffix = trim($input['csuffix'] ?? 'Jr.');
$address = trim($input['address'] ?? '123 Default Street');
$cpnumber = trim($input['cpnumber'] ?? '09171234567');
$FK_tblRole = intval($input['FK_tblRole'] ?? 1); // 1 = customer
$FK_tblDepartment = intval($input['FK_tblDepartment'] ?? 1); // default department
$is_Doctor = intval($input['is_Doctor'] ?? 0);
$is_Customer = intval($input['is_Customer'] ?? 1);
$is_Staff = intval($input['is_Staff'] ?? 0);
$is_login = intval($input['is_login'] ?? 1);
$is_active = intval($input['is_active'] ?? 1);
$update_by = trim($input['update_by'] ?? 'System');

// Validate required fields
if (!$username || !$password || !$confirm_password || !$fname || !$lname || !$email) {
    echo json_encode(["success" => false, "message" => "All required fields must be filled"]);
    exit;
}

// Check password match
if ($password !== $confirm_password) {
    echo json_encode(["success" => false, "message" => "Passwords do not match"]);
    exit;
}

// Check if username exists
$sql_check = "SELECT * FROM tbluser WHERE username='$username' LIMIT 1";
$result_check = mysqli_query($conn, $sql_check);
if (!$result_check) {
    echo json_encode(["success" => false, "message" => "Database error: " . mysqli_error($conn)]);
    exit;
}

if (mysqli_num_rows($result_check) > 0) {
    echo json_encode(["success" => false, "message" => "Username already exists"]);
    exit;
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into tbluser with all columns filled
$sql_insert = "INSERT INTO tbluser (
    username, password, fname, mname, lname, csuffix, email, address, cpnumber,
    FK_tblRole, FK_tblDepartment, is_Doctor, is_Customer, is_Staff,
    is_login, is_active, created_at, updated_at, update_by
) VALUES (
    '$username', '$hashed_password', '$fname', '$mname', '$lname', '$csuffix', '$email', '$address', '$cpnumber',
    $FK_tblRole, $FK_tblDepartment, $is_Doctor, $is_Customer, $is_Staff,
    $is_login, $is_active, NOW(), NOW(), '$update_by'
)";

if (mysqli_query($conn, $sql_insert)) {
    echo json_encode([
        "success" => true,
        "message" => "Registration successful. Redirecting...",
        // "redirect" => "../../frontend/pages/home.php"
        "redirect" => "http://appointment-system.test/frontend/pages/home.php"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Registration failed: " . mysqli_error($conn)
    ]);
}
?>

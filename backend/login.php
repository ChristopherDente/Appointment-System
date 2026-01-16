<?php
include 'config/conn.php';

// Only POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);
$username = trim($input['username'] ?? '');
$password = trim($input['password'] ?? '');

if ($username === '' || $password === '') {
    echo json_encode(["success" => false, "message" => "Username and password are required"]);
    exit;
}

// Fetch user by username
$sql = "SELECT * FROM tbluser WHERE username = '$username' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode(["success" => false, "message" => "Database error: " . mysqli_error($conn)]);
    exit;
}

$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    // Login successful
    echo json_encode([
        "success" => true,
        "message" => "Login successful",
        "redirect" => "http://appointment-system.test/frontend/pages/home.php"
    ]);
    exit;
}

// Invalid credentials
echo json_encode(["success" => false, "message" => "Invalid username or password"]);
exit;

<?php
include "db_conn/db.php";

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);
$username = mysqli_real_escape_string($conn, $input['username'] ?? '');
$password = $input['password'] ?? '';
$confirm_password = $input['confirm_password'] ?? '';

if (!$username || !$password || !$confirm_password) {
    echo json_encode(["success" => false, "message" => "All fields are required"]);
    exit;
}

if ($password !== $confirm_password) {
    echo json_encode(["success" => false, "message" => "Passwords do not match"]);
    exit;
}

// Check if username already exists
$sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo json_encode(["success" => false, "message" => "Username already exists"]);
    exit;
}

// Insert new user (plain text password)
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => true, "message" => "Registration successful. You can now login"]);
} else {
    echo json_encode(["success" => false, "message" => "Registration failed. Try again"]);
}
?>

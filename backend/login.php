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

if (!$username || !$password) {
    echo json_encode(["success" => false, "message" => "Username and password are required"]);
    exit;
}

// Check user in database (plain text password)
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($user) {
    // Start session
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    echo json_encode([
        "success" => true,
        "message" => "Login successful",
        "redirect" => "../frontend/user/dashboard.php" // adjust path if needed
    ]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid credentials"]);
}
?>

 

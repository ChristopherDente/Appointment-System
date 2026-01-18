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
    // Update is_login in database
    $update_sql = "UPDATE tbluser SET is_login = 1 WHERE PK_tbluser = ?";
    $stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($stmt, "i", $user['PK_tbluser']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Start session and set session variables
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['is_login'] = true;
    $_SESSION['PK_tbluser'] = $user['PK_tbluser'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['FK_tblRole'] = $user['FK_tblRole']; 
 

    // Login successful
    echo json_encode([
        "success" => true,
        "message" => "Login successful",
         "redirect" => "frontend/pages/home.php"
        //"redirect" => "http://appointment-system.test/frontend/pages/home.php"
    ]);
    exit;
}


// Invalid credentials
echo json_encode(["success" => false, "message" => "Invalid username or password"]);
exit;
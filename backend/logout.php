<?php
session_start();
include 'config/conn.php';

if (isset($_SESSION['PK_tbluser'])) {
    $user_id = $_SESSION['PK_tbluser'];
    // Reset is_login in database
    $update_sql = "UPDATE tbluser SET is_login = 0 WHERE PK_tbluser = ?";
    $stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Destroy session
session_unset();
session_destroy();

// Redirect to home
header("Location: ../index.php");
exit;

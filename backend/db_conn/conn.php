<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "appoitmentsystem";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    error_log("Database connection failed: " . $e->getMessage(), 3, "error_log.txt");
    exit("Database connection failed!");
}
?>
<!-- php
$conn = mysqli_connect("127.0.0.1", "root", "@ABC12abc", "appointment_db");

if (!$conn) {
    die("Database connection failed");
}
 
?> -->

<?php
$serverName = "(localdb)\\AppointmentDB";

$connectionOptions = array(
    "Database" => "LIVEAppointmenBookingtDB",
    "TrustServerCertificate" => true
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


?>


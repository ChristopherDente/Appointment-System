<?php

// CHANGE THIS ONLY
$DB_DRIVER = 'sqlsrv'; // 'mysql' or 'sqlsrv'

if ($DB_DRIVER === 'mysql') {

    $conn = mysqli_connect(
        "127.0.0.1",
        "root",
        "@ABC12abc",
        "appointment_db"
    );

    if (!$conn) {
        die("MySQL connection failed: " . mysqli_connect_error());
    }

}

if ($DB_DRIVER === 'sqlsrv') {

    $serverName = "(localdb)\\AppointmentDB";

    $connectionOptions = array(
        "Database" => "LIVEAppointmenBookingtDB",
        "TrustServerCertificate" => true
    );

    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

}

?>

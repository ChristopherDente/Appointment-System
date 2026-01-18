<?php
header('Content-Type: application/json');
require_once '../../backend/config/conn.php';

$department_id = isset($_GET['department_id']) ? intval($_GET['department_id']) : 0;

if ($department_id <= 0) {
    echo json_encode([]);
    exit;
}

// Get doctors from the selected department
$query = "SELECT DISTINCT
    d.PK_tbldoctors,
    CONCAT(u.fname, ' ', IFNULL(CONCAT(u.mname, ' '), ''), u.lname) AS name,
    d.specialization,
    u.email
FROM tbldoctors d
INNER JOIN tbluser u ON d.FK_tbluser = u.PK_tbluser
WHERE u.FK_tblDepartment = ?
AND u.is_Doctor = 1
AND u.is_active = 1
AND d.is_active = 1
AND EXISTS (
    SELECT 1 
    FROM tbldoctorschedule ds 
    WHERE ds.FK_tbldoctors = d.PK_tbldoctors 
    AND ds.is_available = 1
)
ORDER BY u.fname, u.lname";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $department_id);
$stmt->execute();
$result = $stmt->get_result();

$doctors = [];
while ($row = $result->fetch_assoc()) {
    $doctors[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($doctors);
?>
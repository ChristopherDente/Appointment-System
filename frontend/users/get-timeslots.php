<?php
header('Content-Type: application/json');
require_once '../../backend/config/conn.php';

$doctor_id = isset($_GET['doctor_id']) ? intval($_GET['doctor_id']) : 0;
$date = isset($_GET['date']) ? $_GET['date'] : '';

if ($doctor_id <= 0 || empty($date)) {
    echo json_encode([]);
    exit;
}

// Get schedules for this doctor on this specific date
$query = "SELECT 
    ds.PK_tbldoctorschedule as schedule_id,
    ds.dateSched,
    ds.time_start,
    ds.time_end,
    ds.max_patients,
    ds.is_available,
    ds.FK_clinicdays as clinic_day_id,
    cd.dayname,
    COALESCE(
        (SELECT COUNT(*) 
         FROM tblappointments 
         WHERE FK_doctorschedule = ds.PK_tbldoctorschedule 
         AND appointment_date = ?
         AND status IN ('Pending', 'Approved')
         AND is_active = 1), 
        0
    ) as current_patients
FROM tbldoctorschedule ds
LEFT JOIN tbclinicdays cd ON ds.FK_clinicdays = cd.PK_tblClinicDays
WHERE ds.FK_tbldoctors = ?
AND ds.dateSched = ?
AND ds.is_available = 1
ORDER BY ds.time_start";

$stmt = $conn->prepare($query);
$stmt->bind_param("sis", $date, $doctor_id, $date);
$stmt->execute();
$result = $stmt->get_result();

$slots = [];
while ($row = $result->fetch_assoc()) {
    $row['available'] = ($row['current_patients'] < $row['max_patients']);
    $slots[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($slots);
?>
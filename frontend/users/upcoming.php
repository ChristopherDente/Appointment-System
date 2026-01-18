<?php
session_start();

if (empty($_SESSION['is_login'])) {
    header("Location: ../../index.php");
    exit;
}

require_once '../../backend/config/conn.php';

// Get current user ID from session
$user_id = $_SESSION['PK_tbluser'] ?? null;
$patient_id = null;

if ($user_id) {
    // Get patient ID from tblpatient
    $patient_query = "SELECT PK_tblpatient FROM tblpatient WHERE FK_tbluser = ?";
    $stmt = $conn->prepare($patient_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $patient_id = $row['PK_tblpatient'];
    }
    $stmt->close();
}

// Fetch upcoming appointments from database
$appointments = [];
if ($patient_id) {
    $query = "SELECT 
                a.PK_tblappointments,
                a.appointment_date,
                a.appointment_time,
                a.reasonForVisit,
                a.status,
                 
                u.fname as doc_firstName,
                u.lname as doc_lastName,
                dept.departmentName,
                a.created_at
              FROM tblappointments a
              LEFT JOIN tbldoctors d ON a.FK_tbldoctors = d.PK_tbldoctors
              LEFT JOIN tbldepartment dept ON a.FK_department = dept.PK_tblDepartment
              LEFT JOIN tbluser u ON d.FK_tbluser = u.PK_tbluser
              WHERE a.FK_tblpatient = ? 
              AND a.appointment_date >= CURDATE()
              AND a.status NOT IN ('cancelled', 'completed')
              ORDER BY a.appointment_date ASC, a.appointment_time ASC";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
    $stmt->close();
}

// Calculate statistics
$total_upcoming = count($appointments);
$this_week = 0;
$pending_count = 0;

foreach ($appointments as $apt) {
    $apt_date = new DateTime($apt['appointment_date']);
    $today = new DateTime();
    $week_end = (clone $today)->modify('+7 days');
    
    if ($apt_date >= $today && $apt_date <= $week_end) {
        $this_week++;
    }
    
    if ($apt['status'] === 'pending') {
        $pending_count++;
    }
}

// Helper function to calculate days until appointment
function getDaysUntil($date) {
    $apt_date = new DateTime($date);
    $today = new DateTime();
    $interval = $today->diff($apt_date);
    return $interval->days;
}

// Helper function to check if cancellation is allowed
function canCancel($appointment_date) {
    $apt_date = new DateTime($appointment_date);
    $today = new DateTime();
    $interval = $today->diff($apt_date);
    return $interval->days > 1; // Can cancel if more than 1 day away
}

// Helper function to get filter category
function getFilterCategory($date) {
    $apt_date = new DateTime($date);
    $today = new DateTime();
    $week_end = (clone $today)->modify('+7 days');
    $month_end = (clone $today)->modify('+30 days');
    
    $filters = ['all'];
    
    if ($apt_date->format('Y-m-d') === $today->format('Y-m-d')) {
        $filters[] = 'today';
    }
    
    if ($apt_date >= $today && $apt_date <= $week_end) {
        $filters[] = 'week';
    }
    
    if ($apt_date >= $today && $apt_date <= $month_end) {
        $filters[] = 'month';
    }
    
    return implode(' ', $filters);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upcoming Appointments - Online Appointment System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body>
    <!-- navbar -->
    <?php include '../context/navbar.php'; ?>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="home.php" class="text-white text-decoration-none me-3">
                    <i class="bi bi-arrow-left fs-4"></i>
                </a>
                <div>
                    <h2 class="fw-bold mb-1">Upcoming Appointments</h2>
                    <p class="mb-0 opacity-90">View and manage your scheduled appointments</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container pb-5">
        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <div class="filter-tab active" onclick="filterAppointments('all')">
                <i class="bi bi-calendar-check"></i> All
            </div>
            <div class="filter-tab" onclick="filterAppointments('today')">
                <i class="bi bi-calendar-day"></i> Today
            </div>
            <div class="filter-tab" onclick="filterAppointments('week')">
                <i class="bi bi-calendar-week"></i> This Week
            </div>
            <div class="filter-tab" onclick="filterAppointments('month')">
                <i class="bi bi-calendar-month"></i> This Month
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- Appointments List -->
                <div id="appointmentsList">
                    <?php if (empty($appointments)): ?>
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="bi bi-calendar-x"></i>
                            </div>
                            <h4 class="fw-semibold mb-2">No Upcoming Appointments</h4>
                            <p class="text-muted mb-4">You don't have any scheduled appointments.</p>
                            <a href="book.php" class="btn btn-doctor">
                                <i class="bi bi-calendar-plus"></i> Book Appointment
                            </a>
                        </div>
                    <?php else: ?>
                        <?php foreach ($appointments as $apt): 
                            $days_until = getDaysUntil($apt['appointment_date']);
                            $can_cancel = canCancel($apt['appointment_date']);
                            $filter_cats = getFilterCategory($apt['appointment_date']);
                            
                            // Format date
                            $apt_datetime = new DateTime($apt['appointment_date']);
                            $formatted_date = $apt_datetime->format('D, M d, Y');
                            
                            // Status badge class
                            $status_class = 'status-' . strtolower($apt['status']);
                            $status_display = ucfirst($apt['status']);
                        ?>
                        <div class="appointment-card" data-filter="<?php echo $filter_cats; ?>">
                            <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
                                <span class="appointment-status <?php echo $status_class; ?>">
                                    <?php echo $status_display; ?>
                                </span>
                                <span class="countdown-badge <?php echo $days_until == 0 ? 'urgent-badge' : ''; ?>">
                                    <i class="bi bi-<?php echo $days_until == 0 ? 'alarm' : 'clock-history'; ?>"></i>
                                    <?php 
                                        if ($days_until == 0) {
                                            echo 'Today at ' . date('g:i A', strtotime($apt['appointment_time']));
                                        } elseif ($days_until == 1) {
                                            echo 'Tomorrow';
                                        } else {
                                            echo 'In ' . $days_until . ' days';
                                        }
                                    ?>
                                </span>
                            </div>

                            <div class="doctor-info">
                                <div class="doctor-avatar">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div>
                                    <h5 class="fw-semibold mb-1">
                                        Dr. <?php echo htmlspecialchars($apt['doc_firstName'] . ' ' . $apt['doc_lastName']); ?>
                                    </h5>
                                    <p class="text-muted mb-0 small">
                                        <?php echo htmlspecialchars($apt['departmentName']); ?>
                                    </p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="info-badge">
                                    <i class="bi bi-calendar"></i>
                                    <span><?php echo $formatted_date; ?></span>
                                </div>
                                <div class="info-badge">
                                    <i class="bi bi-clock"></i>
                                    <span><?php echo date('g:i A', strtotime($apt['appointment_time'])); ?></span>
                                </div>
                                <?php if (!empty($apt['roomLocation'])): ?>
                                <div class="info-badge">
                                    <i class="bi bi-geo-alt"></i>
                                    <span><?php echo htmlspecialchars($apt['roomLocation']); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($apt['reason'])): ?>
                            <div class="mb-3">
                                <p class="mb-1 small text-muted">Reason:</p>
                                <p class="mb-0"><?php echo htmlspecialchars($apt['reason']); ?></p>
                            </div>
                            <?php endif; ?>

                            <?php if ($apt['status'] === 'pending'): ?>
                            <div class="alert alert-warning border-0 mb-3"
                                style="background-color: #fef3c7; color: #92400e;">
                                <i class="bi bi-info-circle"></i>
                                <small>Awaiting confirmation. You'll be notified soon.</small>
                            </div>
                            <?php endif; ?>

                            <?php if (!$can_cancel && $days_until <= 1): ?>
                            <div class="alert alert-danger border-0 mb-3">
                                <i class="bi bi-exclamation-triangle"></i>
                                <small>Cannot cancel appointments within 24 hours. Please contact staff for assistance.</small>
                            </div>
                            <?php endif; ?>

                            <div class="action-buttons">
                                <button class="btn btn-outline-doctor btn-sm-custom" 
                                        onclick="viewDetails(<?php echo $apt['PK_tblappointments']; ?>)">
                                    <i class="bi bi-eye"></i> Details
                                </button>
                                <button class="btn btn-outline-doctor btn-sm-custom" 
                                        onclick="reschedule(<?php echo $apt['PK_tblappointments']; ?>)">
                                    <i class="bi bi-calendar-event"></i> Reschedule
                                </button>
                                <button class="btn btn-outline-danger btn-sm-custom" 
                                        onclick="cancelAppointment(<?php echo $apt['PK_tblappointments']; ?>, <?php echo $can_cancel ? 'true' : 'false'; ?>)"
                                        <?php echo !$can_cancel ? 'disabled' : ''; ?>>
                                    <i class="bi bi-x-circle"></i> Cancel
                                </button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Empty State (for filtered results) -->
                <div class="empty-state" id="emptyState" style="display: none;">
                    <div class="empty-icon">
                        <i class="bi bi-calendar-x"></i>
                    </div>
                    <h4 class="fw-semibold mb-2">No Appointments Found</h4>
                    <p class="text-muted mb-4">You don't have any upcoming appointments in this period.</p>
                    <a href="book.php" class="btn btn-doctor">
                        <i class="bi bi-calendar-plus"></i> Book Appointment
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card-doctor p-4 sticky-top" style="top: 20px;">
                    <h5 class="fw-semibold mb-3">
                        <i class="bi bi-info-circle text-doctor"></i> Quick Info
                    </h5>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Total Upcoming:</span>
                            <span class="fw-bold text-doctor fs-4"><?php echo $total_upcoming; ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">This Week:</span>
                            <span class="fw-bold"><?php echo $this_week; ?></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Pending:</span>
                            <span class="fw-bold"><?php echo $pending_count; ?></span>
                        </div>
                    </div>

                    <hr>

                    <div class="alert alert-info border-0 mb-3" style="background-color: #e6f4f1; color: #2f9e8f;">
                        <h6 class="fw-semibold mb-2">
                            <i class="bi bi-lightbulb"></i> Reminder
                        </h6>
                        <small>
                            Please arrive 15 minutes before your scheduled appointment time.
                        </small>
                    </div>

                    <div class="alert alert-warning border-0 mb-3" style="background-color: #fef3c7; color: #92400e;">
                        <h6 class="fw-semibold mb-2">
                            <i class="bi bi-exclamation-triangle"></i> Cancellation Policy
                        </h6>
                        <small>
                            Appointments can only be cancelled if there is more than 1 day until the scheduled date. 
                            For last-minute cancellations, please contact our staff.
                        </small>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="book.php" class="btn btn-doctor">
                            <i class="bi bi-calendar-plus"></i> Book New
                        </a>
                        <a href="history.php" class="btn btn-outline-doctor">
                            <i class="bi bi-journal-text"></i> View History
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../context/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function filterAppointments(filter) {
        // Update active tab
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        event.target.closest('.filter-tab').classList.add('active');

        // Filter appointments
        const appointments = document.querySelectorAll('.appointment-card');
        let visibleCount = 0;

        appointments.forEach(card => {
            const filters = card.getAttribute('data-filter').split(' ');
            if (filters.includes(filter)) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide empty state
        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function viewDetails(appointmentId) {
        window.location.href = `appointment_details.php?id=${appointmentId}`;
    }

    function reschedule(appointmentId) {
        if (confirm('Do you want to reschedule this appointment?')) {
            window.location.href = `reschedule.php?id=${appointmentId}`;
        }
    }

    function cancelAppointment(appointmentId, canCancel) {
        if (!canCancel) {
            alert('This appointment cannot be cancelled online as it is within 24 hours of the scheduled time. Please contact our staff for assistance.');
            return;
        }

        if (confirm('Are you sure you want to cancel this appointment? This action cannot be undone.')) {
            // Send cancellation request to backend
            fetch('../../backend/patient/cancel_appointment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    appointment_id: appointmentId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Appointment cancelled successfully');
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to cancel appointment'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while cancelling the appointment');
            });
        }
    }
    </script>
</body>

</html>
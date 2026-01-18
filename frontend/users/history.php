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

// Fetch PAST appointments (Completed, Cancelled, No-Show)
$appointments = [];
if ($patient_id) {
    $query = "SELECT 
                a.PK_tblappointments,
                a.appointment_date,
                a.appointment_time,
                a.reasonForVisit,
                a.status,
                a.created_at,
                u.fname as doc_firstName,
                u.lname as doc_lastName,
                dept.departmentName
              FROM tblappointments a
              LEFT JOIN tbldoctors d ON a.FK_tbldoctors = d.PK_tbldoctors
              LEFT JOIN tbldepartment dept ON a.FK_department = dept.PK_tblDepartment
              LEFT JOIN tbluser u ON d.FK_tbluser = u.PK_tbluser
              WHERE a.FK_tblpatient = ? 
              AND (
                  a.status IN ('Completed', 'Cancelled', 'No-Show')
                  OR a.appointment_date < CURDATE()
              )
              ORDER BY a.appointment_date DESC, a.appointment_time DESC";
    
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
$total_visits = count($appointments);
$Completed_count = 0;
$Cancelled_count = 0;
$no_show_count = 0;

foreach ($appointments as $apt) {
    switch ($apt['status']) {
        case 'Completed':
            $Completed_count++;
            break;
        case 'Cancelled':
            $Cancelled_count++;
            break;
        case 'No-Show':
            $no_show_count++;
            break;
    }
}

// Group appointments by year
$appointments_by_year = [];
foreach ($appointments as $apt) {
    $year = date('Y', strtotime($apt['appointment_date']));
    if (!isset($appointments_by_year[$year])) {
        $appointments_by_year[$year] = [];
    }
    $appointments_by_year[$year][] = $apt;
}

// Sort years in descending order
krsort($appointments_by_year);

// Helper functions
function formatDate($date) {
    return date('F j, Y', strtotime($date));
}

function formatTime($time) {
    return date('g:i A', strtotime($time));
}

function getStatusBadgeClass($status) {
    switch ($status) {
        case 'Completed':
            return 'status-completed';
        case 'Cancelled':
            return 'status-cancelled';
        case 'No-Show':
            return 'status-no-show';
        default:
            return 'status-pending';
    }
}

function getStatusText($status) {
    switch ($status) {
        case 'Completed':
            return 'Completed';
        case 'Cancelled':
            return 'Cancelled';
        case 'No-Show':
            return 'No Show';
        default:
            return ucfirst($status);
    }
}

function getMarkerClass($status) {
    switch ($status) {
        case 'Completed':
            return 'Completed';
        case 'Cancelled':
            return 'Cancelled';
        case 'No-Show':
            return 'No-Show';
        default:
            return 'pending';
    }
}

function getMarkerIcon($status) {
    switch ($status) {
        case 'Completed':
            return 'bi-check';
        case 'Cancelled':
            return 'bi-x';
        case 'No-Show':
            return 'bi-exclamation';
        default:
            return 'bi-clock';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Appointment History - Online Appointment System</title>
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
                    <h2 class="fw-bold mb-1">Appointment History</h2>
                    <p class="mb-0 opacity-90">Complete record of all your past appointments</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container pb-5">
        <!-- Statistics -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="stat-card-small">
                    <div class="stat-number"><?php echo $total_visits; ?></div>
                    <div class="stat-label">Total Visits</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card-small">
                    <div class="stat-number"><?php echo $Completed_count; ?></div>
                    <div class="stat-label">Completed</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card-small">
                    <div class="stat-number"><?php echo $Cancelled_count; ?></div>
                    <div class="stat-label">Cancelled</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card-small">
                    <div class="stat-number"><?php echo $no_show_count; ?></div>
                    <div class="stat-label">No Show</div>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="search-filter-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" class="form-control" id="searchInput"
                            placeholder="Search by doctor name, department, or reason..." onkeyup="searchHistory()">
                    </div>
                </div>
                <div class="col-md-4 mt-3 mt-md-0">
                    <select class="form-select" style="border-radius: 12px; border: 2px solid #e5e7eb;"
                        onchange="filterByYear(this.value)">
                        <option value="all">All Years</option>
                        <?php
                        foreach (array_keys($appointments_by_year) as $year) {
                            $selected = ($year == date('Y')) ? 'selected' : '';
                            echo "<option value='$year' $selected>$year</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="filter-pills">
                <div class="filter-pill active" onclick="filterByStatus('all')">All</div>
                <div class="filter-pill" onclick="filterByStatus('Completed')">
                    <i class="bi bi-check-circle"></i> Completed
                </div>
                <div class="filter-pill" onclick="filterByStatus('Cancelled')">
                    <i class="bi bi-x-circle"></i> Cancelled
                </div>
                <div class="filter-pill" onclick="filterByStatus('No-Show')">
                    <i class="bi bi-exclamation-circle"></i> No Show
                </div>
            </div>
        </div>

        <!-- Timeline -->
        <div class="timeline" id="historyTimeline">
            <?php if (empty($appointments)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-inbox display-1 text-muted"></i>
                    <h4 class="mt-3 text-muted">No appointment history</h4>
                    <p class="text-muted">Your past appointments will appear here</p>
                </div>
            <?php else: ?>
                <?php foreach ($appointments_by_year as $year => $year_appointments): ?>
                    <!-- Year Divider -->
                    <div class="year-divider" data-year="<?php echo $year; ?>">
                        <span><?php echo $year; ?></span>
                    </div>

                    <?php foreach ($year_appointments as $apt): ?>
                        <!-- Appointment Item -->
                        <div class="timeline-item" data-status="<?php echo $apt['status']; ?>" data-year="<?php echo $year; ?>">
                            <div class="timeline-marker <?php echo getMarkerClass($apt['status']); ?>">
                                <i class="bi <?php echo getMarkerIcon($apt['status']); ?>"></i>
                            </div>
                            <div class="timeline-content">
                                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                                    <div class="timeline-date">
                                        <i class="bi bi-calendar3"></i>
                                        <?php echo formatDate($apt['appointment_date']); ?> • <?php echo formatTime($apt['appointment_time']); ?>
                                    </div>
                                    <span class="status-badge <?php echo getStatusBadgeClass($apt['status']); ?>">
                                        <?php echo getStatusText($apt['status']); ?>
                                    </span>
                                </div>

                                <div class="doctor-info-small">
                                    <div class="doctor-avatar-small">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-semibold mb-0">
                                            Dr. <?php echo htmlspecialchars($apt['doc_firstName'] . ' ' . $apt['doc_lastName']); ?>
                                        </h6>
                                        <p class="text-muted small mb-0">
                                            <?php echo htmlspecialchars($apt['departmentName'] ?? 'General'); ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <strong class="small text-muted">Reason:</strong>
                                    <p class="mb-0 small"><?php echo htmlspecialchars($apt['reasonForVisit']); ?></p>
                                </div>

                                <?php if ($apt['status'] == 'Cancelled'): ?>
                                    <div class="alert alert-danger border-0 mb-2"
                                        style="background-color: #fee2e2; color: #991b1b; padding: 0.5rem 0.75rem;">
                                        <small><i class="bi bi-info-circle"></i> Appointment was Cancelled</small>
                                    </div>
                                <?php elseif ($apt['status'] == 'No-Show'): ?>
                                    <div class="alert alert-warning border-0 mb-2"
                                        style="background-color: #fef3c7; color: #92400e; padding: 0.5rem 0.75rem;">
                                        <small><i class="bi bi-info-circle"></i> Patient did not show up for appointment</small>
                                    </div>
                                <?php endif; ?>

                                <button class="btn btn-outline-doctor btn-sm" 
                                        onclick='viewFullDetails(<?php echo json_encode([
                                            "id" => $apt["PK_tblappointments"],
                                            "doctor" => "Dr. " . $apt["doc_firstName"] . " " . $apt["doc_lastName"],
                                            "specialty" => $apt["departmentName"] ?? "General",
                                            "date" => formatDate($apt["appointment_date"]),
                                            "time" => formatTime($apt["appointment_time"]),
                                            "reason" => $apt["reasonForVisit"],
                                            "status" => getStatusText($apt["status"])
                                        ]); ?>)'>
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Empty State (shown when filtered) -->
        <div id="emptyState" style="display: none;" class="text-center py-5">
            <i class="bi bi-inbox display-1 text-muted"></i>
            <h4 class="mt-3 text-muted">No appointments found</h4>
            <p class="text-muted">Try adjusting your search or filters</p>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../context/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function searchHistory() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const items = document.querySelectorAll('.timeline-item');
        let visibleCount = 0;

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        // Show/hide empty state
        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function filterByStatus(status) {
        const items = document.querySelectorAll('.timeline-item');
        const pills = document.querySelectorAll('.filter-pill');
        let visibleCount = 0;

        pills.forEach(pill => pill.classList.remove('active'));
        event.target.classList.add('active');

        items.forEach(item => {
            if (status === 'all' || item.dataset.status === status) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function filterByYear(year) {
        const items = document.querySelectorAll('.timeline-item');
        const dividers = document.querySelectorAll('.year-divider');
        let visibleCount = 0;

        items.forEach(item => {
            if (year === 'all' || item.dataset.year === year) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        dividers.forEach(divider => {
            const dividerYear = divider.dataset.year;
            if (year === 'all' || dividerYear === year) {
                divider.style.display = 'flex';
            } else {
                divider.style.display = 'none';
            }
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function viewFullDetails(details) {
        const modalHTML = `
            <div class="modal fade" id="detailsModal" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content" style="border-radius: 18px; border: none;">
                        <div class="modal-header" style="background: linear-gradient(135deg, #2f9e8f 0%, #268c7f 100%); color: white; border-radius: 18px 18px 0 0;">
                            <h5 class="modal-title fw-bold">
                                <i class="bi bi-file-medical"></i> Appointment Details
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                        <small class="text-muted d-block mb-1"><i class="bi bi-person-fill text-doctor"></i> Doctor</small>
                                        <strong>${details.doctor}</strong>
                                        <p class="mb-0 small text-muted">${details.specialty}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                        <small class="text-muted d-block mb-1"><i class="bi bi-calendar3 text-doctor"></i> Date & Time</small>
                                        <strong>${details.date}</strong>
                                        <p class="mb-0 small text-muted">${details.time}</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                        <small class="text-muted d-block mb-1"><i class="bi bi-chat-left-text-fill text-doctor"></i> Reason for Visit</small>
                                        <p class="mb-0">${details.reason}</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="p-2 text-center" style="background-color: ${details.status === 'Completed' ? '#d1fae5' : details.status === 'Cancelled' ? '#fee2e2' : '#fef3c7'}; border-radius: 12px;">
                                        <strong style="color: ${details.status === 'Completed' ? '#065f46' : details.status === 'Cancelled' ? '#991b1b' : '#92400e'};">
                                            Status: ${details.status}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="border-top: 1px solid #e5e7eb;">
                            <button type="button" class="btn btn-outline-doctor" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle"></i> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        const existingModal = document.getElementById('detailsModal');
        if (existingModal) {
            existingModal.remove();
        }

        document.body.insertAdjacentHTML('beforeend', modalHTML);
        const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
        modal.show();
    }
    </script>
</body>

</html>


 
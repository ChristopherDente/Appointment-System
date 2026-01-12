<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Status - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
    .status-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
    }

    .status-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        border: 2px solid transparent;
    }

    .status-badge:hover {
        transform: scale(1.05);
    }

    .status-badge.selected {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.25);
    }

    .appointment-card {
        border-left: 4px solid #e9ecef;
        padding: 1rem;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 1rem;
        transition: all 0.3s;
    }

    .appointment-card:hover {
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .appointment-card.scheduled {
        border-left-color: #6c757d;
    }

    .appointment-card.pending {
        border-left-color: #ffc107;
    }

    .appointment-card.in-progress {
        border-left-color: #0d6efd;
    }

    .appointment-card.completed {
        border-left-color: #28a745;
    }

    .appointment-card.cancelled {
        border-left-color: #dc3545;
    }
    </style>
</head>

<body>
        <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-semibold" href="dashboard.php">
                <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="appointmentDropdown" role="button"
                            data-bs-toggle="dropdown">Appointments</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="allAppointments.php">All Appointments</a></li>
                            <li><a class="dropdown-item" href="walkin.php">Book Walk-in</a></li>
                            <li><a class="dropdown-item active" href="manageStatus.php">Manage Status</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctors.php">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patients.php">Patients</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inventory.php">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link-login nav-link" href="logout.php"
                            onclick="return confirm('Are you sure you want to logout?');">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h2 class="fw-bold mb-2">Manage Appointment Status</h2>
            <p class="mb-0 opacity-90">Update and track appointment statuses</p>
        </div>
    </div>

    <div class="container dashboard-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="status-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-semibold mb-0"><i class="bi bi-calendar-check"></i> Today's Appointments</h5>
                        <span class="badge bg-primary">24 Total</span>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Search by patient name or ID..."
                            id="searchAppointment">
                    </div>

                    <div id="appointmentsList">
                        <div class="appointment-card pending" data-id="1">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <strong class="text-dark">#APT001</strong>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    </div>
                                    <h6 class="mb-1">John Doe</h6>
                                    <p class="text-muted small mb-1"><i class="bi bi-person-badge"></i> Dr. Sarah Smith
                                        - Cardiology</p>
                                    <p class="text-muted small mb-0"><i class="bi bi-clock"></i> 09:00 AM | <i
                                            class="bi bi-calendar3"></i> Jan 12, 2026</p>
                                </div>
                                <button class="btn btn-sm btn-outline-primary"
                                    onclick="openStatusModal(1, 'John Doe', '#APT001', 'pending')">
                                    <i class="bi bi-pencil"></i> Update
                                </button>
                            </div>
                        </div>

                        <div class="appointment-card in-progress" data-id="2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <strong class="text-dark">#APT002</strong>
                                        <span class="badge bg-primary">In Progress</span>
                                    </div>
                                    <h6 class="mb-1">Jane Smith</h6>
                                    <p class="text-muted small mb-1"><i class="bi bi-person-badge"></i> Dr. Michael
                                        Johnson - Pediatrics</p>
                                    <p class="text-muted small mb-0"><i class="bi bi-clock"></i> 10:30 AM | <i
                                            class="bi bi-calendar3"></i> Jan 12, 2026</p>
                                </div>
                                <button class="btn btn-sm btn-outline-primary"
                                    onclick="openStatusModal(2, 'Jane Smith', '#APT002', 'in-progress')">
                                    <i class="bi bi-pencil"></i> Update
                                </button>
                            </div>
                        </div>

                        <div class="appointment-card scheduled" data-id="3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <strong class="text-dark">#APT003</strong>
                                        <span class="badge bg-secondary">Scheduled</span>
                                    </div>
                                    <h6 class="mb-1">Mike Wilson</h6>
                                    <p class="text-muted small mb-1"><i class="bi bi-person-badge"></i> Dr. Emily Brown
                                        - Orthopedics</p>
                                    <p class="text-muted small mb-0"><i class="bi bi-clock"></i> 02:00 PM | <i
                                            class="bi bi-calendar3"></i> Jan 12, 2026</p>
                                </div>
                                <button class="btn btn-sm btn-outline-primary"
                                    onclick="openStatusModal(3, 'Mike Wilson', '#APT003', 'scheduled')">
                                    <i class="bi bi-pencil"></i> Update
                                </button>
                            </div>
                        </div>

                        <div class="appointment-card completed" data-id="4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <strong class="text-dark">#APT004</strong>
                                        <span class="badge bg-success">Completed</span>
                                    </div>
                                    <h6 class="mb-1">Sarah Davis</h6>
                                    <p class="text-muted small mb-1"><i class="bi bi-person-badge"></i> Dr. Robert
                                        Martinez - Dermatology</p>
                                    <p class="text-muted small mb-0"><i class="bi bi-clock"></i> 08:00 AM | <i
                                            class="bi bi-calendar3"></i> Jan 12, 2026</p>
                                </div>
                                <button class="btn btn-sm btn-outline-success" disabled>
                                    <i class="bi bi-check-circle"></i> Completed
                                </button>
                            </div>
                        </div>

                        <div class="appointment-card cancelled" data-id="5">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <strong class="text-dark">#APT005</strong>
                                        <span class="badge bg-danger">Cancelled</span>
                                    </div>
                                    <h6 class="mb-1">Robert Lee</h6>
                                    <p class="text-muted small mb-1"><i class="bi bi-person-badge"></i> Dr. Lisa Taylor
                                        - Neurology</p>
                                    <p class="text-muted small mb-0"><i class="bi bi-clock"></i> 03:30 PM | <i
                                            class="bi bi-calendar3"></i> Jan 12, 2026</p>
                                </div>
                                <button class="btn btn-sm btn-outline-danger" disabled>
                                    <i class="bi bi-x-circle"></i> Cancelled
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="status-card">
                    <h5 class="fw-semibold mb-3"><i class="bi bi-bar-chart"></i> Status Overview</h5>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Scheduled</span>
                            <strong class="text-secondary">8</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-secondary" style="width: 33%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Pending</span>
                            <strong class="text-warning">5</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: 21%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>In Progress</span>
                            <strong class="text-primary">3</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 12%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Completed</span>
                            <strong class="text-success">6</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 25%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Cancelled</span>
                            <strong class="text-danger">2</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-danger" style="width: 8%"></div>
                        </div>
                    </div>
                </div>

                <div class="status-card">
                    <h5 class="fw-semibold mb-3"><i class="bi bi-info-circle"></i> Quick Actions</h5>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" onclick="filterStatus('pending')">
                            <i class="bi bi-funnel"></i> Show Pending Only
                        </button>
                        <button class="btn btn-outline-primary" onclick="filterStatus('in-progress')">
                            <i class="bi bi-funnel"></i> Show In Progress
                        </button>
                        <button class="btn btn-outline-secondary" onclick="filterStatus('all')">
                            <i class="bi bi-arrow-clockwise"></i> Show All
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Status Modal -->
    <div class="modal fade" id="statusModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-doctor text-white">
                    <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Update Appointment Status</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="fw-semibold">Appointment ID</label>
                        <p id="modalAptId" class="text-muted">-</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-semibold">Patient Name</label>
                        <p id="modalPatientName" class="text-muted">-</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Current Status</label>
                        <p id="modalCurrentStatus" class="mb-2">-</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Update Status To:</label>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="status-badge bg-secondary" onclick="selectStatus(this, 'scheduled')">
                                <i class="bi bi-calendar"></i> Scheduled
                            </span>
                            <span class="status-badge bg-warning text-dark" onclick="selectStatus(this, 'pending')">
                                <i class="bi bi-hourglass-split"></i> Pending
                            </span>
                            <span class="status-badge bg-primary" onclick="selectStatus(this, 'in-progress')">
                                <i class="bi bi-arrow-repeat"></i> In Progress
                            </span>
                            <span class="status-badge bg-success" onclick="selectStatus(this, 'completed')">
                                <i class="bi bi-check-circle"></i> Completed
                            </span>
                            <span class="status-badge bg-danger" onclick="selectStatus(this, 'cancelled')">
                                <i class="bi bi-x-circle"></i> Cancelled
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Notes (Optional)</label>
                        <textarea class="form-control" id="statusNotes" rows="3"
                            placeholder="Add any notes about this status change..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-doctor" onclick="saveStatus()">
                        <i class="bi bi-save"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-doctor mt-5">
        <div class="container py-4">
            <div class="text-center small text-light opacity-75">© 2026 Online Appointment Booking System</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    let currentAptId = null;
    let selectedNewStatus = null;
    let statusModal;

    document.addEventListener('DOMContentLoaded', function() {
        statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
    });

    function openStatusModal(id, patientName, aptId, currentStatus) {
        currentAptId = id;
        selectedNewStatus = null;
        document.getElementById('modalAptId').textContent = aptId;
        document.getElementById('modalPatientName').textContent = patientName;
        document.getElementById('modalCurrentStatus').innerHTML = getStatusBadge(currentStatus);
        document.getElementById('statusNotes').value = '';
        document.querySelectorAll('.status-badge').forEach(badge => badge.classList.remove('selected'));
        statusModal.show();
    }

    function selectStatus(element, status) {
        document.querySelectorAll('.status-badge').forEach(badge => badge.classList.remove('selected'));
        element.classList.add('selected');
        selectedNewStatus = status;
    }

    function getStatusBadge(status) {
        const badges = {
            'scheduled': '<span class="badge bg-secondary">Scheduled</span>',
            'pending': '<span class="badge bg-warning text-dark">Pending</span>',
            'in-progress': '<span class="badge bg-primary">In Progress</span>',
            'completed': '<span class="badge bg-success">Completed</span>',
            'cancelled': '<span class="badge bg-danger">Cancelled</span>'
        };
        return badges[status] || status;
    }

    function saveStatus() {
        if (!selectedNewStatus) {
            alert('Please select a new status');
            return;
        }
        alert(`Appointment #${currentAptId} status updated to: ${selectedNewStatus}`);
        statusModal.hide();
        location.reload();
    }

    function filterStatus(status) {
        const cards = document.querySelectorAll('.appointment-card');
        cards.forEach(card => {
            if (status === 'all' || card.classList.contains(status)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    document.getElementById('searchAppointment').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        document.querySelectorAll('.appointment-card').forEach(card => {
            const text = card.textContent.toLowerCase();
            card.style.display = text.includes(searchTerm) ? 'block' : 'none';
        });
    });
    </script>
</body>

</html>
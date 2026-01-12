<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Appointments - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .filter-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .table-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .badge-status {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .action-btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            margin: 0 0.125rem;
        }

        .search-input {
            border-radius: 8px;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
        }

        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
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
                            <li><a class="dropdown-item active" href="allAppointments.php">All Appointments</a></li>
                            <li><a class="dropdown-item" href="walkin.php">Book Walk-in</a></li>
                            <li><a class="dropdown-item" href="manageStatus.php">Manage Status</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctors.php">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patients.php">Patients</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Reports</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="dailyAppointments.php">Daily Appointments</a></li>
                            <li><a class="dropdown-item" href="monthreport.php">Monthly/Yearly</a></li>
                            <li><a class="dropdown-item" href="revenue_reports.php">Revenue Reports</a></li>
                            <li><a class="dropdown-item" href="docPerformance.php">Doctors Performance</a></li>
                        </ul>
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h2 class="fw-bold mb-2">All Appointments</h2>
            <p class="mb-0 opacity-90">Manage and view all appointment records</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container dashboard-content">
        <!-- Filters -->
        <div class="filter-card">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Search</label>
                    <div class="position-relative">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" id="searchInput" class="form-control search-input" placeholder="Patient name, ID...">
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Status</label>
                    <select id="filterStatus" class="form-select">
                        <option value="">All Status</option>
                        <option value="scheduled">Scheduled</option>
                        <option value="pending">Pending</option>
                        <option value="in-progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Department</label>
                    <select id="filterDepartment" class="form-select">
                        <option value="">All Departments</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="orthopedics">Orthopedics</option>
                        <option value="dermatology">Dermatology</option>
                        <option value="neurology">Neurology</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Date From</label>
                    <input type="date" id="dateFrom" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="form-label small fw-semibold">Date To</label>
                    <input type="date" id="dateTo" class="form-control">
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button class="btn btn-outline-secondary w-100" onclick="resetFilters()">
                        <i class="bi bi-arrow-clockwise"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Appointments Table -->
        <div class="table-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-semibold mb-0">
                    <i class="bi bi-calendar-check"></i> Appointments List
                    <span class="badge bg-primary ms-2" id="totalCount">24</span>
                </h5>
                <div>
                    <button class="btn btn-success btn-sm me-2" onclick="exportToExcel()">
                        <i class="bi bi-file-excel"></i> Export
                    </button>
                    <a href="walkin.php" class="btn btn-doctor btn-sm">
                        <i class="bi bi-plus-circle"></i> Book Walk-in
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date & Time</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Department</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="appointmentsTable">
                        <tr>
                            <td><strong>#APT001</strong></td>
                            <td>
                                <div>Jan 12, 2026</div>
                                <small class="text-muted">09:00 AM</small>
                            </td>
                            <td>
                                <div class="fw-semibold">John Doe</div>
                                <small class="text-muted">ID: P001</small>
                            </td>
                            <td>Dr. Smith</td>
                            <td>Cardiology</td>
                            <td><span class="badge bg-info">Online</span></td>
                            <td><span class="badge badge-status bg-success">Completed</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary action-btn" onclick="viewDetails(1)" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning action-btn" onclick="editAppointment(1)" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" onclick="cancelAppointment(1)" title="Cancel">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#APT002</strong></td>
                            <td>
                                <div>Jan 12, 2026</div>
                                <small class="text-muted">10:30 AM</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Jane Smith</div>
                                <small class="text-muted">ID: P002</small>
                            </td>
                            <td>Dr. Johnson</td>
                            <td>Pediatrics</td>
                            <td><span class="badge bg-warning">Walk-in</span></td>
                            <td><span class="badge badge-status bg-primary">In Progress</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary action-btn" onclick="viewDetails(2)">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning action-btn" onclick="editAppointment(2)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" onclick="cancelAppointment(2)">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#APT003</strong></td>
                            <td>
                                <div>Jan 12, 2026</div>
                                <small class="text-muted">11:00 AM</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Mike Wilson</div>
                                <small class="text-muted">ID: P003</small>
                            </td>
                            <td>Dr. Brown</td>
                            <td>Orthopedics</td>
                            <td><span class="badge bg-info">Online</span></td>
                            <td><span class="badge badge-status bg-warning text-dark">Pending</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary action-btn" onclick="viewDetails(3)">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning action-btn" onclick="editAppointment(3)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" onclick="cancelAppointment(3)">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#APT004</strong></td>
                            <td>
                                <div>Jan 12, 2026</div>
                                <small class="text-muted">02:00 PM</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Sarah Davis</div>
                                <small class="text-muted">ID: P004</small>
                            </td>
                            <td>Dr. Martinez</td>
                            <td>Dermatology</td>
                            <td><span class="badge bg-info">Online</span></td>
                            <td><span class="badge badge-status bg-secondary">Scheduled</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary action-btn" onclick="viewDetails(4)">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning action-btn" onclick="editAppointment(4)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" onclick="cancelAppointment(4)">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>#APT005</strong></td>
                            <td>
                                <div>Jan 12, 2026</div>
                                <small class="text-muted">03:30 PM</small>
                            </td>
                            <td>
                                <div class="fw-semibold">Robert Lee</div>
                                <small class="text-muted">ID: P005</small>
                            </td>
                            <td>Dr. Taylor</td>
                            <td>Neurology</td>
                            <td><span class="badge bg-warning">Walk-in</span></td>
                            <td><span class="badge badge-status bg-secondary">Scheduled</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary action-btn" onclick="viewDetails(5)">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning action-btn" onclick="editAppointment(5)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger action-btn" onclick="cancelAppointment(5)">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted small">
                    Showing 1 to 5 of 24 entries
                </div>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- View Details Modal -->
    <div class="modal fade" id="detailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-doctor text-white">
                    <h5 class="modal-title"><i class="bi bi-info-circle"></i> Appointment Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="fw-semibold text-muted small">Appointment ID</label>
                            <p>#APT001</p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-semibold text-muted small">Status</label>
                            <p><span class="badge bg-success">Completed</span></p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-semibold text-muted small">Patient Name</label>
                            <p>John Doe</p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-semibold text-muted small">Patient ID</label>
                            <p>P001</p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-semibold text-muted small">Doctor</label>
                            <p>Dr. Smith</p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-semibold text-muted small">Department</label>
                            <p>Cardiology</p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-semibold text-muted small">Date</label>
                            <p>January 12, 2026</p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-semibold text-muted small">Time</label>
                            <p>09:00 AM</p>
                        </div>
                        <div class="col-12">
                            <label class="fw-semibold text-muted small">Reason for Visit</label>
                            <p>Regular checkup for heart condition monitoring</p>
                        </div>
                        <div class="col-12">
                            <label class="fw-semibold text-muted small">Notes</label>
                            <p>Patient has history of hypertension. Last visit 3 months ago.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-doctor">Print Details</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-doctor mt-5">
        <div class="container py-4">
            <div class="text-center small text-light opacity-75">
                © 2026 Online Appointment Booking System. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewDetails(id) {
            const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
            modal.show();
        }

        function editAppointment(id) {
            if (confirm('Do you want to edit this appointment?')) {
                window.location.href = 'manageStatus.php?id=' + id;
            }
        }

        function cancelAppointment(id) {
            if (confirm('Are you sure you want to cancel this appointment?')) {
                alert('Appointment #' + id + ' has been cancelled');
                // Add your cancellation logic here
            }
        }

        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('filterStatus').value = '';
            document.getElementById('filterDepartment').value = '';
            document.getElementById('dateFrom').value = '';
            document.getElementById('dateTo').value = '';
        }

        function exportToExcel() {
            alert('Exporting appointments to Excel...');
            // Add your export logic here
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            // Add your search logic here
            console.log('Searching for:', e.target.value);
        });

        // Filter functionality
        document.getElementById('filterStatus').addEventListener('change', function(e) {
            console.log('Filter by status:', e.target.value);
        });

        document.getElementById('filterDepartment').addEventListener('change', function(e) {
            console.log('Filter by department:', e.target.value);
        });
    </script>
</body>
</html>
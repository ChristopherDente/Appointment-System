<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors Management - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .doctor-grid-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s;
            height: 100%;
        }
        .doctor-grid-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        }
        .doctor-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--doctor-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }
        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }
        .status-indicator.active { background: #28a745; }
        .status-indicator.inactive { background: #dc3545; }
        .filter-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }
        .table-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
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
                        <a class="nav-link dropdown-toggle" href="#" id="appointmentDropdown" role="button"
                            data-bs-toggle="dropdown">Appointments</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="allAppointments.php">All Appointments</a></li>
                            <li><a class="dropdown-item" href="walkin.php">Book Walk-in</a></li>
                            <li><a class="dropdown-item" href="manageStatus.php">Manage Status</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="doctors.php">Doctors</a>
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
                       <li class="nav-item dropdown">
                        <a class="nav-link position-relative d-flex align-items-center justify-content-center dropdown-toggle"
                            href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="width: 40px; height: 40px;">

                            <i class="bi bi-bell fs-5 text-white"></i>

                            <span id="notificationBadge" class="notification-count">
                                3
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow notification-dropdown"
                            aria-labelledby="notificationDropdown">

                            <li class="dropdown-header fw-semibold">
                                Notifications
                            </li>

                            <li>
                                <a class="dropdown-item d-flex gap-2" href="#">
                                    <i class="bi bi-check-circle text-success"></i>
                                    Appointment Confirmation
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item d-flex gap-2" href="#">
                                    <i class="bi bi-alarm text-primary"></i>
                                    Appointment Reminders
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item d-flex gap-2" href="#">
                                    <i class="bi bi-x-circle text-danger"></i>
                                    Cancellation Updates
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item text-center text-primary fw-semibold" href="/notifications.php">
                                    View all notifications
                                </a>
                            </li>
                        </ul>
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
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold mb-2">Doctors Management</h2>
                    <p class="mb-0 opacity-90">Manage doctors, schedules, and availability</p>
                </div>
                <button class="btn btn-light" onclick="openAddDoctorModal()">
                    <i class="bi bi-plus-circle"></i> Add New Doctor
                </button>
            </div>
        </div>
    </div>

    <div class="container dashboard-content">
        <!-- Filters -->
        <div class="filter-card">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Search Doctor</label>
                    <input type="text" class="form-control" id="searchDoctor" placeholder="Name, ID, specialization...">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Department</label>
                    <select class="form-select" id="filterDepartment">
                        <option value="">All Departments</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="pediatrics">Pediatrics</option>
                        <option value="orthopedics">Orthopedics</option>
                        <option value="dermatology">Dermatology</option>
                        <option value="neurology">Neurology</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Status</label>
                    <select class="form-select" id="filterStatus">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-outline-secondary w-100" onclick="resetFilters()">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </button>
                </div>
            </div>
            <div class="mt-3">
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="viewMode" id="gridView" checked>
                    <label class="btn btn-outline-primary" for="gridView" onclick="switchView('grid')">
                        <i class="bi bi-grid-3x3"></i> Grid
                    </label>
                    <input type="radio" class="btn-check" name="viewMode" id="listView">
                    <label class="btn btn-outline-primary" for="listView" onclick="switchView('list')">
                        <i class="bi bi-list-ul"></i> List
                    </label>
                </div>
            </div>
        </div>

        <!-- Grid View -->
        <div id="gridViewContent">
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="doctor-grid-card">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill text-doctor" style="font-size: 3rem;"></i>
                        </div>
                        <div class="text-center">
                            <h6 class="fw-semibold mb-1">Dr. Sarah Smith</h6>
                            <p class="text-muted small mb-2">Cardiology</p>
                            <div class="mb-2">
                                <span class="status-indicator active"></span>
                                <small class="text-success">Active</small>
                            </div>
                            <div class="small text-muted mb-3">
                                <i class="bi bi-telephone"></i> +63 912 345 6789
                            </div>
                            <div class="d-flex gap-1">
                                <button class="btn btn-sm btn-outline-primary flex-fill" onclick="viewDoctor(1)">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning flex-fill" onclick="editDoctor(1)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info flex-fill" onclick="manageSchedule(1)">
                                    <i class="bi bi-calendar"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="doctor-grid-card">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill text-doctor" style="font-size: 3rem;"></i>
                        </div>
                        <div class="text-center">
                            <h6 class="fw-semibold mb-1">Dr. Michael Johnson</h6>
                            <p class="text-muted small mb-2">Pediatrics</p>
                            <div class="mb-2">
                                <span class="status-indicator active"></span>
                                <small class="text-success">Active</small>
                            </div>
                            <div class="small text-muted mb-3">
                                <i class="bi bi-telephone"></i> +63 912 345 6790
                            </div>
                            <div class="d-flex gap-1">
                                <button class="btn btn-sm btn-outline-primary flex-fill" onclick="viewDoctor(2)">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning flex-fill" onclick="editDoctor(2)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info flex-fill" onclick="manageSchedule(2)">
                                    <i class="bi bi-calendar"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="doctor-grid-card">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill text-doctor" style="font-size: 3rem;"></i>
                        </div>
                        <div class="text-center">
                            <h6 class="fw-semibold mb-1">Dr. Emily Brown</h6>
                            <p class="text-muted small mb-2">Orthopedics</p>
                            <div class="mb-2">
                                <span class="status-indicator active"></span>
                                <small class="text-success">Active</small>
                            </div>
                            <div class="small text-muted mb-3">
                                <i class="bi bi-telephone"></i> +63 912 345 6791
                            </div>
                            <div class="d-flex gap-1">
                                <button class="btn btn-sm btn-outline-primary flex-fill" onclick="viewDoctor(3)">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning flex-fill" onclick="editDoctor(3)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info flex-fill" onclick="manageSchedule(3)">
                                    <i class="bi bi-calendar"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="doctor-grid-card">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill text-doctor" style="font-size: 3rem;"></i>
                        </div>
                        <div class="text-center">
                            <h6 class="fw-semibold mb-1">Dr. Robert Martinez</h6>
                            <p class="text-muted small mb-2">Dermatology</p>
                            <div class="mb-2">
                                <span class="status-indicator inactive"></span>
                                <small class="text-danger">Inactive</small>
                            </div>
                            <div class="small text-muted mb-3">
                                <i class="bi bi-telephone"></i> +63 912 345 6792
                            </div>
                            <div class="d-flex gap-1">
                                <button class="btn btn-sm btn-outline-primary flex-fill" onclick="viewDoctor(4)">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning flex-fill" onclick="editDoctor(4)">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-info flex-fill" onclick="manageSchedule(4)">
                                    <i class="bi bi-calendar"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- List View -->
        <div id="listViewContent" style="display: none;">
            <div class="table-card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Doctor Name</th>
                                <th>Department</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>#DOC001</strong></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-doctor-light rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px;">
                                            <i class="bi bi-person-fill text-doctor"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">Dr. Sarah Smith</div>
                                            <small class="text-muted">5 years experience</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Cardiology</td>
                                <td>+63 912 345 6789</td>
                                <td>sarah.smith@clinic.com</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewDoctor(1)"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-warning" onclick="editDoctor(1)"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-info" onclick="manageSchedule(1)"><i class="bi bi-calendar"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>#DOC002</strong></td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="bg-doctor-light rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px;">
                                            <i class="bi bi-person-fill text-doctor"></i>
                                        </div>
                                        <div>
                                            <div class="fw-semibold">Dr. Michael Johnson</div>
                                            <small class="text-muted">8 years experience</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Pediatrics</td>
                                <td>+63 912 345 6790</td>
                                <td>michael.j@clinic.com</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" onclick="viewDoctor(2)"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-outline-warning" onclick="editDoctor(2)"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-info" onclick="manageSchedule(2)"><i class="bi bi-calendar"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
        function switchView(view) {
            if (view === 'grid') {
                document.getElementById('gridViewContent').style.display = 'block';
                document.getElementById('listViewContent').style.display = 'none';
            } else {
                document.getElementById('gridViewContent').style.display = 'none';
                document.getElementById('listViewContent').style.display = 'block';
            }
        }

        function resetFilters() {
            document.getElementById('searchDoctor').value = '';
            document.getElementById('filterDepartment').value = '';
            document.getElementById('filterStatus').value = '';
        }

        function openAddDoctorModal() {
            window.location.href = 'addDoctor.php';
        }

        function viewDoctor(id) {
            window.location.href = 'viewDoctor.php?id=' + id;
        }

        function editDoctor(id) {
            window.location.href = 'editDoctor.php?id=' + id;
        }

        function manageSchedule(id) {
            window.location.href = 'doctorSchedule.php?id=' + id;
        }
    </script>
</body>
</html>
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
        :root {
            --doctor-primary: #0d6efd;
            --doctor-light: #e7f1ff;
        }
        
        
        .text-doctor {
            color: var(--doctor-primary);
        }
        
        .bg-doctor-light {
            background-color: var(--doctor-light);
        }
        
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
        
         
       
        .modal-doctor-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--doctor-light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }
        .info-row {
            padding: 0.75rem 0;
            border-bottom: 1px solid #e9ecef;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #495057;
            min-width: 150px;
        }
        .info-value {
            color: #212529;
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
                            <span id="notificationBadge" class="notification-count">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow notification-dropdown"
                            aria-labelledby="notificationDropdown">
                            <li class="dropdown-header fw-semibold">Notifications</li>
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
                            <li><hr class="dropdown-divider"></li>
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

    <!-- View Doctor Modal -->
    <div class="modal fade" id="viewDoctorModal" tabindex="-1" aria-labelledby="viewDoctorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-doctor text-white">
                    <h5 class="modal-title" id="viewDoctorModalLabel">
                        <i class="bi bi-person-badge"></i> Doctor Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-doctor-avatar">
                        <i class="bi bi-person-fill text-doctor" style="font-size: 4rem;"></i>
                    </div>
                    
                    <div class="text-center mb-4">
                        <h4 class="fw-bold mb-1" id="doctorName">Dr. Sarah Smith</h4>
                        <p class="text-muted mb-2" id="doctorDept">Cardiology Specialist</p>
                        <span class="badge bg-success" id="doctorStatus">Active</span>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-row d-flex">
                                    <span class="info-label"><i class="bi bi-credit-card me-2"></i>Doctor ID:</span>
                                    <span class="info-value ms-auto" id="doctorId">#DOC001</span>
                                </div>
                                <div class="info-row d-flex">
                                    <span class="info-label"><i class="bi bi-telephone me-2"></i>Contact:</span>
                                    <span class="info-value ms-auto" id="doctorContact">+63 912 345 6789</span>
                                </div>
                                <div class="info-row d-flex">
                                    <span class="info-label"><i class="bi bi-envelope me-2"></i>Email:</span>
                                    <span class="info-value ms-auto" id="doctorEmail">sarah.smith@clinic.com</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-row d-flex">
                                    <span class="info-label"><i class="bi bi-hospital me-2"></i>Department:</span>
                                    <span class="info-value ms-auto" id="doctorDepartment">Cardiology</span>
                                </div>
                                <div class="info-row d-flex">
                                    <span class="info-label"><i class="bi bi-clock-history me-2"></i>Experience:</span>
                                    <span class="info-value ms-auto" id="doctorExperience">5 years</span>
                                </div>
                                <div class="info-row d-flex">
                                    <span class="info-label"><i class="bi bi-award me-2"></i>License No:</span>
                                    <span class="info-value ms-auto" id="doctorLicense">LIC-12345</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h6 class="fw-semibold mb-3"><i class="bi bi-calendar-week me-2"></i>Working Schedule</h6>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="doctorSchedule">
                                        <tr>
                                            <td>Monday - Friday</td>
                                            <td>9:00 AM - 5:00 PM</td>
                                            <td><span class="badge bg-success">Available</span></td>
                                        </tr>
                                        <tr>
                                            <td>Saturday</td>
                                            <td>9:00 AM - 1:00 PM</td>
                                            <td><span class="badge bg-success">Available</span></td>
                                        </tr>
                                        <tr>
                                            <td>Sunday</td>
                                            <td>-</td>
                                            <td><span class="badge bg-secondary">Off</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h6 class="fw-semibold mb-2"><i class="bi bi-info-circle me-2"></i>Specializations</h6>
                            <div id="doctorSpecializations">
                                <span class="badge bg-primary me-2 mb-2">Heart Surgery</span>
                                <span class="badge bg-primary me-2 mb-2">Cardiac Care</span>
                                <span class="badge bg-primary me-2 mb-2">ECG Analysis</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" onclick="editDoctorFromModal()">
                        <i class="bi bi-pencil"></i> Edit Doctor
                    </button>
                    <button type="button" class="btn btn-info" onclick="manageScheduleFromModal()">
                        <i class="bi bi-calendar"></i> Manage Schedule
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
        // Sample doctor data
        const doctorsData = {
            1: {
                id: '#DOC001',
                name: 'Dr. Sarah Smith',
                department: 'Cardiology',
                specialty: 'Cardiology Specialist',
                contact: '+63 912 345 6789',
                email: 'sarah.smith@clinic.com',
                experience: '5 years',
                license: 'LIC-12345',
                status: 'Active',
                statusClass: 'success',
                specializations: ['Heart Surgery', 'Cardiac Care', 'ECG Analysis']
            },
            2: {
                id: '#DOC002',
                name: 'Dr. Michael Johnson',
                department: 'Pediatrics',
                specialty: 'Pediatrics Specialist',
                contact: '+63 912 345 6790',
                email: 'michael.j@clinic.com',
                experience: '8 years',
                license: 'LIC-12346',
                status: 'Active',
                statusClass: 'success',
                specializations: ['Child Health', 'Vaccinations', 'Growth Monitoring']
            },
            3: {
                id: '#DOC003',
                name: 'Dr. Emily Brown',
                department: 'Orthopedics',
                specialty: 'Orthopedics Specialist',
                contact: '+63 912 345 6791',
                email: 'emily.b@clinic.com',
                experience: '10 years',
                license: 'LIC-12347',
                status: 'Active',
                statusClass: 'success',
                specializations: ['Bone Surgery', 'Joint Replacement', 'Sports Medicine']
            },
            4: {
                id: '#DOC004',
                name: 'Dr. Robert Martinez',
                department: 'Dermatology',
                specialty: 'Dermatology Specialist',
                contact: '+63 912 345 6792',
                email: 'robert.m@clinic.com',
                experience: '6 years',
                license: 'LIC-12348',
                status: 'Inactive',
                statusClass: 'danger',
                specializations: ['Skin Care', 'Cosmetic Dermatology', 'Laser Treatment']
            }
        };

        let currentDoctorId = null;

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
            currentDoctorId = id;
            const doctor = doctorsData[id];
            
            if (doctor) {
                // Update modal content
                document.getElementById('doctorName').textContent = doctor.name;
                document.getElementById('doctorDept').textContent = doctor.specialty;
                document.getElementById('doctorStatus').textContent = doctor.status;
                document.getElementById('doctorStatus').className = `badge bg-${doctor.statusClass}`;
                
                document.getElementById('doctorId').textContent = doctor.id;
                document.getElementById('doctorContact').textContent = doctor.contact;
                document.getElementById('doctorEmail').textContent = doctor.email;
                document.getElementById('doctorDepartment').textContent = doctor.department;
                document.getElementById('doctorExperience').textContent = doctor.experience;
                document.getElementById('doctorLicense').textContent = doctor.license;
                
                // Update specializations
                const specializationsHTML = doctor.specializations
                    .map(spec => `<span class="badge bg-primary me-2 mb-2">${spec}</span>`)
                    .join('');
                document.getElementById('doctorSpecializations').innerHTML = specializationsHTML;
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('viewDoctorModal'));
                modal.show();
            }
        }

        function editDoctor(id) {
            window.location.href = 'editDoctor.php?id=' + id;
        }

        function manageSchedule(id) {
            window.location.href = 'doctorSchedule.php?id=' + id;
        }

        function editDoctorFromModal() {
            if (currentDoctorId) {
                window.location.href = 'editDoctor.php?id=' + currentDoctorId;
            }
        }

        function manageScheduleFromModal() {
            if (currentDoctorId) {
                window.location.href = 'doctorSchedule.php?id=' + currentDoctorId;
            }
        }
    </script>
</body>
</html>
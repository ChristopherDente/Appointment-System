<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Patient Management - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    
    <style>
         

        .patient-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
            transition: all 0.3s;
        }

        .patient-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .patient-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--doctor-light);
            color: var(--doctor-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .badge-status {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .search-box1 {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
        }

        .filter-btn {
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .appointment-timeline {
            position: relative;
            padding-left: 2rem;
        }

        .appointment-timeline::before {
            content: '';
            position: absolute;
            left: 0.5rem;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #dee2e6;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        .timeline-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -1.5rem;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: white;
            border: 3px solid var(--doctor-primary);
        }

        .timeline-dot.completed {
            border-color: #28a745;
        }

        .timeline-dot.cancelled {
            border-color: #dc3545;
        }

        .patient-info-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .modal-lg {
            max-width: 900px;
        }

        .stat-badge {
            background: var(--doctor-light);
            color: var(--doctor-primary);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
        }

        .table-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        

        .pagination {
            margin-top: 1.5rem;
        }

        .btn-action {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            border-radius: 6px;
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
                        <a class="nav-link" href="doctors.php">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="patients.php">Patients</a>
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
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold mb-2">Patient Management</h2>
                    <p class="mb-0 opacity-90">Manage and view patient records and appointment history</p>
                </div>
                <div>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addPatientModal">
                        <i class="bi bi-person-plus"></i> Add New Patient
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Statistics Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="patient-card text-center">
                    <h3 class="fw-bold text-primary mb-1" id="totalPatients">342</h3>
                    <p class="text-muted mb-0 small">Total Patients</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="patient-card text-center">
                    <h3 class="fw-bold text-success mb-1" id="activePatients">298</h3>
                    <p class="text-muted mb-0 small">Active Patients</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="patient-card text-center">
                    <h3 class="fw-bold text-info mb-1" id="newThisMonth">24</h3>
                    <p class="text-muted mb-0 small">New This Month</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="patient-card text-center">
                    <h3 class="fw-bold text-warning mb-1" id="pendingAppts">15</h3>
                    <p class="text-muted mb-0 small">Pending Appointments</p>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="search-box1">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-semibold small">Search Patient</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" id="searchInput" placeholder="Name, ID, or Phone">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Filter by Status</label>
                    <select class="form-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Sort By</label>
                    <select class="form-select" id="sortBy">
                        <option value="name">Name (A-Z)</option>
                        <option value="recent">Recently Added</option>
                        <option value="appointments">Most Appointments</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" onclick="applyFilters()">
                        <i class="bi bi-funnel"></i> Apply
                    </button>
                </div>
            </div>
        </div>

        <!-- Patient List -->
        <div class="table-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-semibold mb-0"><i class="bi bi-people"></i> Patient List</h5>
                <span class="text-muted small">Showing <span id="showingCount">10</span> of <span id="totalCount">342</span> patients</span>
            </div>

            <div id="patientList">
                <!-- Patient cards will be rendered here -->
            </div>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Patient Details Modal -->
    <div class="modal fade" id="patientDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="bi bi-person-circle"></i> Patient Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="patientDetailsContent">
                    <!-- Content will be loaded dynamically -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="editPatient()">
                        <i class="bi bi-pencil"></i> Edit Patient
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Patient Modal -->
    <div class="modal fade" id="addPatientModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="bi bi-person-plus"></i> Add New Patient</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addPatientForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">First Name *</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Last Name *</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date of Birth *</label>
                                <input type="date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Gender *</label>
                                <select class="form-select" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number *</label>
                                <input type="tel" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Address</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Blood Type</label>
                                <select class="form-select">
                                    <option value="">Select Blood Type</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Emergency Contact</label>
                                <input type="tel" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveNewPatient()">
                        <i class="bi bi-check-lg"></i> Save Patient
                    </button>
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
        // Sample patient data
        const patients = [
            {
                id: 'P001',
                firstName: 'John',
                lastName: 'Doe',
                dob: '1985-03-15',
                age: 39,
                gender: 'Male',
                phone: '+1 (555) 123-4567',
                email: 'john.doe@email.com',
                address: '123 Main St, New York, NY 10001',
                bloodType: 'O+',
                status: 'active',
                appointments: [
                    { date: '2026-01-15', time: '10:00 AM', doctor: 'Dr. Smith', department: 'Cardiology', status: 'completed', reason: 'Regular checkup' },
                    { date: '2025-12-20', time: '02:30 PM', doctor: 'Dr. Johnson', department: 'General', status: 'completed', reason: 'Flu symptoms' },
                    { date: '2025-11-10', time: '09:00 AM', doctor: 'Dr. Smith', department: 'Cardiology', status: 'completed', reason: 'Follow-up' }
                ]
            },
            {
                id: 'P002',
                firstName: 'Jane',
                lastName: 'Smith',
                dob: '1990-07-22',
                age: 34,
                gender: 'Female',
                phone: '+1 (555) 234-5678',
                email: 'jane.smith@email.com',
                address: '456 Oak Ave, Brooklyn, NY 11201',
                bloodType: 'A+',
                status: 'active',
                appointments: [
                    { date: '2026-01-18', time: '11:30 AM', doctor: 'Dr. Martinez', department: 'Dermatology', status: 'scheduled', reason: 'Skin consultation' },
                    { date: '2025-12-05', time: '03:00 PM', doctor: 'Dr. Brown', department: 'Orthopedics', status: 'completed', reason: 'Knee pain' }
                ]
            },
            {
                id: 'P003',
                firstName: 'Mike',
                lastName: 'Wilson',
                dob: '1978-11-30',
                age: 46,
                gender: 'Male',
                phone: '+1 (555) 345-6789',
                email: 'mike.wilson@email.com',
                address: '789 Elm St, Queens, NY 11375',
                bloodType: 'B+',
                status: 'active',
                appointments: [
                    { date: '2026-01-12', time: '09:30 AM', doctor: 'Dr. Taylor', department: 'Neurology', status: 'completed', reason: 'Headache assessment' },
                    { date: '2025-11-28', time: '01:00 PM', doctor: 'Dr. Taylor', department: 'Neurology', status: 'cancelled', reason: 'Initial consultation' }
                ]
            },
            {
                id: 'P004',
                firstName: 'Sarah',
                lastName: 'Davis',
                dob: '1995-04-18',
                age: 29,
                gender: 'Female',
                phone: '+1 (555) 456-7890',
                email: 'sarah.davis@email.com',
                address: '321 Pine Rd, Manhattan, NY 10012',
                bloodType: 'AB+',
                status: 'active',
                appointments: [
                    { date: '2026-01-20', time: '02:00 PM', doctor: 'Dr. Martinez', department: 'Dermatology', status: 'scheduled', reason: 'Acne treatment' }
                ]
            },
            {
                id: 'P005',
                firstName: 'Robert',
                lastName: 'Lee',
                dob: '1982-09-05',
                age: 42,
                gender: 'Male',
                phone: '+1 (555) 567-8901',
                email: 'robert.lee@email.com',
                address: '654 Maple Dr, Bronx, NY 10451',
                bloodType: 'O-',
                status: 'active',
                appointments: [
                    { date: '2026-01-14', time: '10:30 AM', doctor: 'Dr. Johnson', department: 'Pediatrics', status: 'completed', reason: 'Child checkup' },
                    { date: '2025-10-15', time: '11:00 AM', doctor: 'Dr. Brown', department: 'Orthopedics', status: 'completed', reason: 'Sports injury' }
                ]
            },
            {
                id: 'P006',
                firstName: 'Emily',
                lastName: 'Brown',
                dob: '1988-12-10',
                age: 36,
                gender: 'Female',
                phone: '+1 (555) 678-9012',
                email: 'emily.brown@email.com',
                address: '987 Cedar Ln, Staten Island, NY 10301',
                bloodType: 'A-',
                status: 'active',
                appointments: [
                    { date: '2026-01-16', time: '03:30 PM', doctor: 'Dr. Smith', department: 'Cardiology', status: 'scheduled', reason: 'Blood pressure check' }
                ]
            },
            {
                id: 'P007',
                firstName: 'David',
                lastName: 'Anderson',
                dob: '1975-06-25',
                age: 49,
                gender: 'Male',
                phone: '+1 (555) 789-0123',
                email: 'david.anderson@email.com',
                address: '147 Birch St, Brooklyn, NY 11215',
                bloodType: 'B-',
                status: 'inactive',
                appointments: [
                    { date: '2025-08-20', time: '09:00 AM', doctor: 'Dr. Taylor', department: 'Neurology', status: 'completed', reason: 'MRI review' }
                ]
            },
            {
                id: 'P008',
                firstName: 'Lisa',
                lastName: 'Martinez',
                dob: '1992-02-14',
                age: 32,
                gender: 'Female',
                phone: '+1 (555) 890-1234',
                email: 'lisa.martinez@email.com',
                address: '258 Walnut Ave, Queens, NY 11354',
                bloodType: 'O+',
                status: 'active',
                appointments: [
                    { date: '2026-01-22', time: '01:30 PM', doctor: 'Dr. Johnson', department: 'Pediatrics', status: 'scheduled', reason: 'Vaccination' }
                ]
            },
            {
                id: 'P009',
                firstName: 'James',
                lastName: 'Taylor',
                dob: '1980-08-08',
                age: 44,
                gender: 'Male',
                phone: '+1 (555) 901-2345',
                email: 'james.taylor@email.com',
                address: '369 Spruce Ct, Manhattan, NY 10025',
                bloodType: 'AB-',
                status: 'active',
                appointments: [
                    { date: '2026-01-11', time: '11:00 AM', doctor: 'Dr. Brown', department: 'Orthopedics', status: 'completed', reason: 'Back pain' }
                ]
            },
            {
                id: 'P010',
                firstName: 'Maria',
                lastName: 'Garcia',
                dob: '1987-05-30',
                age: 37,
                gender: 'Female',
                phone: '+1 (555) 012-3456',
                email: 'maria.garcia@email.com',
                address: '741 Poplar Pl, Bronx, NY 10458',
                bloodType: 'A+',
                status: 'active',
                appointments: [
                    { date: '2026-01-19', time: '04:00 PM', doctor: 'Dr. Martinez', department: 'Dermatology', status: 'scheduled', reason: 'Skin screening' }
                ]
            }
        ];

        function renderPatientList() {
            const container = document.getElementById('patientList');
            container.innerHTML = '';

            patients.forEach(patient => {
                const totalAppointments = patient.appointments.length;
                const upcomingAppointments = patient.appointments.filter(a => a.status === 'scheduled').length;
                const initials = patient.firstName[0] + patient.lastName[0];

                const patientCard = `
                    <div class="patient-card">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="patient-avatar">${initials}</div>
                            </div>
                            <div class="col">
                                <h6 class="fw-bold mb-1">${patient.firstName} ${patient.lastName}</h6>
                                <div class="patient-info-row text-muted small">
                                    <i class="bi bi-person-badge"></i>
                                    <span>ID: ${patient.id}</span>
                                </div>
                                <div class="patient-info-row text-muted small">
                                    <i class="bi bi-calendar"></i>
                                    <span>${patient.age} years old</span>
                                    <span class="ms-3"><i class="bi bi-gender-ambiguous"></i> ${patient.gender}</span>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <div class="patient-info-row text-muted small mb-2">
                                    <i class="bi bi-telephone"></i>
                                    <span>${patient.phone}</span>
                                </div>
                                <div class="patient-info-row text-muted small">
                                    <i class="bi bi-envelope"></i>
                                    <span>${patient.email}</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="text-center mb-2">
                                    <div class="stat-badge mb-1">${totalAppointments}</div>
                                    <small class="text-muted d-block">Total Visits</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="text-center mb-2">
                                    <div class="stat-badge mb-1 ${upcomingAppointments > 0 ? 'bg-success-subtle text-success' : ''}">${upcomingAppointments}</div>
                                    <small class="text-muted d-block">Upcoming</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="badge ${patient.status === 'active' ? 'bg-success' : 'bg-secondary'} badge-status">
                                    ${patient.status === 'active' ? 'Active' : 'Inactive'}
                                </span>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-action" onclick="viewPatientDetails('${patient.id}')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                            </div>
                        </div>
                    </div>
                `;

                container.innerHTML += patientCard;
            });
        }

        function viewPatientDetails(patientId) {
            const patient = patients.find(p => p.id === patientId);
            if (!patient) return;

            const content = `
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="text-center mb-4">
                            <div class="patient-avatar mx-auto mb-3" style="width: 100px; height: 100px; font-size: 2.5rem;">
                                ${patient.firstName[0]}${patient.lastName[0]}
                            </div>
                            <h5 class="fw-bold">${patient.firstName} ${patient.lastName}</h5>
                            <p class="text-muted mb-2">Patient ID: ${patient.id}</p>
                            <span class="badge ${patient.status === 'active' ? 'bg-success' : 'bg-secondary'} badge-status">
                                ${patient.status === 'active' ? 'Active Patient' : 'Inactive'}
                            </span>
                        </div>

                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">Personal Information</h6>
                                <div class="mb-2">
                                    <small class="text-muted">Date of Birth</small>
                                    <p class="mb-1">${patient.dob} (${patient.age} years)</p>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Gender</small>
                                    <p class="mb-1">${patient.gender}</p>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Blood Type</small>
                                    <p class="mb-1">${patient.bloodType}</p>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Phone</small>
                                    <p class="mb-1">${patient.phone}</p>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Email</small>
                                    <p class="mb-1">${patient.email}</p>
                                </div>
                                <div class="mb-2">
                                    <small class="text-muted">Address</small>
                                    <p class="mb-1">${patient.address}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold mb-0">Appointment History</h6>
                            <button class="btn btn-sm btn-primary" onclick="bookAppointment('${patient.id}')">
                                <i class="bi bi-calendar-plus"></i> Book Appointment
                            </button>
                        </div>

                        <!-- Appointment Statistics -->
                        <div class="row g-3 mb-4">
                            <div class="col-4">
                                <div class="card border-0 bg-light text-center">
                                    <div class="card-body py-3">
                                        <h4 class="fw-bold text-primary mb-0">${patient.appointments.length}</h4>
                                        <small class="text-muted">Total Visits</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card border-0 bg-light text-center">
                                    <div class="card-body py-3">
                                        <h4 class="fw-bold text-success mb-0">${patient.appointments.filter(a => a.status === 'completed').length}</h4>
                                        <small class="text-muted">Completed</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card border-0 bg-light text-center">
                                    <div class="card-body py-3">
                                        <h4 class="fw-bold text-warning mb-0">${patient.appointments.filter(a => a.status === 'scheduled').length}</h4>
                                        <small class="text-muted">Upcoming</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Timeline -->
                        <div class="appointment-timeline">
                            ${patient.appointments.map(appointment => `
                                <div class="timeline-item">
                                    <div class="timeline-dot ${appointment.status}"></div>
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="fw-bold mb-1">${appointment.date} at ${appointment.time}</h6>
                                            <p class="text-muted mb-1 small">
                                                <i class="bi bi-person-badge me-1"></i>${appointment.doctor} - ${appointment.department}
                                            </p>
                                            <p class="mb-0 small">
                                                <i class="bi bi-file-text me-1"></i>${appointment.reason}
                                            </p>
                                        </div>
                                        <span class="badge ${
                                            appointment.status === 'completed' ? 'bg-success' :
                                            appointment.status === 'scheduled' ? 'bg-primary' :
                                            appointment.status === 'cancelled' ? 'bg-danger' : 'bg-secondary'
                                        } badge-status">
                                            ${appointment.status.charAt(0).toUpperCase() + appointment.status.slice(1)}
                                        </span>
                                    </div>
                                </div>
                            `).join('')}
                        </div>

                        ${patient.appointments.length === 0 ? `
                            <div class="text-center py-5">
                                <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                                <p class="text-muted mt-3">No appointment history available</p>
                                <button class="btn btn-primary" onclick="bookAppointment('${patient.id}')">
                                    <i class="bi bi-calendar-plus"></i> Book First Appointment
                                </button>
                            </div>
                        ` : ''}
                    </div>
                </div>
            `;

            document.getElementById('patientDetailsContent').innerHTML = content;
            const modal = new bootstrap.Modal(document.getElementById('patientDetailsModal'));
            modal.show();
        }

        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const sortBy = document.getElementById('sortBy').value;

            let filteredPatients = [...patients];

            // Apply search filter
            if (searchTerm) {
                filteredPatients = filteredPatients.filter(p => 
                    p.firstName.toLowerCase().includes(searchTerm) ||
                    p.lastName.toLowerCase().includes(searchTerm) ||
                    p.id.toLowerCase().includes(searchTerm) ||
                    p.phone.includes(searchTerm)
                );
            }

            // Apply status filter
            if (statusFilter) {
                filteredPatients = filteredPatients.filter(p => p.status === statusFilter);
            }

            // Apply sorting
            if (sortBy === 'name') {
                filteredPatients.sort((a, b) => 
                    (a.firstName + a.lastName).localeCompare(b.firstName + b.lastName)
                );
            } else if (sortBy === 'appointments') {
                filteredPatients.sort((a, b) => b.appointments.length - a.appointments.length);
            }

            document.getElementById('showingCount').textContent = filteredPatients.length;
            
            // Re-render with filtered data
            const container = document.getElementById('patientList');
            container.innerHTML = '';
            
            filteredPatients.forEach(patient => {
                const totalAppointments = patient.appointments.length;
                const upcomingAppointments = patient.appointments.filter(a => a.status === 'scheduled').length;
                const initials = patient.firstName[0] + patient.lastName[0];

                const patientCard = `
                    <div class="patient-card">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="patient-avatar">${initials}</div>
                            </div>
                            <div class="col">
                                <h6 class="fw-bold mb-1">${patient.firstName} ${patient.lastName}</h6>
                                <div class="patient-info-row text-muted small">
                                    <i class="bi bi-person-badge"></i>
                                    <span>ID: ${patient.id}</span>
                                </div>
                                <div class="patient-info-row text-muted small">
                                    <i class="bi bi-calendar"></i>
                                    <span>${patient.age} years old</span>
                                    <span class="ms-3"><i class="bi bi-gender-ambiguous"></i> ${patient.gender}</span>
                                </div>
                            </div>
                            <div class="col-auto text-end">
                                <div class="patient-info-row text-muted small mb-2">
                                    <i class="bi bi-telephone"></i>
                                    <span>${patient.phone}</span>
                                </div>
                                <div class="patient-info-row text-muted small">
                                    <i class="bi bi-envelope"></i>
                                    <span>${patient.email}</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="text-center mb-2">
                                    <div class="stat-badge mb-1">${totalAppointments}</div>
                                    <small class="text-muted d-block">Total Visits</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="text-center mb-2">
                                    <div class="stat-badge mb-1 ${upcomingAppointments > 0 ? 'bg-success-subtle text-success' : ''}">${upcomingAppointments}</div>
                                    <small class="text-muted d-block">Upcoming</small>
                                </div>
                            </div>
                            <div class="col-auto">
                                <span class="badge ${patient.status === 'active' ? 'bg-success' : 'bg-secondary'} badge-status">
                                    ${patient.status === 'active' ? 'Active' : 'Inactive'}
                                </span>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary btn-action" onclick="viewPatientDetails('${patient.id}')">
                                    <i class="bi bi-eye"></i> View Details
                                </button>
                            </div>
                        </div>
                    </div>
                `;

                container.innerHTML += patientCard;
            });
        }

        function saveNewPatient() {
            alert('New patient saved successfully! (This would normally submit to your backend)');
            const modal = bootstrap.Modal.getInstance(document.getElementById('addPatientModal'));
            modal.hide();
            document.getElementById('addPatientForm').reset();
        }

        function editPatient() {
            alert('Edit patient functionality (This would open an edit form)');
        }

        function bookAppointment(patientId) {
            alert(`Book appointment for patient ${patientId} (This would redirect to appointment booking page)`);
        }

        // Search on Enter key
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                applyFilters();
            }
        });

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            renderPatientList();
        });
    </script>

</body>

</html>
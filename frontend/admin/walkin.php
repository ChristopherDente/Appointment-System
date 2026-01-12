<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Walk-in - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
    .booking-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .step-indicator {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
        position: relative;
    }

    .step {
        flex: 1;
        text-align: center;
        position: relative;
    }

    .step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e9ecef;
        color: #6c757d;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
    }

    .step.active .step-number {
        background-color: #2f9e8f;
        color: white;
        box-shadow: 0 4px 12px rgba(47, 158, 143, 0.3);
    }

    .step.completed .step-number {
        background: #2f9e8f;
        color: white;
    }

    .step-line {
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        height: 2px;
        background: #e9ecef;
        z-index: 1;
    }

    .step.completed .step-line {
        background: #2f9e8f;
    }

    .step:last-child .step-line {
        display: none;
    }

    .time-slot {
        padding: 0.75rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }

    .time-slot:hover {
        border-color: var(--doctor-primary);
        background: var(--doctor-light);
    }

    .time-slot.selected {
        border-color: var(--doctor-primary);
        background: var(--doctor-primary);
        color: white;
    }

    .time-slot.unavailable {
        background: #f8f9fa;
        color: #adb5bd;
        cursor: not-allowed;
    }

    .time-slot.unavailable:hover {
        border-color: #e9ecef;
        background: #f8f9fa;
    }

    .doctor-card {
        padding: 1rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
        margin-bottom: 1rem;
    }

    .doctor-card:hover {
        border-color: var(--doctor-primary);
        background: var(--doctor-light);
    }

    .doctor-card.selected {
        border-color: var(--doctor-primary);
        background: var(--doctor-light);
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
                            <li><a class="dropdown-item active" href="walkin.php">Book Walk-in</a></li>
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

    <div class="page-header">
        <div class="container">
            <h2 class="fw-bold mb-2">Book Walk-in Appointment</h2>
            <p class="mb-0 opacity-90">Register and schedule walk-in patients</p>
        </div>
    </div>

    <div class="container dashboard-content">
        <div class="booking-card">
            <div class="step-indicator">
                <div class="step active" id="step1Indicator">
                    <div class="step-line"></div>
                    <div class="step-number">1</div>
                    <div class="small">Patient Info</div>
                </div>
                <div class="step" id="step2Indicator">
                    <div class="step-line"></div>
                    <div class="step-number">2</div>
                    <div class="small">Select Doctor</div>
                </div>
                <div class="step" id="step3Indicator">
                    <div class="step-line"></div>
                    <div class="step-number">3</div>
                    <div class="small">Time Slot</div>
                </div>
                <div class="step" id="step4Indicator">
                    <div class="step-number">4</div>
                    <div class="small">Confirm</div>
                </div>
            </div>

            <form id="walkinForm">
                <div class="step-content" id="step1">
                    <h4 class="fw-semibold mb-4"><i class="bi bi-person-fill"></i> Patient Information</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middleName">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="dob" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select class="form-select" id="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="contact" placeholder="+63 912 345 6789" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" rows="2" required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Reason for Visit <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="reason" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-doctor" onclick="nextStep(2)">Next <i
                                class="bi bi-arrow-right"></i></button>
                    </div>
                </div>

                <div class="step-content" id="step2" style="display:none;">
                    <h4 class="fw-semibold mb-4"><i class="bi bi-person-badge"></i> Select Doctor</h4>
                    <div class="row" id="doctorsList">
                        <div class="col-md-6">
                            <div class="doctor-card" onclick="selectDoctor(1, 'Dr. Sarah Smith', 'Cardiology', this)">
                                <div class="d-flex gap-3">
                                    <div class="bg-doctor-light rounded-circle d-flex align-items-center justify-content-center"
                                        style="width:60px;height:60px;">
                                        <i class="bi bi-person-fill text-doctor fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-semibold mb-1">Dr. Sarah Smith</h6>
                                        <p class="text-muted small mb-1">Cardiology</p>
                                        <div class="small text-success"><i class="bi bi-circle-fill"
                                                style="font-size:8px;"></i> Available</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="doctor-card"
                                onclick="selectDoctor(2, 'Dr. Michael Johnson', 'Pediatrics', this)">
                                <div class="d-flex gap-3">
                                    <div class="bg-doctor-light rounded-circle d-flex align-items-center justify-content-center"
                                        style="width:60px;height:60px;">
                                        <i class="bi bi-person-fill text-doctor fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-semibold mb-1">Dr. Michael Johnson</h6>
                                        <p class="text-muted small mb-1">Pediatrics</p>
                                        <div class="small text-success"><i class="bi bi-circle-fill"
                                                style="font-size:8px;"></i> Available</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" onclick="prevStep(1)"><i
                                class="bi bi-arrow-left"></i> Back</button>
                        <button type="button" class="btn btn-doctor" onclick="nextStep(3)">Next <i
                                class="bi bi-arrow-right"></i></button>
                    </div>
                </div>

                <div class="step-content" id="step3" style="display:none;">
                    <h4 class="fw-semibold mb-4"><i class="bi bi-clock"></i> Select Time Slot</h4>
                    <div class="mb-4">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" id="appointmentDate" value="2026-01-12">
                    </div>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <div class="time-slot" onclick="selectTimeSlot('09:00 AM', this)">
                                <div class="fw-semibold">09:00 AM</div><small>Available</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="time-slot" onclick="selectTimeSlot('10:00 AM', this)">
                                <div class="fw-semibold">10:00 AM</div><small>Available</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="time-slot unavailable">
                                <div class="fw-semibold">11:00 AM</div><small>Booked</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="time-slot" onclick="selectTimeSlot('02:00 PM', this)">
                                <div class="fw-semibold">02:00 PM</div><small>Available</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" onclick="prevStep(2)"><i
                                class="bi bi-arrow-left"></i> Back</button>
                        <button type="button" class="btn btn-doctor" onclick="nextStep(4)">Next <i
                                class="bi bi-arrow-right"></i></button>
                    </div>
                </div>

                <div class="step-content" id="step4" style="display:none;">
                    <h4 class="fw-semibold mb-4"><i class="bi bi-check-circle"></i> Confirm Appointment</h4>
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="text-primary mb-3">Appointment Summary</h5>
                            <div class="row g-3">
                                <div class="col-md-6"><label class="fw-semibold text-muted small">Patient Name</label>
                                    <p id="confirmName">-</p>
                                </div>
                                <div class="col-md-6"><label class="fw-semibold text-muted small">Contact</label>
                                    <p id="confirmContact">-</p>
                                </div>
                                <div class="col-md-6"><label class="fw-semibold text-muted small">Doctor</label>
                                    <p id="confirmDoctor">-</p>
                                </div>
                                <div class="col-md-6"><label class="fw-semibold text-muted small">Department</label>
                                    <p id="confirmDepartment">-</p>
                                </div>
                                <div class="col-md-6"><label class="fw-semibold text-muted small">Date</label>
                                    <p id="confirmDate">-</p>
                                </div>
                                <div class="col-md-6"><label class="fw-semibold text-muted small">Time</label>
                                    <p id="confirmTime">-</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" onclick="prevStep(3)"><i
                                class="bi bi-arrow-left"></i> Back</button>
                        <button type="button" class="btn btn-success btn-lg" onclick="confirmBooking()"><i
                                class="bi bi-check-circle"></i> Confirm & Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer class="footer-doctor mt-5">
        <div class="container py-4">
            <div class="text-center small text-light opacity-75">© 2026 Online Appointment Booking System</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    let selectedDoctor = {
        name: '',
        dept: ''
    };
    let selectedTime = '';

    function nextStep(step) {
        document.querySelectorAll('.step-content').forEach(el => el.style.display = 'none');
        document.getElementById('step' + step).style.display = 'block';
        for (let i = 1; i <= 4; i++) {
            const ind = document.getElementById('step' + i + 'Indicator');
            ind.classList.remove('active', 'completed');
            if (i < step) ind.classList.add('completed');
            else if (i === step) ind.classList.add('active');
        }
        if (step === 4) updateConfirmation();
    }

    function prevStep(step) {
        nextStep(step);
    }

    function selectDoctor(id, name, dept, el) {
        document.querySelectorAll('.doctor-card').forEach(card => card.classList.remove('selected'));
        el.classList.add('selected');
        selectedDoctor = {
            name,
            dept
        };
    }

    function selectTimeSlot(time, el) {
        if (el.classList.contains('unavailable')) return;
        document.querySelectorAll('.time-slot').forEach(slot => slot.classList.remove('selected'));
        el.classList.add('selected');
        selectedTime = time;
    }

    function updateConfirmation() {
        document.getElementById('confirmName').textContent =
            `${document.getElementById('firstName').value} ${document.getElementById('lastName').value}`;
        document.getElementById('confirmContact').textContent = document.getElementById('contact').value;
        document.getElementById('confirmDoctor').textContent = selectedDoctor.name || '-';
        document.getElementById('confirmDepartment').textContent = selectedDoctor.dept || '-';
        document.getElementById('confirmDate').textContent = document.getElementById('appointmentDate').value;
        document.getElementById('confirmTime').textContent = selectedTime || '-';
    }

    function confirmBooking() {
        alert('Appointment booked successfully!');
        window.location.href = 'allAppointments.php';
    }
    </script>
</body>

</html>
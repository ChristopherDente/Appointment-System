<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Doctor - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .form-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }
        .section-title {
            color: var(--doctor-primary);
            border-bottom: 2px solid var(--doctor-light);
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .upload-area:hover {
            border-color: var(--doctor-primary);
            background: var(--doctor-light);
        }
        .preview-image {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            margin-top: 1rem;
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
            <div class="d-flex align-items-center gap-2">
                <a href="doctors.php" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <div>
                    <h2 class="fw-bold mb-2">Add New Doctor</h2>
                    <p class="mb-0 opacity-90">Register a new doctor to the system</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container dashboard-content">
        <form id="addDoctorForm">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Personal Information -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-person-fill"></i> Personal Information</h5>
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
                            <div class="col-12">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="address" rows="2" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-telephone-fill"></i> Contact Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" placeholder="+63 912 345 6789" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Emergency Contact Name</label>
                                <input type="text" class="form-control" id="emergencyName">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Emergency Contact Number</label>
                                <input type="tel" class="form-control" id="emergencyPhone">
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-briefcase-fill"></i> Professional Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">License Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="licenseNumber" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Specialization <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="specialization" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                <select class="form-select" id="department" required>
                                    <option value="">Select Department</option>
                                    <option value="cardiology">Cardiology</option>
                                    <option value="pediatrics">Pediatrics</option>
                                    <option value="orthopedics">Orthopedics</option>
                                    <option value="dermatology">Dermatology</option>
                                    <option value="neurology">Neurology</option>
                                    <option value="general">General Medicine</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Years of Experience <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="experience" min="0" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Qualifications</label>
                                <textarea class="form-control" id="qualifications" rows="3" placeholder="MD, FPCP, Board Certified..."></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Biography</label>
                                <textarea class="form-control" id="biography" rows="4" placeholder="Brief professional background and areas of expertise..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Consultation Fees -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-currency-dollar"></i> Consultation Fees</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Regular Consultation Fee (₱) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="regularFee" min="0" step="0.01" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Follow-up Consultation Fee (₱)</label>
                                <input type="number" class="form-control" id="followupFee" min="0" step="0.01">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Profile Picture -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-image"></i> Profile Picture</h5>
                        <div class="upload-area" onclick="document.getElementById('photoUpload').click()">
                            <i class="bi bi-cloud-upload text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mb-0">Click to upload photo</p>
                            <small class="text-muted">JPG, PNG (Max 2MB)</small>
                        </div>
                        <input type="file" id="photoUpload" accept="image/*" style="display: none;" onchange="previewImage(this)">
                        <img id="imagePreview" class="preview-image mx-auto d-block" style="display: none;">
                    </div>

                    <!-- Account Settings -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-gear-fill"></i> Account Settings</h5>
                        <div class="mb-3">
                            <label class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="confirmPassword" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="form-card">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-doctor btn-lg">
                                <i class="bi bi-check-circle"></i> Add Doctor
                            </button>
                            <a href="doctors.php" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <footer class="footer-doctor mt-5">
        <div class="container py-4">
            <div class="text-center small text-light opacity-75">© 2026 Online Appointment Booking System</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('addDoctorForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            
            if (password.length < 6) {
                alert('Password must be at least 6 characters long!');
                return;
            }
            
            alert('Doctor added successfully!');
            window.location.href = 'doctors.php';
        });
    </script>
</body>
</html>
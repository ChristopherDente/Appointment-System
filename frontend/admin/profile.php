<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">


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
                        <a class="nav-link" href="patients.php">Patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inventory.php">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">Profile</a>
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="dashboard.php" class="text-white text-decoration-none me-3">
                    <i class="bi bi-arrow-left fs-4"></i>
                </a>
                <div>
                    <h2 class="fw-bold mb-1">My Profile</h2>
                    <p class="mb-0 opacity-90">Manage your personal information and settings</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Profile Tabs -->
        <div class="profile-tabs">
            <button class="profile-tab active" onclick="switchTab('view')">
                <i class="bi bi-person-circle me-2"></i>View Profile
            </button>
            <button class="profile-tab" onclick="switchTab('edit')">
                <i class="bi bi-pencil-square me-2"></i>Edit Profile
            </button>
            <button class="profile-tab" onclick="switchTab('password')">
                <i class="bi bi-shield-lock me-2"></i>Change Password
            </button>
            <button class="profile-tab" onclick="switchTab('medical')">
                <i class="bi bi-clipboard-pulse me-2"></i>Medical Information
            </button>
        </div>

        <!-- View Profile Tab -->
        <div id="view-tab" class="tab-content-section active">
            <div class="card-doctor p-4">
                <div class="text-center mb-4">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&size=150&background=2f9e8f&color=fff"
                        alt="Profile" class="profile-avatar">
                    <h4 class="fw-bold mb-1">John Doe</h4>
                    <p class="text-muted">Patient ID: PAT-2024-001</p>
                    <span class="badge-verified"><i class="bi bi-check-circle me-1"></i>Verified Account</span>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="profile-info-card">
                            <div class="info-label">Email Address</div>
                            <div class="info-value">john.doe@example.com</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info-card">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value">+63 912 345 6789</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info-card">
                            <div class="info-label">Date of Birth</div>
                            <div class="info-value">January 15, 1990</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info-card">
                            <div class="info-label">Gender</div>
                            <div class="info-value">Male</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info-card">
                            <div class="info-label">Blood Type</div>
                            <div class="info-value">O+</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-info-card">
                            <div class="info-label">Emergency Contact</div>
                            <div class="info-value">Jane Doe - +63 923 456 7890</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="profile-info-card">
                            <div class="info-label">Address</div>
                            <div class="info-value">123 Main Street, Samal, Central Luzon, Philippines</div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <button class="btn btn-doctor" onclick="switchTab('edit')">
                        <i class="bi bi-pencil me-2"></i>Edit Profile
                    </button>
                </div>
            </div>
        </div>

        <!-- Edit Profile Tab -->
        <div id="edit-tab" class="tab-content-section">
            <div class="card-doctor p-4">
                <h5 class="fw-semibold mb-4">
                    <i class="bi bi-pencil-square text-doctor me-2"></i>Edit Profile Information
                </h5>

                <form id="editProfileForm">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&size=150&background=2f9e8f&color=fff"
                            alt="Profile" class="profile-avatar" id="profilePreview">
                        <div class="edit-avatar-btn">
                            <label for="avatarUpload" class="btn btn-sm btn-doctor rounded-circle"
                                style="width: 40px; height: 40px; padding: 8px;">
                                <i class="bi bi-camera"></i>
                            </label>
                            <input type="file" id="avatarUpload" accept="image/*" style="display: none;"
                                onchange="previewAvatar(event)">
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="John" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="Doe" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" value="john.doe@example.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" value="+63 912 345 6789" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" value="1990-01-15" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <select class="form-control" required>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Blood Type</label>
                            <select class="form-control">
                                <option value="">Select</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+" selected>O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"
                                value="123 Main Street, Samal, Central Luzon, Philippines" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Emergency Contact Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="Jane Doe" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Emergency Contact Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" value="+63 923 456 7890" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-doctor">
                                <i class="bi bi-check-circle me-2"></i>Save Changes
                            </button>
                            <button type="button" class="btn btn-outline-secondary ms-2" onclick="switchTab('view')">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Change Password Tab -->
        <div id="password-tab" class="tab-content-section">
            <div class="card-doctor p-4">
                <h5 class="fw-semibold mb-4">
                    <i class="bi bi-shield-lock text-doctor me-2"></i>Change Password
                </h5>

                <div class="alert alert-info mb-4">
                    <i class="bi bi-info-circle me-2"></i>
                    Password must be at least 8 characters long and contain uppercase, lowercase, numbers, and special
                    characters.
                </div>

                <form id="changePasswordForm">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Current Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="currentPassword" required>
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('currentPassword')">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">New Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword" required
                                    onkeyup="checkPasswordStrength()">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('newPassword')">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div id="passwordStrength" class="password-strength mt-2"></div>
                            <small id="strengthText" class="text-muted"></small>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Confirm New Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" required>
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('confirmPassword')">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-doctor">
                                <i class="bi bi-check-circle me-2"></i>Update Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Medical Information Tab -->
        <div id="medical-tab" class="tab-content-section">
            <div class="card-doctor p-4">
                <h5 class="fw-semibold mb-4">
                    <i class="bi bi-clipboard-pulse text-doctor me-2"></i>Medical Information
                </h5>

                <div class="alert alert-warning mb-4">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Please keep your medical information up to date to help healthcare providers give you the best care.
                </div>

                <form id="medicalInfoForm">
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Allergies</label>
                            <textarea class="form-control" rows="3"
                                placeholder="List any allergies (medications, food, environmental, etc.)">Penicillin, Peanuts</textarea>
                            <div class="mt-2">
                                <span class="medical-badge allergy"><i
                                        class="bi bi-exclamation-circle me-1"></i>Penicillin</span>
                                <span class="medical-badge allergy"><i
                                        class="bi bi-exclamation-circle me-1"></i>Peanuts</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Current Medications</label>
                            <textarea class="form-control" rows="3"
                                placeholder="List all current medications with dosage">Lisinopril 10mg daily, Metformin 500mg twice daily</textarea>
                            <div class="mt-2">
                                <span class="medical-badge medication"><i class="bi bi-capsule me-1"></i>Lisinopril
                                    10mg</span>
                                <span class="medical-badge medication"><i class="bi bi-capsule me-1"></i>Metformin
                                    500mg</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Medical Conditions</label>
                            <textarea class="form-control" rows="3"
                                placeholder="List any chronic conditions or past medical history">Hypertension, Type 2 Diabetes</textarea>
                            <div class="mt-2">
                                <span class="medical-badge condition"><i
                                        class="bi bi-heart-pulse me-1"></i>Hypertension</span>
                                <span class="medical-badge condition"><i class="bi bi-heart-pulse me-1"></i>Type 2
                                    Diabetes</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Previous Surgeries</label>
                            <textarea class="form-control" rows="3"
                                placeholder="List any previous surgeries with dates">Appendectomy (2015)</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Height</label>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="170" value="170">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Weight</label>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="70" value="70">
                                <span class="input-group-text">kg</span>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold">Additional Notes</label>
                            <textarea class="form-control" rows="3"
                                placeholder="Any other medical information that might be relevant"></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-doctor">
                                <i class="bi bi-check-circle me-2"></i>Save Medical Information
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-doctor mt-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="fw-semibold text-white mb-3">
                        <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
                    </h5>
                    <p class="small text-light opacity-75">
                        A secure and easy-to-use online appointment booking platform
                        designed for patients and healthcare providers.
                    </p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white fw-semibold mb-3">Quick Links</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="book.php">Book Appointment</a></li>
                        <li><a href="upcoming.php">Upcoming Appointments</a></li>
                        <li><a href="past.php">Past Appointments</a></li>
                        <li><a href="history.php">Appointment History</a></li>
                        <li><a href="payments.php">Payments</a></li>
                        <li><a href="support.php">Support</a></li>
                        <li><a href="profile.php">Profile</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white fw-semibold mb-3">Contact</h6>
                    <p class="small text-light opacity-75 mb-2">
                        <i class="bi bi-envelope"></i> onlineappointmentsystem00@gmail.com
                    </p>
                    <p class="small text-light opacity-75 mb-3">
                        <i class="bi bi-telephone"></i> +63 9127339200
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="footer-social"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="footer-social"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="footer-social"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="footer-divider my-4">
            <div class="text-center small text-light opacity-75">
                © 2026 Online Appointment Booking System. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Switch between tabs
    function switchTab(tabName) {
        // Hide all tabs
        const tabs = document.querySelectorAll('.tab-content-section');
        tabs.forEach(tab => tab.classList.remove('active'));

        // Remove active class from all tab buttons
        const tabButtons = document.querySelectorAll('.profile-tab');
        tabButtons.forEach(btn => btn.classList.remove('active'));

        // Show selected tab
        document.getElementById(tabName + '-tab').classList.add('active');

        // Add active class to clicked tab button
        if (event && event.target) {
            event.target.classList.add('active');
        }

        // Update URL hash
        window.location.hash = tabName;
    }

    // Preview avatar upload
    function previewAvatar(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }

    // Toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = event.currentTarget.querySelector('i');

        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }

    // Check password strength
    function checkPasswordStrength() {
        const password = document.getElementById('newPassword').value;
        const strengthBar = document.getElementById('passwordStrength');
        const strengthText = document.getElementById('strengthText');

        let strength = 0;

        if (password.length >= 8) strength++;
        if (password.match(/[a-z]/)) strength++;
        if (password.match(/[A-Z]/)) strength++;
        if (password.match(/[0-9]/)) strength++;
        if (password.match(/[^a-zA-Z0-9]/)) strength++;

        strengthBar.className = 'password-strength';

        if (strength <= 2) {
            strengthBar.classList.add('strength-weak');
            strengthText.textContent = 'Weak password';
            strengthText.className = 'text-danger small';
        } else if (strength <= 4) {
            strengthBar.classList.add('strength-medium');
            strengthText.textContent = 'Medium strength password';
            strengthText.className = 'text-warning small';
        } else {
            strengthBar.classList.add('strength-strong');
            strengthText.textContent = 'Strong password';
            strengthText.className = 'text-success small';
        }
    }

    // Form submission handlers
    document.getElementById('editProfileForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Profile updated successfully!');
        switchTab('view');
    });

    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (newPassword !== confirmPassword) {
            alert('Passwords do not match!');
            return;
        }

        alert('Password changed successfully!');
        this.reset();
        document.getElementById('passwordStrength').className = 'password-strength';
        document.getElementById('strengthText').textContent = '';
    });

    document.getElementById('medicalInfoForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Medical information updated successfully!');
    });

    // Handle hash navigation for direct links
    window.addEventListener('DOMContentLoaded', function() {
        const hash = window.location.hash.substring(1);
        if (hash && ['view', 'edit', 'password', 'medical'].includes(hash)) {
            // Remove active from all sections and tabs
            document.querySelectorAll('.tab-content-section').forEach(section => {
                section.classList.remove('active');
            });
            document.querySelectorAll('.profile-tab').forEach(tab => {
                tab.classList.remove('active');
            });

            // Activate the correct tab
            document.getElementById(hash + '-tab').classList.add('active');

            // Activate the correct tab button
            const tabIndex = ['view', 'edit', 'password', 'medical'].indexOf(hash);
            if (tabIndex !== -1) {
                document.querySelectorAll('.profile-tab')[tabIndex].classList.add('active');
            }
        }
    });
    </script>
</body>

</html>
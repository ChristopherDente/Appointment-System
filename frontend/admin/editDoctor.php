<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Doctor - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
    .form-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
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

    .activity-item {
        padding: 0.75rem;
        border-left: 3px solid #e9ecef;
        margin-bottom: 0.5rem;
    }

    .activity-item:hover {
        background: #f8f9fa;
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
                <div class="flex-grow-1">
                    <h2 class="fw-bold mb-2">Edit Doctor Information</h2>
                    <p class="mb-0 opacity-90">Update doctor details and settings</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i> More Actions
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#" onclick="viewSchedule()"><i class="bi bi-calendar"></i>
                                View Schedule</a></li>
                        <li><a class="dropdown-item" href="#" onclick="viewAppointments()"><i
                                    class="bi bi-list-check"></i> View Appointments</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="deactivateDoctor()"><i
                                    class="bi bi-x-circle"></i> Deactivate Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container dashboard-content">
        <form id="editDoctorForm">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Personal Information -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-person-fill"></i> Personal Information</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstName" value="Sarah" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middleName" value="Jane">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lastName" value="Smith" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dob" value="1985-03-15" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-select" id="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female" selected>Female</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="address" rows="2"
                                    required>123 Medical Center Drive, Manila, Philippines</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-telephone-fill"></i> Contact Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phone" value="+63 912 345 6789" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" value="sarah.smith@clinic.com"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Emergency Contact Name</label>
                                <input type="text" class="form-control" id="emergencyName" value="John Smith">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Emergency Contact Number</label>
                                <input type="tel" class="form-control" id="emergencyPhone" value="+63 912 345 6700">
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-briefcase-fill"></i> Professional Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">License Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="licenseNumber" value="PRC-12345678"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Specialization <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="specialization"
                                    value="Interventional Cardiology" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                <select class="form-select" id="department" required>
                                    <option value="cardiology" selected>Cardiology</option>
                                    <option value="pediatrics">Pediatrics</option>
                                    <option value="orthopedics">Orthopedics</option>
                                    <option value="dermatology">Dermatology</option>
                                    <option value="neurology">Neurology</option>
                                    <option value="general">General Medicine</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Years of Experience <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="experience" value="12" min="0" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Qualifications</label>
                                <textarea class="form-control" id="qualifications"
                                    rows="3">MD, FPCP, Board Certified in Cardiology, Fellowship in Interventional Cardiology</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Biography</label>
                                <textarea class="form-control" id="biography"
                                    rows="4">Dr. Sarah Smith is a highly experienced cardiologist with over 12 years of practice. She specializes in interventional cardiology and has helped numerous patients with complex heart conditions.</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Consultation Fees -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-currency-dollar"></i> Consultation Fees</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Regular Consultation Fee (₱) <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="regularFee" value="1500" min="0"
                                    step="0.01" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Follow-up Consultation Fee (₱)</label>
                                <input type="number" class="form-control" id="followupFee" value="1000" min="0"
                                    step="0.01">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Profile Picture -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-image"></i> Profile Picture</h5>
                        <div class="text-center mb-3">
                            <div class="bg-doctor-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width:120px;height:120px;">
                                <i class="bi bi-person-fill text-doctor" style="font-size:4rem;"></i>
                            </div>
                        </div>
                        <div class="upload-area" onclick="document.getElementById('photoUpload').click()">
                            <i class="bi bi-cloud-upload text-muted" style="font-size:2rem;"></i>
                            <p class="text-muted mb-0 small">Click to change photo</p>
                        </div>
                        <input type="file" id="photoUpload" accept="image/*" style="display:none;"
                            onchange="previewImage(this)">
                    </div>

                    <!-- Account Settings -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-gear-fill"></i> Account Settings</h5>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" value="dr.sarah.smith" readonly>
                            <small class="text-muted">Username cannot be changed</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="status">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="on-leave">On Leave</option>
                            </select>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-warning w-100" onclick="changePassword()">
                                <i class="bi bi-key"></i> Change Password
                            </button>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-graph-up"></i> Quick Stats</h5>
                        <div class="mb-2">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Total Patients</span>
                                <strong>342</strong>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">This Month</span>
                                <strong>48 appointments</strong>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Rating</span>
                                <strong>⭐ 4.8/5.0</strong>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Member Since</span>
                                <strong>Jan 2022</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="form-card">
                        <h5 class="section-title"><i class="bi bi-clock-history"></i> Recent Activity</h5>
                        <div class="activity-item">
                            <small class="text-muted d-block">2 hours ago</small>
                            <small>Completed appointment with John Doe</small>
                        </div>
                        <div class="activity-item">
                            <small class="text-muted d-block">Yesterday</small>
                            <small>Updated schedule for next week</small>
                        </div>
                        <div class="activity-item">
                            <small class="text-muted d-block">2 days ago</small>
                            <small>Added leave date for conference</small>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-card">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-doctor btn-lg">
                                <i class="bi bi-save"></i> Save Changes
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

    <!-- Change Password Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-doctor text-white">
                    <h5 class="modal-title"><i class="bi bi-key"></i> Change Password</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmNewPassword">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-doctor" onclick="savePassword()">Change Password</button>
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
    let passwordModal;

    document.addEventListener('DOMContentLoaded', function() {
        passwordModal = new bootstrap.Modal(document.getElementById('passwordModal'));
    });

    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                alert('Image uploaded successfully!');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('editDoctorForm').addEventListener('submit', function(e) {
        e.preventDefault();
        if (confirm('Save all changes?')) {
            alert('Doctor information updated successfully!');
            window.location.href = 'doctors.php';
        }
    });

    function changePassword() {
        passwordModal.show();
    }

    function savePassword() {
        const current = document.getElementById('currentPassword').value;
        const newPass = document.getElementById('newPassword').value;
        const confirm = document.getElementById('confirmNewPassword').value;

        if (!current || !newPass || !confirm) {
            alert('Please fill in all fields');
            return;
        }

        if (newPass !== confirm) {
            alert('New passwords do not match');
            return;
        }

        if (newPass.length < 6) {
            alert('Password must be at least 6 characters');
            return;
        }

        alert('Password changed successfully!');
        passwordModal.hide();
        document.getElementById('currentPassword').value = '';
        document.getElementById('newPassword').value = '';
        document.getElementById('confirmNewPassword').value = '';
    }

    function viewSchedule() {
        window.location.href = 'doctorSchedule.php?id=1';
    }

    function viewAppointments() {
        window.location.href = 'allAppointments.php?doctor=1';
    }

    function deactivateDoctor() {
        if (confirm('Are you sure you want to deactivate this doctor account? This action can be reversed later.')) {
            alert('Doctor account deactivated');
            window.location.href = 'doctors.php';
        }
    }
    </script>
</body>

</html>
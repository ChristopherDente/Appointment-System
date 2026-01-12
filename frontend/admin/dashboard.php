<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
    .quick-action-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
        height: 100%;
        text-decoration: none;
        display: block;
        border: 2px solid transparent;
    }

    .quick-action-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        border-color: var(--doctor-primary);
    }

    .quick-action-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1rem;
        background: var(--doctor-light);
        color: var(--doctor-primary);
    }

    .table-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .badge-status {
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
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
                        <a class="nav-link active" href="dashboard.php">Dashboard</a>
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="d-flex align-items-center">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-2">Admin Dashboard</h2>
                    <p class="mb-0 opacity-90">Welcome back! Here's what's happening today.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="container dashboard-content">
        <!-- Stats Overview -->
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card1">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon blue">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">24</h3>
                            <p class="text-muted mb-0 small">Today's Appointments</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card1">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon green">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">₱12,450</h3>
                            <p class="text-muted mb-0 small">Today's Revenue</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card1">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon yellow">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">15</h3>
                            <p class="text-muted mb-0 small">Active Doctors</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card1">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon purple">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">342</h3>
                            <p class="text-muted mb-0 small">Total Patients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="fw-semibold mb-3"><i class="bi bi-lightning"></i> Quick Actions</h4>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <a href="admin-book-walkin.php" class="quick-action-card">
                    <div class="quick-action-icon">
                        <i class="bi bi-person-plus"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">Book Walk-in</h5>
                    <p class="text-muted small mb-0">Register walk-in patient</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <a href="admin-add-doctor.php" class="quick-action-card">
                    <div class="quick-action-icon">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">Add Doctor</h5>
                    <p class="text-muted small mb-0">Register new doctor</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <a href="admin-appointments.php" class="quick-action-card">
                    <div class="quick-action-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">View Appointments</h5>
                    <p class="text-muted small mb-0">Manage all appointments</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mb-3">
                <a href="admin-daily-report.php" class="quick-action-card">
                    <div class="quick-action-icon">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                    </div>
                    <h5 class="fw-semibold text-dark">Generate Report</h5>
                    <p class="text-muted small mb-0">View reports & analytics</p>
                </a>
            </div>
        </div>

        <!-- Today's Appointments & Recent Activity -->
        <div class="row g-4">
            <!-- Today's Appointments -->
            <div class="col-lg-8">
                <div class="table-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-semibold mb-0"><i class="bi bi-calendar-day"></i> Today's Appointments</h5>
                        <a href="admin-appointments.php" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>09:00 AM</strong></td>
                                    <td>John Doe</td>
                                    <td>Dr. Smith</td>
                                    <td>Cardiology</td>
                                    <td><span class="badge badge-status bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>10:30 AM</strong></td>
                                    <td>Jane Smith</td>
                                    <td>Dr. Johnson</td>
                                    <td>Pediatrics</td>
                                    <td><span class="badge badge-status bg-primary">In Progress</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>11:00 AM</strong></td>
                                    <td>Mike Wilson</td>
                                    <td>Dr. Brown</td>
                                    <td>Orthopedics</td>
                                    <td><span class="badge badge-status bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>02:00 PM</strong></td>
                                    <td>Sarah Davis</td>
                                    <td>Dr. Martinez</td>
                                    <td>Dermatology</td>
                                    <td><span class="badge badge-status bg-secondary">Scheduled</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>03:30 PM</strong></td>
                                    <td>Robert Lee</td>
                                    <td>Dr. Taylor</td>
                                    <td>Neurology</td>
                                    <td><span class="badge badge-status bg-secondary">Scheduled</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Stats -->
            <div class="col-lg-4">
                <!-- Quick Stats -->
                <div class="table-card mb-4">
                    <h5 class="fw-semibold mb-3"><i class="bi bi-graph-up"></i> Quick Stats</h5>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Pending Appointments</span>
                            <strong>8</strong>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-warning" style="width: 33%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Completed Today</span>
                            <strong>12</strong>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-success" style="width: 50%"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Cancelled</span>
                            <strong>4</strong>
                        </div>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar bg-danger" style="width: 17%"></div>
                        </div>
                    </div>
                </div>

                <!-- Recent Notifications -->
                <div class="table-card">
                    <h5 class="fw-semibold mb-3"><i class="bi bi-bell"></i> Recent Notifications</h5>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex gap-2">
                                <i class="bi bi-calendar-plus text-primary"></i>
                                <div class="flex-grow-1">
                                    <small class="text-muted">2 min ago</small>
                                    <p class="mb-0 small">New appointment booked by Maria Garcia</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex gap-2">
                                <i class="bi bi-x-circle text-danger"></i>
                                <div class="flex-grow-1">
                                    <small class="text-muted">15 min ago</small>
                                    <p class="mb-0 small">Appointment cancelled by John Smith</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex gap-2">
                                <i class="bi bi-check-circle text-success"></i>
                                <div class="flex-grow-1">
                                    <small class="text-muted">1 hour ago</small>
                                    <p class="mb-0 small">Payment received from Alice Brown</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item px-0 border-0">
                            <div class="d-flex gap-2">
                                <i class="bi bi-person-badge text-info"></i>
                                <div class="flex-grow-1">
                                    <small class="text-muted">2 hours ago</small>
                                    <p class="mb-0 small">New doctor Dr. Williams added</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-sm btn-outline-primary">View All Notifications</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content card-doctor border-0 shadow">

                <div class="modal-header bg-doctor text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="frontend/login_process.php">
                    <div class="modal-body">

                        <div class="position-relative mb-3">
                            <i class="bi bi-person form-icon"></i>
                            <input type="text" name="username" class="form-control form-input" placeholder="Username"
                                required>
                        </div>

                        <div class="position-relative mb-2">
                            <i class="bi bi-lock form-icon"></i>
                            <input type="password" id="passwordField" name="password" class="form-control form-input"
                                placeholder="Password" required>
                            <i class="bi bi-eye eye-icon" id="togglePassword"></i>
                        </div>

                        <div class="mb-3">
                            <a href="frontend/forgot_password.php" class="forgot-link">Forgot Password?</a>
                        </div>

                        <!-- Divider -->
                        <div class="position-relative my-4">
                            <hr>
                            <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                OR
                            </span>
                        </div>

                        <!-- Google Sign-In Button -->
                        <div class="d-grid">
                            <button type="button" class="btn btn-outline-secondary btn-google" id="googleSignInBtn">
                                <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                    style="vertical-align: middle; margin-right: 8px;">
                                    <path fill="#EA4335"
                                        d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z" />
                                    <path fill="#4285F4"
                                        d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z" />
                                    <path fill="#FBBC05"
                                        d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z" />
                                    <path fill="#34A853"
                                        d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z" />
                                    <path fill="none" d="M0 0h48v48H0z" />
                                </svg>
                                Continue with Google
                            </button>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-doctor px-4">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </button>
                    </div>
                </form>

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
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#passwordField');

    togglePassword.addEventListener('click', () => {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        togglePassword.classList.toggle('bi-eye');
        togglePassword.classList.toggle('bi-eye-slash');
    });
    </script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script>
    // Initialize Google Sign-In
    function initializeGoogleSignIn() {
        google.accounts.id.initialize({
            client_id: 'YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com', // Replace with your actual Client ID
            callback: handleGoogleSignIn
        });
    }

    // Handle Google Sign-In response
    function handleGoogleSignIn(response) {
        // Send the credential token to your backend
        fetch('frontend/google_login_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    credential: response.credential
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Redirect or close modal on success
                    window.location.href = data.redirect || 'dashboard.php';
                } else {
                    alert(data.message || 'Login failed. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred during login.');
            });
    }

    // Button click handler
    document.getElementById('googleSignInBtn')?.addEventListener('click', function() {
        google.accounts.id.prompt(); // Show the One Tap dialog
    });

    // Initialize when page loads
    window.addEventListener('load', initializeGoogleSignIn);
    </script>

</body>

</html>
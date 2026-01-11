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

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-semibold" href="#">
                <span class="navbar-brand fw-semibold">
                    <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
                </span>

            </a>

            <!-- Mobile toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="appointmentDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Appointments
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="appointmentDropdown">
                            <li><a class="dropdown-item" href="book.php">Book Appointment</a></li>
                            <li><a class="dropdown-item" href="upcoming.php">Upcoming
                                    Appointments</a></li>
                            <li><a class="dropdown-item" href="past.php">Past Appointments</a>
                            </li>
                            <li><a class="dropdown-item" href="history.php">Appointment
                                    History</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payments.php">
                            Payments
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="support.php">
                            Support
                        </a>
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
                                <a class="dropdown-item text-center text-primary fw-semibold"
                                    href="frontend/notifications.php">
                                    View all notifications
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="view.php">View Profile</a></li>
                            <li><a class="dropdown-item" href="edit.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="change-password.php">Change Password</a>
                            </li>
                            <li><a class="dropdown-item" href="medical-info.php">Medical
                                    Information</a></li>
                        </ul>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a class="nav-link-login nav-link" href="frontend/logout.php"
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
                    <h2 class="fw-bold mb-2">Welcome back, John!</h2>
                    <p class="mb-0 opacity-90">Manage your appointments and health information in one place.</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <button class="btn btn-light btn-lg px-4">
                        <i class="bi bi-calendar-plus"></i> Book New Appointment
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="container dashboard-content">
         
        <!-- Stats Overview -->
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">3</h3>
                            <p class="text-muted mb-0 small">Upcoming</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">12</h3>
                            <p class="text-muted mb-0 small">Completed</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center gap-3">
                        <div class="stat-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0">₱0</h3>
                            <p class="text-muted mb-0 small">Pending</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="fw-semibold mb-4">Quick Actions</h4>
            </div>
            <div class="col-md-4 mb-3">
                <a href="book-appointment.php" class="text-decoration-none">
                    <div class="stat-card text-center">
                        <div class="stat-icon mx-auto mb-3">
                            <i class="bi bi-calendar-plus"></i>
                        </div>
                        <h5 class="fw-semibold text-doctor">Book Appointment</h5>
                        <p class="text-muted small mb-0">Schedule a new appointment with a doctor</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="upcoming-appointments.php" class="text-decoration-none">
                    <div class="stat-card text-center">
                        <div class="stat-icon mx-auto mb-3">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h5 class="fw-semibold text-doctor">View Appointments</h5>
                        <p class="text-muted small mb-0">Check your upcoming and past appointments</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="payments.php" class="text-decoration-none">
                    <div class="stat-card text-center">
                        <div class="stat-icon mx-auto mb-3">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <h5 class="fw-semibold text-doctor">Payment History</h5>
                        <p class="text-muted small mb-0">View billing and payment records</p>
                    </div>
                </a>
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
                        <li><a href="view.php">Profile</a></li>
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
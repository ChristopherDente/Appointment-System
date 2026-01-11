<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="frontend/style.css">

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
                        <a class="nav-link active" href="frontend/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="frontend/about-us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="frontend/doctor-list.php">Doctor List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="frontend/departments.php">Departments & Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="frontend/contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <span class="nav-link-login nav-link" role="button" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </span>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="container mt-5">
        <div class="row align-items-start">

            <!-- LEFT HERO TEXT -->
            <div class="col-md-6 hero-left">
                <div class="card card-doctor border-0">
                    <div class="card-body p-5 text-left">

                        <span class="text-uppercase text-doctor fw-semibold small">
                            ACE Medical Center - Baypointe
                        </span>

                        <h1 class="fw-bold mt-2 mb-3">
                            Online Appointment Booking System
                        </h1>

                        <p class="text-muted mb-4">
                            Schedule, manage, and track your medical appointments easily
                            using our secure and patient-friendly system.
                        </p>

                        <div class="d-flex d-flex-left gap-3 flex-wrap">
                            <button class="btn btn-doctor btn-lg px-4" data-bs-toggle="modal"
                                data-bs-target="#appointmentModal">
                                <i class="bi bi-calendar-plus"></i> Book Appointment
                            </button>

                            <button class="btn btn-outline-doctor btn-lg px-4" data-bs-toggle="modal"
                                data-bs-target="#trackModal">
                                <i class="bi bi-search"></i> Track Appointment
                            </button>
                        </div>

                        <div class="mt-4 text-muted small">
                            <i class="bi bi-shield-check text-doctor"></i>
                            Secure • Confidential • Reliable
                        </div>

                    </div>
                </div>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="col-md-6 text-center d-none d-md-block">
                <img src="frontend/images/calendar.jpg" alt="Calendar" class="hero-img">
            </div>

        </div>
    </div>

    <!-- Book Appointment Modal -->
    <div class="modal fade" id="appointmentModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content card-doctor border-0 shadow">

                <div class="modal-header bg-doctor text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-calendar-plus"></i> Book Appointment
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="frontend/save.php">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Appointment Date</label>
                                <input type="date" name="appointment_date" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Appointment Time</label>
                                <input type="time" name="appointment_time" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Reason for Visit</label>
                                <textarea name="reason" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button class="btn btn-doctor px-4">
                            <i class="bi bi-check-circle"></i> Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Track Appointment Modal -->
    <div class="modal fade" id="trackModal" tabindex="-1">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content card-doctor border-0 shadow">

                <div class="modal-header bg-doctor text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-search"></i> Track Appointment
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <form>
                    <div class="modal-body">
                        <label class="form-label">Enter your email</label>
                        <input type="email" class="form-control" required>
                        <small class="text-muted">View your appointment status.</small>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button class="btn btn-doctor px-4">
                            <i class="bi bi-search"></i> Track
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Login / Register Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content card-doctor border-0 shadow">

            <!-- Modal Header -->
            <div class="modal-header bg-doctor text-white">
                <h5 class="modal-title" id="modalTitle">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <!-- LOGIN FORM -->
                <form id="loginForm">
                    <div class="form-section" id="loginSection">

                        <div class="position-relative mb-3">
                            <i class="bi bi-person form-icon"></i>
                            <input type="text" name="username" class="form-control form-input" placeholder="Username" required>
                        </div>

                        <div class="position-relative mb-2">
                            <i class="bi bi-lock form-icon"></i>
                            <input type="password" id="passwordField" name="password" class="form-control form-input" placeholder="Password" required>
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
                        <div class="d-grid mb-3">
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

                        <div class="text-center small mb-3">
                            Don't have an account? 
                            <a href="#" id="showRegister">Register here</a>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-doctor px-4">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </button>
                    </div>
                </form>

                <!-- REGISTER FORM -->
                <form id="registerForm" style="display: none;">
                    <div class="form-section" id="registerSection">
                        <!-- Google Sign-In Button -->
                        <div class="d-grid mb-3">
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

                        <!-- Divider -->
                        <div class="position-relative my-4">
                            <hr>
                            <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                OR
                            </span>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="username" class="form-control form-input" placeholder="Username" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" class="form-control form-input" placeholder="Password" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="confirm_password" class="form-control form-input" placeholder="Confirm Password" required>
                        </div>

                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-doctor px-4">
                                <i class="bi bi-person-plus"></i> Register
                            </button>
                        </div>

                        <div class="text-center small mb-3">
                            Already have an account? 
                            <a href="#" id="showLogin">Login here</a>
                        </div>                        

                    </div>
                    
                </form>

            </div>
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
                        <li><a href="frontend/index.php">Home</a></li>
                        <li><a href="frontend/about-us.php">About Us</a></li>
                        <li><a href="frontend/doctor-list.php">Doctor List</a></li>
                        <li><a href="frontend/departments.php">Departments & Services</a></li>
                        <li><a href="frontend/contact.php">Contact Us</a></li>
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
    


<script>
// Toggle between Login and Register forms
document.getElementById('showRegister').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
    document.getElementById('modalTitle').innerHTML = '<i class="bi bi-person-plus"></i> Register';
});

document.getElementById('showLogin').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('modalTitle').innerHTML = '<i class="bi bi-box-arrow-in-right"></i> Login';
});

// LOGIN AJAX
const loginForm = document.getElementById('loginForm');
loginForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const username = loginForm.username.value;
    const password = loginForm.password.value;

    fetch('http://appointment-system.test/backend/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username, password })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if (data.success) window.location.href = data.redirect;
    })
    .catch(err => {
        console.error(err);
        alert("An error occurred while logging in.");
    });
});

// REGISTER AJAX
const registerForm = document.getElementById('registerForm');
registerForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const username = registerForm.username.value;
    const password = registerForm.password.value;
    const confirm_password = registerForm.confirm_password.value;

    fetch('http://appointment-system.test/backend/register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username, password, confirm_password })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if (data.success) {
            // Switch to login after successful registration
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('modalTitle').innerHTML = '<i class="bi bi-box-arrow-in-right"></i> Login';
        }
    })
    .catch(err => {
        console.error(err);
        alert("An error occurred during registration");
    });
});
</script>






</body>

</html>
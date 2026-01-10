<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Appointment System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Eye-Friendly Medical Theme with Larger Hero Fonts -->
    <style>
        body {
            background-color: white;
            color: #1f2937;
        }

        .bg-doctor {
            background-color: #2f9e8f;
        }

        .text-doctor {
            color: #2f9e8f;
        }

        .btn-doctor {
            background-color: #2f9e8f;
            border: none;
            color: #ffffff;
            border-radius: 12px;
        }

        .btn-doctor:hover {
            background-color: #268c7f;
            color: #ffffff;
        }

        .btn-outline-doctor {
            border: 2px solid #2f9e8f;
            color: #2f9e8f;
            background-color: transparent;
            border-radius: 12px;
        }

        .btn-outline-doctor:hover {
            background-color: #e6f4f1;
        }

        .card-doctor {
            border-radius: 18px;
            background-color: #ffffff;
            box-shadow: none !important;
        }

        .step-icon {
            background-color: #e6f4f1;
            color: #2f9e8f;
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .nav-link-login {
            color: #ffffff;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
        }

        .nav-link-login:hover {
            color: #e6f4f1;
        }

        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #2f9e8f;
        }

        .form-input {
            padding-left: 40px;
        }

        .forgot-link {
            font-size: 0.9rem;
            text-decoration: none;
            color: #2f9e8f;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .eye-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #2f9e8f;
            cursor: pointer;
        }

        h1 {
            letter-spacing: -0.5px;
        }

        .hero-img {
            max-width: 100%;
            height: auto;
        }

        .navbar {
            box-shadow: none !important;
        }

        /* HERO LEFT TOP */
        .hero-left {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        /* Increase font sizes in hero */
        .hero-left .small {
            font-size: 1.3rem; /* Subtitle */
        }

        .hero-left h1 {
            font-size: 3.5rem; /* Main heading */
        }

        .hero-left p {
            font-size: 1.25rem; /* Paragraph */
        }

        /* BUTTON ALIGN LEFT */
        .d-flex-left {
            justify-content: start !important;
        }

        /* "How It Works" section center */
        .how-it-works {
            text-align: center;
        }

        /* Mission Vision Section */
        .mission-vision h3 {
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .mission-vision p {
            font-size: 1rem;
            color: #4b5563;
        }

        #scrollTopBtn {
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 1000;
            display: none; /* hidden by default */
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 1.5rem;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0;
        }

    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
    <div class="container">

        <!-- Brand -->
        <span class="navbar-brand fw-semibold">
            <i class="bi bi-heart-pulse"></i> Doctor Appointment
        </span>

        <!-- Toggle for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#doctorNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="doctorNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>

                <!-- Login inside UL -->
                <li class="nav-item">
                    <a class="nav-link nav-link-login"
                       data-bs-toggle="modal"
                       data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
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
                        Healthcare Made Simple
                    </span>

                    <h1 class="fw-bold mt-2 mb-3">
                        Doctor Appointment Booking
                    </h1>

                    <p class="text-muted mb-4">
                        Schedule, manage, and track your medical appointments easily
                        using our secure and patient-friendly system.
                    </p>

                    <div class="d-flex d-flex-left gap-3 flex-wrap">
                        <button class="btn btn-doctor btn-lg px-4" id="bookAppointmentBtn">
    <i class="bi bi-calendar-plus"></i> Book Appointment
</button>


                        <button class="btn btn-outline-doctor btn-lg px-4"
                            data-bs-toggle="modal"
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

<!-- How It Works -->
<div class="container mt-5 how-it-works">
    <div class="mb-5">
        <h3 class="fw-bold">How It Works</h3>
        <p class="text-muted">Simple & patient-friendly process</p>
    </div>
    <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card card-doctor h-100 border-0 p-4 text-center">
                <div class="step-icon mb-3"><i class="bi bi-clipboard-data fs-2"></i></div>
                <h6 class="fw-semibold">Choose Service</h6>
                <p class="text-muted small">Pick the type of doctor</p>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card card-doctor h-100 border-0 p-4 text-center">
                <div class="step-icon mb-3"><i class="bi bi-calendar-plus fs-2"></i></div>
                <h6 class="fw-semibold">Book Appointment</h6>
                <p class="text-muted small">Select date & time</p>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card card-doctor h-100 border-0 p-4 text-center">
                <div class="step-icon mb-3"><i class="bi bi-person-lines-fill fs-2"></i></div>
                <h6 class="fw-semibold">Fill Details</h6>
                <p class="text-muted small">Enter your personal info</p>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card card-doctor h-100 border-0 p-4 text-center">
                <div class="step-icon mb-3"><i class="bi bi-check-circle fs-2"></i></div>
                <h6 class="fw-semibold">Confirm Appointment</h6>
                <p class="text-muted small">Review & confirm your booking</p>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card card-doctor h-100 border-0 p-4 text-center">
                <div class="step-icon mb-3"><i class="bi bi-search fs-2"></i></div>
                <h6 class="fw-semibold">Track & Visit</h6>
                <p class="text-muted small">Track your appointment and visit doctor</p>
            </div>
        </div>
    </div>
</div>

<!-- More Details Section -->
<div class="container mt-5">
    <div class="text-center mb-5">
        <h3 class="fw-bold">More Details</h3>
        <p class="text-muted">Discover why our system is secure, convenient, and easy to use</p>
    </div>
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card card-doctor h-100 border-0 shadow-sm p-4 text-center">
                <i class="bi bi-shield-lock fs-1 text-doctor mb-3"></i>
                <h5 class="fw-semibold mb-2">Secure & Confidential</h5>
                <p class="text-muted small">All your personal and medical data is protected with top-notch security.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-doctor h-100 border-0 shadow-sm p-4 text-center">
                <i class="bi bi-clock-history fs-1 text-doctor mb-3"></i>
                <h5 class="fw-semibold mb-2">Flexible Scheduling</h5>
                <p class="text-muted small">Book appointments at your preferred time with real-time availability.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-doctor h-100 border-0 shadow-sm p-4 text-center">
                <i class="bi bi-chat-left-text fs-1 text-doctor mb-3"></i>
                <h5 class="fw-semibold mb-2">Easy Communication</h5>
                <p class="text-muted small">Receive instant confirmations, reminders, and updates about your visits.</p>
            </div>
        </div>
    </div>
</div>

<!-- Mission & Vision Section -->
<div id="about" class="container mt-5 mission-vision">
    <div class="text-center mb-5">
        <h3 class="fw-bold">Mission & Vision</h3>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Mission -->
        <div class="col-md-6">
            <div class="card card-doctor h-100 border-0 shadow-sm p-4">
                <h5 class="fw-bold text-doctor mb-3"><i class="bi bi-bullseye me-2"></i>Mission</h5>
                <p>
                    To provide accessible, reliable, and efficient medical appointment services that prioritize patient convenience and privacy.
                </p>
            </div>
        </div>

        <!-- Vision -->
        <div class="col-md-6">
            <div class="card card-doctor h-100 border-0 shadow-sm p-4">
                <h5 class="fw-bold text-doctor mb-3"><i class="bi bi-eye me-2"></i>Vision</h5>
                <p>
                    To become the leading online platform for seamless healthcare scheduling, improving patient engagement and satisfaction worldwide.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modals and Scripts -->
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

            <form method="POST" action="save.php">
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

            <form method="POST" action="login_process.php">
                <div class="modal-body">
                    <div class="position-relative mb-3">
                        <i class="bi bi-person form-icon"></i>
                        <input type="text" name="username" class="form-control form-input" placeholder="Username" required>
                    </div>

                    <div class="position-relative mb-2">
                        <i class="bi bi-lock form-icon"></i>
                        <input type="password" id="passwordField" name="password" class="form-control form-input" placeholder="Password" required>
                        <i class="bi bi-eye eye-icon" id="togglePassword"></i>
                    </div>

                    <div class="mb-2">
                        <a href="forgot_password.php" class="forgot-link">Forgot Password?</a>
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

<!-- Scroll to Top Button -->
<button id="scrollTopBtn" class="btn btn-doctor" title="Go to top">
    <i class="bi bi-arrow-up"></i>
</button>


<!-- Footer -->
<footer class="bg-doctor text-white mt-5 pt-5 pb-4">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-4">
                <h5><i class="bi bi-heart-pulse"></i> Online Appointment Booking System</h5>
                <p class="small text-white-50">A secure and easy-to-use online appointment booking platform designed for patients and healthcare providers.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="small text-white-50 text-decoration-none"><i class="bi bi-calendar-plus"></i> Book Appointment</a></li>
                    <li><a href="#" class="small text-white-50 text-decoration-none"><i class="bi bi-search"></i> Track Appointment</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Contact</h5>
                <p class="small text-white-50 mb-2"><i class="bi bi-envelope"></i> support@doctorappointment.com</p>
                <p class="small text-white-50 mb-3"><i class="bi bi-telephone"></i> +63 912 345 6789</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white fs-4"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-light my-4">
        <div class="text-center small text-white-50">© 2026 Online Appointment Booking System. All rights reserved.</div>
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
<script>
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    // Show button when user scrolls down 200px
    window.onscroll = function() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            scrollTopBtn.style.display = "flex";
        } else {
            scrollTopBtn.style.display = "none";
        }
    };

    // Scroll to top smoothly when clicked
    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

</script>
<script>
    // Simulate login status
    let isLoggedIn = false; // <-- change to true if user is logged in

    const bookBtn = document.getElementById('bookAppointmentBtn');
    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    const appointmentModal = new bootstrap.Modal(document.getElementById('appointmentModal'));

    bookBtn.addEventListener('click', () => {
        if (!isLoggedIn) {
            // Show login modal first
            loginModal.show();

            // After login, show appointment modal
            const loginForm = document.querySelector('#loginModal form');
            loginForm.addEventListener('submit', function handler(e) {
                e.preventDefault(); // prevent default form submission for demo

                // Simulate login success (here you would actually validate login)
                isLoggedIn = true;

                loginModal.hide(); // hide login modal
                appointmentModal.show(); // show appointment modal

                // Remove this event listener to prevent multiple triggers
                loginForm.removeEventListener('submit', handler);
            });
        } else {
            // User already logged in, just show appointment modal
            appointmentModal.show();
        }
    });
</script>


</body>
</html>

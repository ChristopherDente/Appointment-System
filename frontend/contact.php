<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-semibold" href="../index.php">
                <span class="navbar-brand fw-semibold">
                    <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctor-list.php">Doctor List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="departments.php">Departments & Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contact.php">Contact Us</a>
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

    <!-- Hero Section -->
    <div class="container mt-5">
        <div class="row align-items-start">
            <div class="col-md-6 hero-left">
                <div class="card card-doctor border-0">
                    <div class="card-body p-5 text-left">
                        <span class="text-uppercase text-doctor fw-semibold small">
                            Get In Touch
                        </span>

                        <h1 class="fw-bold mt-2 mb-3">
                            Contact Us
                        </h1>

                        <p class="text-muted mb-4">
                            Have questions or need assistance? We're here to help. 
                            Reach out to us through any of the channels below.
                        </p>

                        <div class="d-flex d-flex-left gap-3 flex-wrap">
                            <button class="btn btn-doctor btn-lg px-4" data-bs-toggle="modal"
                                data-bs-target="#appointmentModal">
                                <i class="bi bi-calendar-plus"></i> Book Appointment
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 text-center d-none d-md-block">
                <img src="images/calendar.jpg" alt="Contact" class="hero-img">
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4 text-center">
                        <div class="step-icon mb-3">
                            <i class="bi bi-geo-alt-fill fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Visit Us</h5>
                        <p class="text-muted">
                            ACE Medical Center - Baypointe<br>
                            123 Health Street, Baypointe<br>
                            Samal, Central Luzon, Philippines<br>
                            2000
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4 text-center">
                        <div class="step-icon mb-3">
                            <i class="bi bi-telephone-fill fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Call Us</h5>
                        <p class="text-muted">
                            Main Line:<br>
                            <strong>+63 9127339200</strong><br><br>
                            Emergency Hotline:<br>
                            <strong>+63 9127339201</strong>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4 text-center">
                        <div class="step-icon mb-3">
                            <i class="bi bi-envelope-fill fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Email Us</h5>
                        <p class="text-muted">
                            General Inquiries:<br>
                            <strong>onlineappointmentsystem00@gmail.com</strong><br><br>
                            Appointments:<br>
                            <strong>appointments@acemedical.com</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form + Map -->
    <div class="container my-5">
        <div class="row g-4 align-items-stretch">

            <!-- Map (Left) -->
            <div class="col-lg-6">
                <div class="card card-doctor h-100">
                    <div class="card-body p-0" style="border-radius: 18px; overflow: hidden;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1621.6804713896681!2d120.27176484339998!3d14.82369164341832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396713dc6158cd5%3A0xce084c90e0457df1!2sAllied%20Care%20Experts%20(ACE)%20Medical%20Center%20-%20Baypointe%2C%20Inc.!5e0!3m2!1sen!2sph!4v1768089940140!5m2!1sen!2sph"
                            width="100%"
                            height="100%"
                            style="border:0; min-height: 100%;"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Contact Form (Right) -->
            <div class="col-lg-6">
                <div class="card card-doctor h-100">
                    <div class="card-body p-5">
                        <h3 class="fw-bold text-center mb-4">Send Us a Message</h3>
                        <form method="POST" action="contact_process.php">
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
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Subject</label>
                                    <select name="subject" class="form-control" required>
                                        <option value="">Choose a subject...</option>
                                        <option value="General Inquiry">General Inquiry</option>
                                        <option value="Appointment">Appointment Question</option>
                                        <option value="Medical Records">Medical Records</option>
                                        <option value="Billing">Billing Question</option>
                                        <option value="Feedback">Feedback</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" class="form-control" rows="5" required></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-doctor btn-lg px-5">
                                        <i class="bi bi-send"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Office Hours -->
    <div class="container my-5">
        <div class="card card-doctor">
            <div class="card-body p-5">
                <h3 class="fw-bold text-center mb-4">Office Hours</h3>
                <div class="row text-center g-4">
                    <div class="col-md-6">
                        <h5 class="text-doctor fw-bold mb-3">Outpatient Services</h5>
                        <p class="text-muted mb-2"><strong>Monday - Friday:</strong> 8:00 AM - 6:00 PM</p>
                        <p class="text-muted mb-2"><strong>Saturday:</strong> 9:00 AM - 3:00 PM</p>
                        <p class="text-muted"><strong>Sunday:</strong> Closed</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-doctor fw-bold mb-3">Emergency Services</h5>
                        <p class="text-muted mb-2"><strong>24/7 Emergency Care</strong></p>
                        <p class="text-muted mb-2">Available every day</p>
                        <p class="text-muted">including holidays</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="container my-5">
        <h3 class="fw-bold text-center mb-4">Frequently Asked Questions</h3>

        <div class="row align-items-center g-4">

            <!-- FAQ Accordion (RIGHT) -->
            <div class="col-lg-7">
                <div class="accordion" id="faqAccordion">

                    <div class="accordion-item card-doctor border mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How do I book an appointment?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                You can book an appointment online through our website by clicking the "Book Appointment" button,
                                or call us at +63 9127339200 during office hours.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item card-doctor border mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do you accept walk-in patients?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Yes, we accept walk-in patients, but we recommend booking an appointment in advance.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item card-doctor border mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What insurance plans do you accept?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                We accept most major health insurance plans. Please contact billing for details.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item card-doctor border mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                How can I get my medical records?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Request your medical records by visiting our Medical Records department or emailing us.
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- FAQ Image (LEFT) -->
            <div class="col-lg-5 text-center">
                <img src="images/FAQ.jpg" alt="FAQ" class="img-fluid rounded-4">
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
                        <div class="mb-3">
                            <a href="forgot_password.php" class="forgot-link">Forgot Password?</a>
                        </div>
                        <div class="position-relative my-4">
                            <hr>
                            <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">OR</span>
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn btn-outline-secondary btn-google" id="googleSignInBtn">
                                <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" style="vertical-align: middle; margin-right: 8px;">
                                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                                    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                                    <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                                    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                                    <path fill="none" d="M0 0h48v48H0z"/>
                                </svg>
                                Continue with Google
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-doctor px-4">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </button>
                    </div>
                </form>
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
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-doctor px-4">
                            <i class="bi bi-check-circle"></i> Submit
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
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="doctor-list.php">Doctor List</a></li>
                        <li><a href="departments.php">Departments & Services</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
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
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Departments & Services - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- navbar -->
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctor-list.php">Doctor List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="departments.php">Departments & Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
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
                            Comprehensive Healthcare
                        </span>

                        <h1 class="fw-bold mt-2 mb-3">
                            Our Departments & Services
                        </h1>

                        <p class="text-muted mb-4">
                            We offer a wide range of medical services and specialized departments 
                            to meet all your healthcare needs under one roof.
                        </p>

                        <div class="d-flex d-flex-left gap-3 flex-wrap">
                             <button class="btn btn-doctor btn-lg px-4" data-bs-toggle="modal"
                                data-bs-target="#loginModal">
                                <i class="bi bi-calendar-plus"></i> Book Appointment
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 text-center d-none d-md-block">
                <img src="assets/images/calendar.jpg" alt="Services" class="hero-img">
            </div>
        </div>
    </div>

    <!-- Departments -->
    <div class="container my-5">
        <h2 class="text-center fw-bold mb-5">Medical Departments</h2>
        <div class="row g-4">
            <!-- Department 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4">
                        <div class="step-icon mb-3">
                            <i class="bi bi-heart-pulse-fill fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Cardiology</h5>
                        <p class="text-muted mb-3">
                            Comprehensive heart care including diagnosis, treatment, and prevention of cardiovascular diseases.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>ECG - <strong class="text-doctor">₱800</strong></li>
                            <li>Echocardiography - <strong class="text-doctor">₱3,500</strong></li>
                            <li>Cardiac Catheterization - <strong class="text-doctor">₱45,000</strong></li>
                            <li>Consultation - <strong class="text-doctor">₱1,200</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Department 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4">
                        <div class="step-icon mb-3">
                            <i class="bi bi-person-hearts fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Pediatrics</h5>
                        <p class="text-muted mb-3">
                            Specialized care for infants, children, and adolescents with a child-friendly environment.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Well-Child Check-up - <strong class="text-doctor">₱800</strong></li>
                            <li>Immunization (per dose) - <strong class="text-doctor">₱500-₱1,500</strong></li>
                            <li>Growth Monitoring - <strong class="text-doctor">₱600</strong></li>
                            <li>Consultation - <strong class="text-doctor">₱900</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Department 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4">
                        <div class="step-icon mb-3">
                            <i class="bi bi-bandaid fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Orthopedics</h5>
                        <p class="text-muted mb-3">
                            Treatment of musculoskeletal conditions including bones, joints, ligaments, and muscles.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>X-Ray Reading - <strong class="text-doctor">₱600</strong></li>
                            <li>Joint Injection - <strong class="text-doctor">₱2,500</strong></li>
                            <li>Fracture Treatment - <strong class="text-doctor">₱5,000+</strong></li>
                            <li>Consultation - <strong class="text-doctor">₱1,200</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Department 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4">
                        <div class="step-icon mb-3">
                            <i class="bi bi-gender-female fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Obstetrics & Gynecology</h5>
                        <p class="text-muted mb-3">
                            Complete women's health services from pregnancy care to reproductive health.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Prenatal Check-up - <strong class="text-doctor">₱1,000</strong></li>
                            <li>Ultrasound (2D) - <strong class="text-doctor">₱1,500</strong></li>
                            <li>Ultrasound (4D) - <strong class="text-doctor">₱3,000</strong></li>
                            <li>Consultation - <strong class="text-doctor">₱1,000</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Department 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4">
                        <div class="step-icon mb-3">
                            <i class="bi bi-droplet-fill fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Dermatology</h5>
                        <p class="text-muted mb-3">
                            Advanced treatment for skin, hair, and nail conditions with modern techniques.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>Acne Treatment - <strong class="text-doctor">₱800-₱2,000</strong></li>
                            <li>Skin Biopsy - <strong class="text-doctor">₱3,500</strong></li>
                            <li>Laser Treatment - <strong class="text-doctor">₱5,000+</strong></li>
                            <li>Consultation - <strong class="text-doctor">₱1,000</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Department 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4">
                        <div class="step-icon mb-3">
                            <i class="bi bi-brain fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Neurology</h5>
                        <p class="text-muted mb-3">
                            Expert care for brain, spinal cord, and nervous system disorders.
                        </p>
                        <ul class="text-muted small mb-0">
                            <li>EEG Test - <strong class="text-doctor">₱2,500</strong></li>
                            <li>CT Scan (Brain) - <strong class="text-doctor">₱6,000</strong></li>
                            <li>MRI (Brain) - <strong class="text-doctor">₱12,000</strong></li>
                            <li>Consultation - <strong class="text-doctor">₱1,500</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Services -->
    <div class="container my-5">
        <h2 class="text-center fw-bold mb-5">Additional Services & Pricing</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3 text-doctor">
                            <i class="bi bi-file-earmark-medical"></i> Diagnostic Services
                        </h5>
                        <ul class="text-muted small mb-0">
                            <li>Complete Blood Count (CBC) - <strong class="text-doctor">₱300</strong></li>
                            <li>Urinalysis - <strong class="text-doctor">₱150</strong></li>
                            <li>X-Ray (per view) - <strong class="text-doctor">₱400</strong></li>
                            <li>Ultrasound (Basic) - <strong class="text-doctor">₱1,200</strong></li>
                            <li>CT Scan - <strong class="text-doctor">₱5,000-₱8,000</strong></li>
                            <li>MRI - <strong class="text-doctor">₱10,000-₱15,000</strong></li>
                            <li>ECG/EKG - <strong class="text-doctor">₱500</strong></li>
                            <li>Blood Chemistry Panel - <strong class="text-doctor">₱1,200</strong></li>
                            <li>Lipid Profile - <strong class="text-doctor">₱800</strong></li>
                            <li>Thyroid Function Test - <strong class="text-doctor">₱1,500</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3 text-doctor">
                            <i class="bi bi-hospital"></i> Emergency & In-Patient Care
                        </h5>
                        <ul class="text-muted small mb-0">
                            <li>Emergency Room Consultation - <strong class="text-doctor">₱2,000</strong></li>
                            <li>Ward Room (per day) - <strong class="text-doctor">₱2,500</strong></li>
                            <li>Semi-Private Room (per day) - <strong class="text-doctor">₱3,500</strong></li>
                            <li>Private Room (per day) - <strong class="text-doctor">₱5,000</strong></li>
                            <li>ICU (per day) - <strong class="text-doctor">₱8,000</strong></li>
                            <li>Minor Surgery - <strong class="text-doctor">₱15,000+</strong></li>
                            <li>Major Surgery - <strong class="text-doctor">₱50,000+</strong></li>
                            <li>Ambulance Service - <strong class="text-doctor">₱3,000</strong></li>
                            <li>IV Therapy - <strong class="text-doctor">₱500-₱2,000</strong></li>
                            <li>Nebulization - <strong class="text-doctor">₱300</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Health Packages -->
    <div class="container my-5">
        <h2 class="text-center fw-bold mb-5">Health Package Deals</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4 text-center">
                        <div class="step-icon mb-3">
                            <i class="bi bi-clipboard2-pulse fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Basic Health Package</h5>
                        <h3 class="text-doctor fw-bold mb-3">₱2,500</h3>
                        <ul class="text-muted small text-start">
                            <li>Physical Examination</li>
                            <li>Complete Blood Count</li>
                            <li>Urinalysis</li>
                            <li>Chest X-Ray</li>
                            <li>ECG</li>
                            <li>Blood Sugar</li>
                        </ul>
                        <button class="btn btn-doctor w-100 mt-3" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-doctor h-100 border-2" style="border: 2px solid #2f9e8f;">
                    <div class="card-body p-4 text-center">
                        <span class="badge bg-doctor mb-2">Most Popular</span>
                        <div class="step-icon mb-3">
                            <i class="bi bi-heart-pulse fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Executive Health Package</h5>
                        <h3 class="text-doctor fw-bold mb-3">₱5,500</h3>
                        <ul class="text-muted small text-start">
                            <li>All Basic Package Items</li>
                            <li>Lipid Profile</li>
                            <li>Liver Function Test</li>
                            <li>Kidney Function Test</li>
                            <li>Thyroid Function Test</li>
                            <li>Abdominal Ultrasound</li>
                            <li>Stress ECG</li>
                        </ul>
                        <button class="btn btn-doctor w-100 mt-3" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                            Book Now
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-doctor h-100">
                    <div class="card-body p-4 text-center">
                        <div class="step-icon mb-3">
                            <i class="bi bi-shield-check fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Premium Health Package</h5>
                        <h3 class="text-doctor fw-bold mb-3">₱12,000</h3>
                        <ul class="text-muted small text-start">
                            <li>All Executive Package Items</li>
                            <li>Echocardiography</li>
                            <li>Whole Abdomen CT Scan</li>
                            <li>Tumor Markers</li>
                            <li>Bone Density Scan</li>
                            <li>Eye Examination</li>
                            <li>Dental Check-up</li>
                        </ul>
                        <button class="btn btn-doctor w-100 mt-3" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                            Book Now
                        </button>
                    </div>
                </div>
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

                <div class="modal-body p-4">

                    <!-- Alert Messages -->
                    <div id="alertMessage" class="alert alert-dismissible fade" role="alert" style="display: none;">
                        <span id="alertText"></span>
                        <button type="button" class="btn-close" onclick="hideAlert()"></button>
                    </div>

                    <!-- LOGIN FORM -->
                    <div id="loginFormContainer">
                        <form id="loginForm">

                            <!-- Google Sign-In Button -->
                            <div class="d-grid mb-3">
                                <button type="button" class="btn btn-outline-secondary btn-google"
                                    id="googleSignInBtnLogin">
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
                                <span
                                    class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                    OR
                                </span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <div class="position-relative">
                                    <i class="bi bi-person form-icon"></i>
                                    <input type="text" name="username" id="loginUsername"
                                        class="form-control form-input" placeholder="Enter your username" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <div class="position-relative">
                                    <i class="bi bi-lock form-icon"></i>
                                    <input type="password" id="passwordFieldLogin" name="password"
                                        class="form-control form-input" placeholder="Enter your password" required>
                                    <i class="bi bi-eye eye-icon" id="togglePasswordLogin" style="cursor: pointer;"></i>
                                </div>
                            </div>

                            <div class="mb-4">
                                <a href="frontend/forgot_password.php" class="forgot-link">
                                    <i class="bi bi-question-circle"></i> Forgot Password?
                                </a>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-doctor btn-lg">
                                    <i class="bi bi-box-arrow-in-right"></i> Login
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-muted">Don't have an account?</span>
                                <a href="#" id="showRegister" class="text-doctor fw-semibold ms-1">Register here</a>
                            </div>

                        </form>
                    </div>

                    <!-- REGISTER FORM -->
                    <div id="registerFormContainer" style="display: none;">
                        <form id="registerForm">

                            <!-- Google Sign-In Button -->
                            <div class="d-grid mb-3">
                                <button type="button" class="btn btn-outline-secondary btn-google"
                                    id="googleSignInBtnRegister">
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
                                <span
                                    class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                    OR
                                </span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Username</label>
                                <input type="text" name="username" id="registerUsername" class="form-control form-input"
                                    placeholder="Choose a username" required minlength="3">
                                <small class="text-muted">
                                    <i class="bi bi-info-circle"></i> At least 3 characters
                                </small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <div class="position-relative">
                                    <input type="password" id="passwordFieldRegister" name="password"
                                        class="form-control form-input" placeholder="Create a password" required
                                        minlength="6">
                                    <i class="bi bi-eye eye-icon" id="togglePasswordRegister"
                                        style="cursor: pointer;"></i>
                                </div>
                                <small class="text-muted">
                                    <i class="bi bi-info-circle"></i> At least 6 characters
                                </small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Confirm Password</label>
                                <div class="position-relative">
                                    <input type="password" id="confirmPasswordField" name="confirm_password"
                                        class="form-control form-input" placeholder="Re-enter your password" required>
                                    <i class="bi bi-eye eye-icon" id="toggleConfirmPassword"
                                        style="cursor: pointer;"></i>
                                </div>
                                <div id="passwordMatchMessage" class="mt-1" style="display: none;">
                                    <small class="text-danger">
                                        <i class="bi bi-x-circle"></i> Passwords do not match
                                    </small>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-doctor btn-lg">
                                    <i class="bi bi-person-plus"></i> Register
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-muted">Already have an account?</span>
                                <a href="#" id="showLogin" class="text-doctor fw-semibold ms-1">Login here</a>
                            </div>

                        </form>
                    </div>

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
                        <li><a href="index.php">Home</a></li>
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
    <script src="https://accounts.google.com/gsi/client" async defer></script>

    <script>
    // ===== UTILITY FUNCTIONS =====

    function showAlert(message, type = 'danger') {
        const alertBox = document.getElementById('alertMessage');
        const alertText = document.getElementById('alertText');

        alertBox.className = `alert alert-${type} alert-dismissible fade show`;
        alertText.innerHTML =
            `<i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i> ${message}`;
        alertBox.style.display = 'block';

        // Auto hide after 5 seconds
        setTimeout(() => {
            hideAlert();
        }, 5000);
    }

    function hideAlert() {
        const alertBox = document.getElementById('alertMessage');
        alertBox.style.display = 'none';
        alertBox.className = 'alert alert-dismissible fade';
    }

    function showTrackAlert(message, type = 'danger') {
        const alertBox = document.getElementById('trackAlertMessage');
        const alertText = document.getElementById('trackAlertText');

        alertBox.className = `alert alert-${type} alert-dismissible fade show`;
        alertText.innerHTML =
            `<i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i> ${message}`;
        alertBox.style.display = 'block';

        setTimeout(() => {
            hideTrackAlert();
        }, 5000);
    }

    function hideTrackAlert() {
        const alertBox = document.getElementById('trackAlertMessage');
        alertBox.style.display = 'none';
        alertBox.className = 'alert alert-dismissible fade';
    }

    function setButtonLoading(button, isLoading, loadingText = 'Processing...') {
        if (isLoading) {
            button.dataset.originalText = button.innerHTML;
            button.disabled = true;
            button.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span>${loadingText}`;
        } else {
            button.disabled = false;
            button.innerHTML = button.dataset.originalText || button.innerHTML;
        }
    }

    // ===== PASSWORD TOGGLE FUNCTIONALITY =====

    function setupPasswordToggle(toggleId, fieldId) {
        const toggle = document.getElementById(toggleId);
        const field = document.getElementById(fieldId);

        if (toggle && field) {
            toggle.addEventListener('click', () => {
                const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
                field.setAttribute('type', type);
                toggle.classList.toggle('bi-eye');
                toggle.classList.toggle('bi-eye-slash');
            });
        }
    }

    setupPasswordToggle('togglePasswordLogin', 'passwordFieldLogin');
    setupPasswordToggle('togglePasswordRegister', 'passwordFieldRegister');
    setupPasswordToggle('toggleConfirmPassword', 'confirmPasswordField');

    // ===== PASSWORD MATCH VALIDATION =====

    const passwordFieldRegister = document.getElementById('passwordFieldRegister');
    const confirmPasswordField = document.getElementById('confirmPasswordField');
    const passwordMatchMessage = document.getElementById('passwordMatchMessage');

    function checkPasswordMatch() {
        if (confirmPasswordField.value.length > 0) {
            if (passwordFieldRegister.value !== confirmPasswordField.value) {
                passwordMatchMessage.style.display = 'block';
                confirmPasswordField.classList.add('is-invalid');
                return false;
            } else {
                passwordMatchMessage.style.display = 'none';
                confirmPasswordField.classList.remove('is-invalid');
                confirmPasswordField.classList.add('is-valid');
                return true;
            }
        }
        return true;
    }

    confirmPasswordField?.addEventListener('input', checkPasswordMatch);
    passwordFieldRegister?.addEventListener('input', checkPasswordMatch);

    // ===== FORM SWITCHING =====

    document.getElementById('showRegister')?.addEventListener('click', function(e) {
        e.preventDefault();
        hideAlert();
        document.getElementById('loginFormContainer').style.display = 'none';
        document.getElementById('registerFormContainer').style.display = 'block';
        document.getElementById('modalTitle').innerHTML = '<i class="bi bi-person-plus"></i> Register';

        // Reset forms
        document.getElementById('loginForm').reset();
    });

    document.getElementById('showLogin')?.addEventListener('click', function(e) {
        e.preventDefault();
        hideAlert();
        document.getElementById('registerFormContainer').style.display = 'none';
        document.getElementById('loginFormContainer').style.display = 'block';
        document.getElementById('modalTitle').innerHTML = '<i class="bi bi-box-arrow-in-right"></i> Login';

        // Reset forms
        document.getElementById('registerForm').reset();
        passwordMatchMessage.style.display = 'none';
        confirmPasswordField.classList.remove('is-invalid', 'is-valid');
    });

    // ===== LOGIN FORM SUBMISSION =====

    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const username = loginForm.username.value;
        const password = loginForm.password.value;

        // fetch('http://appointment-system.test/backend/login.php', {
        fetch('backend/login.php', {
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


    // ===== REGISTER FORM SUBMISSION =====

    const registerForm = document.getElementById('registerForm');
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const username = registerForm.username.value.trim();
        const password = registerForm.password.value;
        const confirm_password = registerForm.confirm_password.value;

        // fetch('http://appointment-system.test/backend/register.php', {
        fetch('backend/register.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ username, password, confirm_password })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message); // optional, can remove if you want silent redirect
            if (data.success && data.redirect) {
                window.location.href = data.redirect;
            }
        })
        .catch(err => {
            console.error(err);
            alert("An error occurred during registration");
        });
    });



    // ===== TRACK APPOINTMENT FORM =====

    const trackForm = document.getElementById('trackForm');
    trackForm?.addEventListener('submit', function(e) {
        e.preventDefault();
        hideTrackAlert();

        const submitBtn = trackForm.querySelector('button[type="submit"]');
        const reference = trackForm.reference.value.trim();
        const email = trackForm.email.value.trim();

        if (!reference || !email) {
            showTrackAlert('Please fill in all fields', 'warning');
            return;
        }

        setButtonLoading(submitBtn, true, 'Tracking...');

        fetch('backend/track_appointment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    reference: reference,
                    email: email
                })
            })
            .then(res => res.json())
            .then(data => {
                setButtonLoading(submitBtn, false);

                if (data.success) {
                    showTrackAlert('Appointment found! Redirecting...', 'success');
                    setTimeout(() => {
                        window.location.href = data.redirect || `track_result.php?ref=${reference}`;
                    }, 1500);
                } else {
                    showTrackAlert(data.message || 'Appointment not found. Please check your details.',
                        'danger');
                }
            })
            .catch(err => {
                console.error('Track error:', err);
                setButtonLoading(submitBtn, false);
                showTrackAlert('An error occurred. Please try again.', 'danger');
            });
    });

    // ===== GOOGLE SIGN-IN =====

    function initializeGoogleSignIn() {
        if (typeof google !== 'undefined' && google.accounts) {
            google.accounts.id.initialize({
                client_id: 'YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com',
                callback: handleGoogleSignIn
            });
        }
    }

    function handleGoogleSignIn(response) {
        hideAlert();

        fetch('frontend/google_login_process.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    credential: response.credential
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showAlert('Login successful! Redirecting...', 'success');
                    setTimeout(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                        if (modal) modal.hide();
                        window.location.href = data.redirect || 'dashboard.php';
                    }, 1000);
                } else {
                    showAlert(data.message || 'Google login failed. Please try again.', 'danger');
                }
            })
            .catch(error => {
                console.error('Google Sign-In error:', error);
                showAlert('An error occurred during Google login.', 'danger');
            });
    }

    document.getElementById('googleSignInBtnLogin')?.addEventListener('click', function() {
        if (typeof google !== 'undefined' && google.accounts) {
            google.accounts.id.prompt();
        } else {
            showAlert('Google Sign-In is not available. Please use regular login.', 'warning');
        }
    });

    document.getElementById('googleSignInBtnRegister')?.addEventListener('click', function() {
        if (typeof google !== 'undefined' && google.accounts) {
            google.accounts.id.prompt();
        } else {
            showAlert('Google Sign-In is not available. Please use regular registration.', 'warning');
        }
    });

    window.addEventListener('load', initializeGoogleSignIn);

    // ===== MODAL RESET ON CLOSE =====

    document.getElementById('loginModal')?.addEventListener('hidden.bs.modal', function() {
        hideAlert();
        document.getElementById('loginForm').reset();
        document.getElementById('registerForm').reset();

        // Reset to login form
        document.getElementById('loginFormContainer').style.display = 'block';
        document.getElementById('registerFormContainer').style.display = 'none';
        document.getElementById('modalTitle').innerHTML = '<i class="bi bi-box-arrow-in-right"></i> Login';

        // Clear validation states
        passwordMatchMessage.style.display = 'none';
        confirmPasswordField.classList.remove('is-invalid', 'is-valid');
    });

    document.getElementById('trackModal')?.addEventListener('hidden.bs.modal', function() {
        hideTrackAlert();
        document.getElementById('trackForm')?.reset();
    });
    </script>

</body>

</html>
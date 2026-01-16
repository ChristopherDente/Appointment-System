<?php 
    session_start();
    include 'backend/config/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="frontend/assets/styles/style.css">
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
                                data-bs-target="#loginModal">
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
                <img src="frontend/assets/images/calendar.jpg" alt="Calendar" class="hero-img">
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
                <div class="modal-body p-4">

                    <!-- Alert for Track Modal -->
                    <div id="trackAlertMessage" class="alert alert-dismissible fade" role="alert"
                        style="display: none;">
                        <span id="trackAlertText"></span>
                        <button type="button" class="btn-close" onclick="hideTrackAlert()"></button>
                    </div>

                    <form id="trackForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Appointment Reference Number</label>
                            <input type="text" name="reference" class="form-control form-input"
                                placeholder="e.g., APT-2024-001234" required>
                            <small class="text-muted">
                                <i class="bi bi-info-circle"></i> Enter the reference number from your appointment
                                confirmation
                            </small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control form-input"
                                placeholder="your@email.com" required>
                            <small class="text-muted">
                                <i class="bi bi-info-circle"></i> The email used when booking the appointment
                            </small>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-doctor btn-lg">
                                <i class="bi bi-search"></i> Track Appointment
                            </button>
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'frontend/context/footer.php'; ?>

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
        hideAlert();

        const submitBtn = loginForm.querySelector('button[type="submit"]');
        const username = document.getElementById('loginUsername').value.trim();
        const password = document.getElementById('passwordFieldLogin').value;

        // Validation
        if (!username || !password) {
            showAlert('Please fill in all fields', 'warning');
            return;
        }

        setButtonLoading(submitBtn, true, 'Logging in...');

        fetch('backend/login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'login',
                    username: username,
                    password: password
                })
            })
            .then(res => res.json())
            .then(data => {
                setButtonLoading(submitBtn, false);

                if (data.success) {
                    showAlert(data.message || 'Login successful! Redirecting...', 'success');

                    setTimeout(() => {
                        const modal = bootstrap.Modal.getInstance(document.getElementById(
                            'loginModal'));
                        if (modal) modal.hide();
                        window.location.href = data.redirect || 'dashboard.php';
                    }, 1000);
                } else {
                    showAlert(data.message || 'Invalid username or password', 'danger');
                }
            })
            .catch(err => {
                console.error('Login error:', err);
                setButtonLoading(submitBtn, false);
                showAlert('An error occurred. Please try again.', 'danger');
            });
    });

    // ===== REGISTER FORM SUBMISSION =====

    const registerForm = document.getElementById('registerForm');
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        hideAlert();

        const submitBtn = registerForm.querySelector('button[type="submit"]');
        const username = document.getElementById('registerUsername').value.trim();
        const password = document.getElementById('passwordFieldRegister').value;
        const confirmPassword = document.getElementById('confirmPasswordField').value;

        // Validation
        if (!username || !password || !confirmPassword) {
            showAlert('Please fill in all fields', 'warning');
            return;
        }

        if (username.length < 3) {
            showAlert('Username must be at least 3 characters long', 'warning');
            return;
        }

        if (password.length < 6) {
            showAlert('Password must be at least 6 characters long', 'warning');
            return;
        }

        if (password !== confirmPassword) {
            showAlert('Passwords do not match', 'warning');
            return;
        }

        setButtonLoading(submitBtn, true, 'Registering...');

        fetch('backend/login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'register',
                    username: username,
                    password: password,
                    confirm_password: confirmPassword
                })
            })
            .then(res => res.json())
            .then(data => {
                setButtonLoading(submitBtn, false);

                if (data.success) {
                    showAlert(data.message || 'Registration successful! Please login.', 'success');

                    setTimeout(() => {
                        // Switch to login form
                        document.getElementById('registerFormContainer').style.display = 'none';
                        document.getElementById('loginFormContainer').style.display = 'block';
                        document.getElementById('modalTitle').innerHTML =
                            '<i class="bi bi-box-arrow-in-right"></i> Login';

                        // Clear register form
                        registerForm.reset();
                        passwordMatchMessage.style.display = 'none';
                        confirmPasswordField.classList.remove('is-invalid', 'is-valid');

                        // Pre-fill username in login form
                        document.getElementById('loginUsername').value = username;
                    }, 1500);
                } else {
                    showAlert(data.message || 'Registration failed. Please try again.', 'danger');
                }
            })
            .catch(err => {
                console.error('Registration error:', err);
                setButtonLoading(submitBtn, false);
                showAlert('An error occurred. Please try again.', 'danger');
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
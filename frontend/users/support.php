<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Support - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

    <style>
    .faq-card {
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        margin-bottom: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .faq-question {
        padding: 20px;
        cursor: pointer;
        background-color: white;
        transition: background-color 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-question:hover {
        background-color: #f8f9fa;
    }

    .faq-question.active {
        background-color: #e6f4f1;
        color: #2f9e8f;
    }

    .faq-answer {
        padding: 0 20px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease, padding 0.3s ease;
        background-color: #f8f9fa;
    }

    .faq-answer.active {
        max-height: 500px;
        padding: 20px;
    }

    .faq-icon {
        transition: transform 0.3s ease;
    }

    .faq-question.active .faq-icon {
        transform: rotate(180deg);
    }

    .category-tabs {
        border-bottom: 2px solid #e0e0e0;
        margin-bottom: 30px;
    }

    .category-tab {
        display: inline-block;
        padding: 12px 24px;
        margin-right: 10px;
        cursor: pointer;
        border-bottom: 3px solid transparent;
        color: #6c757d;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .category-tab:hover {
        color: #2f9e8f;
    }

    .category-tab.active {
        color: #2f9e8f;
        border-bottom-color: #2f9e8f;
    }

    .contact-card {
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
    }

    .contact-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .contact-card i {
        font-size: 3rem;
        color: #2f9e8f;
        margin-bottom: 15px;
    }

    .contact-form {
        background-color: #f8f9fa;
        border-radius: 12px;
        padding: 30px;
    }

    .quick-link-card {
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 15px;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
    }

    .quick-link-card:hover {
        background-color: #e6f4f1;
        border-color: #2f9e8f;
        transform: translateX(5px);
    }

    .quick-link-icon {
        width: 50px;
        height: 50px;
        background-color: #e6f4f1;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #2f9e8f;
    }

    .search-box {
        position: relative;
        margin-bottom: 30px;
    }

    .search-box i {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 1.2rem;
    }

    .search-box input {
        padding-left: 55px;
        height: 60px;
        border-radius: 30px;
        border: 2px solid #e0e0e0;
        font-size: 1.1rem;
    }

    .search-box input:focus {
        border-color: #2f9e8f;
        box-shadow: 0 0 0 0.2rem rgba(47, 158, 143, 0.25);
    }
    </style>

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
                            data-bs-toggle="dropdown" aria-expanded="false">Appointments</a>
                        <ul class="dropdown-menu" aria-labelledby="appointmentDropdown">
                            <li><a class="dropdown-item" href="book.php">Book Appointment</a></li>
                            <li><a class="dropdown-item" href="upcoming.php">Upcoming Appointments</a></li>
                            <li><a class="dropdown-item" href="past.php">Past Appointments</a></li>
                            <li><a class="dropdown-item" href="history.php">Appointment History</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payments.php">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="support.php">Support</a>
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="dashboard.php" class="text-white text-decoration-none me-3">
                    <i class="bi bi-arrow-left fs-4"></i>
                </a>
                <div>
                    <h2 class="fw-bold mb-1">Help & Support</h2>
                    <p class="mb-0 opacity-90">Find answers and get assistance</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Search Box -->
        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text" class="form-control" placeholder="Search for help..." id="faqSearch"
                onkeyup="searchFAQs()">
        </div>

        <!-- Quick Links -->
        <div class="row mb-5">
            <div class="col-12">
                <h5 class="fw-semibold mb-3">Quick Links</h5>
            </div>
            <div class="col-md-6">
                <a href="#faq-section" class="quick-link-card">
                    <div class="quick-link-icon">
                        <i class="bi bi-question-circle"></i>
                    </div>
                    <div>
                        <h6 class="fw-semibold mb-1">Frequently Asked Questions</h6>
                        <p class="text-muted small mb-0">Browse common questions and answers</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="#contact-section" class="quick-link-card">
                    <div class="quick-link-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div>
                        <h6 class="fw-semibold mb-1">Contact Clinic</h6>
                        <p class="text-muted small mb-0">Get in touch with our support team</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- FAQs Section -->
        <div id="faq-section" class="mb-5">
            <div class="card-doctor p-4">
                <h4 class="fw-semibold mb-4">
                    <i class="bi bi-question-circle text-doctor"></i> Frequently Asked Questions
                </h4>

                <!-- Category Tabs -->
                <div class="category-tabs">
                    <span class="category-tab active" onclick="filterCategory('all')">All</span>
                    <span class="category-tab" onclick="filterCategory('appointments')">Appointments</span>
                    <span class="category-tab" onclick="filterCategory('payments')">Payments</span>
                    <span class="category-tab" onclick="filterCategory('account')">Account</span>
                    <span class="category-tab" onclick="filterCategory('technical')">Technical</span>
                </div>

                <!-- FAQ Items -->
                <div id="faqList">
                    <!-- Appointments -->
                    <div class="faq-card" data-category="appointments">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h6 class="mb-0 fw-semibold">How do I book an appointment?</h6>
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>To book an appointment, follow these steps:</p>
                            <ol>
                                <li>Click on "Book Appointment" from the dashboard</li>
                                <li>Select your preferred department</li>
                                <li>Choose a doctor</li>
                                <li>Pick a date and time slot</li>
                                <li>Fill in your details and reason for visit</li>
                                <li>Complete the payment process</li>
                            </ol>
                            <p class="mb-0">You will receive a confirmation email once your appointment is booked.</p>
                        </div>
                    </div>

                    <div class="faq-card" data-category="appointments">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h6 class="mb-0 fw-semibold">Can I cancel or reschedule my appointment?</h6>
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, you can cancel or reschedule your appointment up to 24 hours before the scheduled
                                time.</p>
                            <p>To cancel or reschedule:</p>
                            <ul>
                                <li>Go to "Upcoming Appointments"</li>
                                <li>Click on the appointment you want to modify</li>
                                <li>Select "Reschedule" or "Cancel"</li>
                            </ul>
                            <p class="mb-0"><strong>Note:</strong> Cancellations made less than 24 hours before the
                                appointment may incur a cancellation fee.</p>
                        </div>
                    </div>

                    <div class="faq-card" data-category="appointments">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h6 class="mb-0 fw-semibold">What should I bring to my appointment?</h6>
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Please bring the following to your appointment:</p>
                            <ul>
                                <li>Valid government-issued ID</li>
                                <li>Appointment confirmation (email or screenshot)</li>
                                <li>Previous medical records (if applicable)</li>
                                <li>Current medications list</li>
                                <li>Insurance card (if using insurance)</li>
                            </ul>
                            <p class="mb-0">Please arrive 15 minutes before your scheduled appointment time.</p>
                        </div>
                    </div>

                    <!-- Payments -->
                    <div class="faq-card" data-category="payments">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h6 class="mb-0 fw-semibold">What payment methods are accepted?</h6>
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>We accept the following payment methods:</p>
                            <ul>
                                <li><strong>Credit/Debit Cards:</strong> Visa, Mastercard, American Express</li>
                                <li><strong>Digital Wallets:</strong> GCash, PayMaya</li>
                                <li><strong>Cash on Arrival:</strong> Pay at the clinic reception</li>
                            </ul>
                            <p class="mb-0">All online payments are processed securely through encrypted payment
                                gateways.</p>
                        </div>
                    </div>

                    <div class="faq-card" data-category="payments">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h6 class="mb-0 fw-semibold">Can I get a refund if I cancel my appointment?</h6>
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Refund policies depend on when you cancel:</p>
                            <ul>
                                <li><strong>More than 48 hours before:</strong> Full refund</li>
                                <li><strong>24-48 hours before:</strong> 50% refund</li>
                                <li><strong>Less than 24 hours:</strong> No refund</li>
                            </ul>
                            <p class="mb-0">Refunds are processed within 5-7 business days to your original payment
                                method.</p>
                        </div>
                    </div>

                    <!-- Account -->
                    <div class="faq-card" data-category="account">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h6 class="mb-0 fw-semibold">How do I reset my password?</h6>
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>To reset your password:</p>
                            <ol>
                                <li>Click on "Profile" in the navigation menu</li>
                                <li>Select "Change Password"</li>
                                <li>Enter your current password</li>
                                <li>Enter your new password (must be at least 8 characters)</li>
                                <li>Confirm your new password</li>
                                <li>Click "Update Password"</li>
                            </ol>
                            <p class="mb-0">If you've forgotten your password, use the "Forgot Password" link on the
                                login page.</p>
                        </div>
                    </div>

                    <div class="faq-card" data-category="account">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h6 class="mb-0 fw-semibold">How do I update my medical information?</h6>
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>To update your medical information:</p>
                            <ol>
                                <li>Go to Profile → Medical Information</li>
                                <li>Update relevant fields (allergies, medications, conditions, etc.)</li>
                                <li>Click "Save Changes"</li>
                            </ol>
                            <p class="mb-0">Keeping your medical information up-to-date helps our doctors provide better
                                care.</p>
                        </div>
                    </div>

                    <!-- Technical -->
                    <div class="faq-card" data-category="technical">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h6 class="mb-0 fw-semibold">The website is not loading properly. What should I do?</h6>
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Try these troubleshooting steps:</p>
                            <ul>
                                <li>Clear your browser cache and cookies</li>
                                <li>Try a different web browser (Chrome, Firefox, Safari)</li>
                                <li>Check your internet connection</li>
                                <li>Disable browser extensions temporarily</li>
                                <li>Update your browser to the latest version</li>
                            </ul>
                            <p class="mb-0">If the issue persists, contact our support team for assistance.</p>
                        </div>
                    </div>

                    <div class="faq-card" data-category="technical">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h6 class="mb-0 fw-semibold">I'm not receiving email notifications. What can I do?</h6>
                            <i class="bi bi-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>If you're not receiving emails:</p>
                            <ul>
                                <li>Check your spam/junk folder</li>
                                <li>Add onlineappointmentsystem00@gmail.com to your contacts</li>
                                <li>Verify your email address in your profile settings</li>
                                <li>Check if your inbox is full</li>
                                <li>Contact your email provider about filtering</li>
                            </ul>
                            <p class="mb-0">If none of these work, contact our support team.</p>
                        </div>
                    </div>
                </div>

                <!-- No Results Message -->
                <div id="noResults" style="display: none;" class="text-center py-5">
                    <i class="bi bi-search text-muted" style="font-size: 3rem;"></i>
                    <p class="text-muted mt-3">No FAQs found matching your search.</p>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div id="contact-section">
            <div class="card-doctor p-4 mb-4">
                <h4 class="fw-semibold mb-4">
                    <i class="bi bi-headset text-doctor"></i> Contact Clinic
                </h4>

                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="contact-card">
                            <i class="bi bi-telephone"></i>
                            <h6 class="fw-semibold">Phone</h6>
                            <p class="text-muted mb-2">Call us for immediate assistance</p>
                            <a href="tel:+639127339200" class="text-doctor fw-semibold">+63 9127339200</a>
                            <p class="small text-muted mt-2 mb-0">Mon-Fri: 8AM-6PM<br>Sat: 9AM-3PM</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-card">
                            <i class="bi bi-envelope"></i>
                            <h6 class="fw-semibold">Email</h6>
                            <p class="text-muted mb-2">Send us a message</p>
                            <a href="mailto:onlineappointmentsystem00@gmail.com"
                                class="text-doctor fw-semibold">onlineappointmentsystem00@gmail.com</a>
                            <p class="small text-muted mt-2 mb-0">Response within 24 hours</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-card">
                            <i class="bi bi-geo-alt"></i>
                            <h6 class="fw-semibold">Visit Us</h6>
                            <p class="text-muted mb-2">Our clinic location</p>
                            <p class="fw-semibold mb-0">123 Medical Center Drive<br>Samal, Central Luzon</p>
                            <p class="small text-muted mt-2 mb-0">Open daily: 8AM-8PM</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form">
                    <h5 class="fw-semibold mb-4">Send us a message</h5>
                    <form id="contactForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subject</label>
                                <select class="form-control" required>
                                    <option value="">Select a subject</option>
                                    <option>Appointment Inquiry</option>
                                    <option>Payment Issue</option>
                                    <option>Technical Support</option>
                                    <option>Feedback</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="5" placeholder="How can we help you?"
                                    required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-doctor">
                                    <i class="bi bi-send"></i> Send Message
                                </button>
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
    // Toggle FAQ
    function toggleFAQ(element) {
        const answer = element.nextElementSibling;
        const allQuestions = document.querySelectorAll('.faq-question');
        const allAnswers = document.querySelectorAll('.faq-answer');

        allQuestions.forEach(q => {
            if (q !== element) {
                q.classList.remove('active');
            }
        });

        allAnswers.forEach(a => {
            if (a !== answer) {
                a.classList.remove('active');
            }
        });

        element.classList.toggle('active');
        answer.classList.toggle('active');
    }

    // Filter by category
    function filterCategory(category) {
        const tabs = document.querySelectorAll('.category-tab');
        tabs.forEach(tab => tab.classList.remove('active'));
        event.target.classList.add('active');

        const faqs = document.querySelectorAll('.faq-card');
        let visibleCount = 0;

        faqs.forEach(faq => {
            if (category === 'all' || faq.dataset.category === category) {
                faq.style.display = 'block';
                visibleCount++;
            } else {
                faq.style.display = 'none';
            }
        });

        document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    // Search FAQs
    function searchFAQs() {
        const searchTerm = document.getElementById('faqSearch').value.toLowerCase();
        const faqs = document.querySelectorAll('.faq-card');
        let visibleCount = 0;

        faqs.forEach(faq => {
            const text = faq.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                faq.style.display = 'block';
                visibleCount++;
            } else {
                faq.style.display = 'none';
            }
        });

        document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    // Contact form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Thank you for contacting us! We will respond to your message within 24 hours.');
        this.reset();
    });
    </script>
</body>

</html>
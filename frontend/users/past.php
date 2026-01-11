<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Past Appointments - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

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
                        <a class="nav-link dropdown-toggle active" href="#" id="appointmentDropdown" role="button"
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
                        <a class="nav-link" href="support.php">Support</a>
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
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <h2 class="fw-bold mb-1">Past Appointments</h2>
                    <p class="mb-0 opacity-90">Review your completed medical visits</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-light" onclick="downloadRecords()">
                        <i class="bi bi-download"></i> <span class="d-none d-sm-inline">Download Records</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container pb-5">
        <!-- Search and Filter -->
        <div class="search-filter-bar">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" class="form-control" id="searchInput"
                            placeholder="Search by doctor, specialty, or reason..." onkeyup="searchAppointments()">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" style="border-radius: 12px; border: 2px solid #e5e7eb;"
                        onchange="filterByMonth(this.value)">
                        <option value="all">All Months</option>
                        <option value="2026-01">January 2026</option>
                        <option value="2025-12">December 2025</option>
                        <option value="2025-11">November 2025</option>
                        <option value="2025-10">October 2025</option>
                        <option value="2025-09">September 2025</option>
                        <option value="2025-08">August 2025</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" style="border-radius: 12px; border: 2px solid #e5e7eb;"
                        onchange="filterByRating(this.value)">
                        <option value="all">All Ratings</option>
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars & Up</option>
                        <option value="3">3 Stars & Up</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Appointments List -->
        <div id="appointmentsList">
            <!-- Appointment 1 -->
            <div class="appointment-card" data-month="2026-01" data-rating="5">
                <div class="appointment-header">
                    <div class="doctor-info">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">Dr. Juan Cruz</h5>
                            <p class="text-muted mb-0 small">Family Medicine</p>
                        </div>
                    </div>
                    <span class="status-badge status-completed">
                        <i class="bi bi-check-circle"></i> Completed
                    </span>
                </div>

                <div class="appointment-details">
                    <div class="detail-item">
                        <i class="bi bi-calendar3"></i>
                        <span>January 8, 2026</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-clock"></i>
                        <span>10:00 AM</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>Room 201, Building A</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-hourglass"></i>
                        <span>30 minutes</span>
                    </div>
                </div>

                <div class="mb-2">
                    <strong class="small text-muted">Reason for Visit:</strong>
                    <p class="mb-0">Annual physical examination and lab work review</p>
                </div>

                <div class="feedback-section">
                    <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                    <div class="rating-display">
                        <div class="star-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <span class="small text-muted">(5.0)</span>
                    </div>
                    <p class="mb-0 small mt-2 text-muted">"Excellent service! Dr. Cruz was very thorough and
                        professional."</p>
                </div>

                <div class="mt-3 d-flex gap-2 flex-wrap">
                    <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(1)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(1)">
                        <i class="bi bi-calendar-plus"></i> Book Follow-up
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(1)">
                        <i class="bi bi-file-earmark-pdf"></i> Download Report
                    </button>
                </div>
            </div>

            <!-- Appointment 2 -->
            <div class="appointment-card" data-month="2026-01" data-rating="5">
                <div class="appointment-header">
                    <div class="doctor-info">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">Dr. Emily Rodriguez</h5>
                            <p class="text-muted mb-0 small">Dermatology</p>
                        </div>
                    </div>
                    <span class="status-badge status-completed">
                        <i class="bi bi-check-circle"></i> Completed
                    </span>
                </div>

                <div class="appointment-details">
                    <div class="detail-item">
                        <i class="bi bi-calendar3"></i>
                        <span>January 5, 2026</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-clock"></i>
                        <span>2:30 PM</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>Room 315, Building B</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-hourglass"></i>
                        <span>25 minutes</span>
                    </div>
                </div>

                <div class="mb-2">
                    <strong class="small text-muted">Reason for Visit:</strong>
                    <p class="mb-0">Skin condition follow-up and treatment review</p>
                </div>

                <div class="feedback-section">
                    <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                    <div class="rating-display">
                        <div class="star-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <span class="small text-muted">(5.0)</span>
                    </div>
                    <p class="mb-0 small mt-2 text-muted">"Very knowledgeable and caring. My skin has improved
                        significantly!"</p>
                </div>

                <div class="mt-3 d-flex gap-2 flex-wrap">
                    <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(2)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(2)">
                        <i class="bi bi-calendar-plus"></i> Book Follow-up
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(2)">
                        <i class="bi bi-file-earmark-pdf"></i> Download Report
                    </button>
                </div>
            </div>

            <!-- Appointment 3 -->
            <div class="appointment-card" data-month="2025-12" data-rating="4">
                <div class="appointment-header">
                    <div class="doctor-info">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">Dr. Patricia Gomez</h5>
                            <p class="text-muted mb-0 small">General Dentist</p>
                        </div>
                    </div>
                    <span class="status-badge status-completed">
                        <i class="bi bi-check-circle"></i> Completed
                    </span>
                </div>

                <div class="appointment-details">
                    <div class="detail-item">
                        <i class="bi bi-calendar3"></i>
                        <span>December 20, 2025</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-clock"></i>
                        <span>11:00 AM</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>Room 401, Dental Wing</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-hourglass"></i>
                        <span>45 minutes</span>
                    </div>
                </div>

                <div class="mb-2">
                    <strong class="small text-muted">Reason for Visit:</strong>
                    <p class="mb-0">Routine dental cleaning and checkup</p>
                </div>

                <div class="feedback-section">
                    <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                    <div class="rating-display">
                        <div class="star-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <span class="small text-muted">(4.0)</span>
                    </div>
                    <p class="mb-0 small mt-2 text-muted">"Great cleaning! Wait time was a bit long though."</p>
                </div>

                <div class="mt-3 d-flex gap-2 flex-wrap">
                    <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(3)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(3)">
                        <i class="bi bi-calendar-plus"></i> Book Follow-up
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(3)">
                        <i class="bi bi-file-earmark-pdf"></i> Download Report
                    </button>
                </div>
            </div>

            <!-- Appointment 4 -->
            <div class="appointment-card" data-month="2025-11" data-rating="5">
                <div class="appointment-header">
                    <div class="doctor-info">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">Dr. Robert Chen</h5>
                            <p class="text-muted mb-0 small">Cardiologist</p>
                        </div>
                    </div>
                    <span class="status-badge status-completed">
                        <i class="bi bi-check-circle"></i> Completed
                    </span>
                </div>

                <div class="appointment-details">
                    <div class="detail-item">
                        <i class="bi bi-calendar3"></i>
                        <span>November 15, 2025</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-clock"></i>
                        <span>9:30 AM</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>Room 305, Building B</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-hourglass"></i>
                        <span>40 minutes</span>
                    </div>
                </div>

                <div class="mb-2">
                    <strong class="small text-muted">Reason for Visit:</strong>
                    <p class="mb-0">Heart health screening and blood pressure monitoring</p>
                </div>

                <div class="feedback-section">
                    <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                    <div class="rating-display">
                        <div class="star-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <span class="small text-muted">(5.0)</span>
                    </div>
                    <p class="mb-0 small mt-2 text-muted">"Dr. Chen is amazing! Very detailed explanation of my heart
                        health."</p>
                </div>

                <div class="mt-3 d-flex gap-2 flex-wrap">
                    <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(4)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(4)">
                        <i class="bi bi-calendar-plus"></i> Book Follow-up
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(4)">
                        <i class="bi bi-file-earmark-pdf"></i> Download Report
                    </button>
                </div>
            </div>

            <!-- Appointment 5 -->
            <div class="appointment-card" data-month="2025-09" data-rating="5">
                <div class="appointment-header">
                    <div class="doctor-info">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">Dr. Michael Torres</h5>
                            <p class="text-muted mb-0 small">Ophthalmology</p>
                        </div>
                    </div>
                    <span class="status-badge status-completed">
                        <i class="bi bi-check-circle"></i> Completed
                    </span>
                </div>

                <div class="appointment-details">
                    <div class="detail-item">
                        <i class="bi bi-calendar3"></i>
                        <span>September 12, 2025</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-clock"></i>
                        <span>3:15 PM</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>Room 102, Eye Center</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-hourglass"></i>
                        <span>35 minutes</span>
                    </div>
                </div>

                <div class="mb-2">
                    <strong class="small text-muted">Reason for Visit:</strong>
                    <p class="mb-0">Annual eye examination and vision test</p>
                </div>

                <div class="feedback-section">
                    <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                    <div class="rating-display">
                        <div class="star-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <span class="small text-muted">(5.0)</span>
                    </div>
                    <p class="mb-0 small mt-2 text-muted">"Perfect experience. New glasses prescription is spot on!"</p>
                </div>

                <div class="mt-3 d-flex gap-2 flex-wrap">
                    <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(5)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(5)">
                        <i class="bi bi-calendar-plus"></i> Book Follow-up
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(5)">
                        <i class="bi bi-file-earmark-pdf"></i> Download Report
                    </button>
                </div>
            </div>

            <!-- Appointment 6 -->
            <div class="appointment-card" data-month="2025-08" data-rating="4">
                <div class="appointment-header">
                    <div class="doctor-info">
                        <div class="doctor-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">Dr. Lisa Anderson</h5>
                            <p class="text-muted mb-0 small">Endocrinology</p>
                        </div>
                    </div>
                    <span class="status-badge status-completed">
                        <i class="bi bi-check-circle"></i> Completed
                    </span>
                </div>

                <div class="appointment-details">
                    <div class="detail-item">
                        <i class="bi bi-calendar3"></i>
                        <span>August 5, 2025</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-clock"></i>
                        <span>10:45 AM</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-geo-alt"></i>
                        <span>Room 204, Building C</span>
                    </div>
                    <div class="detail-item">
                        <i class="bi bi-hourglass"></i>
                        <span>40 minutes</span>
                    </div>
                </div>

                <div class="mb-2">
                    <strong class="small text-muted">Reason for Visit:</strong>
                    <p class="mb-0">Diabetes management and medication review</p>
                </div>

                <div class="feedback-section">
                    <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                    <div class="rating-display">
                        <div class="star-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <span class="small text-muted">(4.0)</span>
                    </div>
                    <p class="mb-0 small mt-2 text-muted">"Good consultation. Helped me adjust my medication schedule."
                    </p>
                </div>

                <div class="mt-3 d-flex gap-2 flex-wrap">
                    <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(6)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(6)">
                        <i class="bi bi-calendar-plus"></i> Book Follow-up
                    </button>
                    <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(6)">
                        <i class="bi bi-file-earmark-pdf"></i> Download Report
                    </button>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="empty-state" style="display: none;">
            <i class="bi bi-inbox"></i>
            <h4 class="text-muted">No appointments found</h4>
            <p class="text-muted">Try adjusting your search or filters</p>
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


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    const appointmentDetails = {
        1: {
            doctor: 'Dr. Juan Cruz',
            specialty: 'Family Medicine',
            date: 'January 8, 2026',
            time: '10:00 AM',
            reason: 'Annual physical examination and lab work review',
            location: 'Room 201, Building A',
            duration: '30 minutes',
            rating: 5,
            feedback: 'Excellent service! Dr. Cruz was very thorough and professional.',
            notes: 'Patient is in good health. Blood pressure normal. Cholesterol levels slightly elevated - recommend dietary changes.',
            prescription: 'Multivitamin (1x daily)',
            nextVisit: 'January 2027'
        },
        2: {
            doctor: 'Dr. Emily Rodriguez',
            specialty: 'Dermatology',
            date: 'January 5, 2026',
            time: '2:30 PM',
            reason: 'Skin condition follow-up and treatment review',
            location: 'Room 315, Building B',
            duration: '25 minutes',
            rating: 5,
            feedback: 'Very knowledgeable and caring. My skin has improved significantly!',
            notes: 'Skin condition showing improvement. Continue current treatment regimen.',
            prescription: 'Topical cream (2x daily)',
            nextVisit: 'March 2026'
        },
        3: {
            doctor: 'Dr. Patricia Gomez',
            specialty: 'General Dentist',
            date: 'December 20, 2025',
            time: '11:00 AM',
            reason: 'Routine dental cleaning and checkup',
            location: 'Room 401, Dental Wing',
            duration: '45 minutes',
            rating: 4,
            feedback: 'Great cleaning! Wait time was a bit long though.',
            notes: 'No cavities detected. Gums healthy. Continue regular flossing.',
            prescription: 'Fluoride toothpaste',
            nextVisit: 'June 2026'
        },
        4: {
            doctor: 'Dr. Robert Chen',
            specialty: 'Cardiologist',
            date: 'November 15, 2025',
            time: '9:30 AM',
            reason: 'Heart health screening and blood pressure monitoring',
            location: 'Room 305, Building B',
            duration: '40 minutes',
            rating: 5,
            feedback: 'Dr. Chen is amazing! Very detailed explanation of my heart health.',
            notes: 'Blood pressure within normal range. Heart rhythm regular. Continue exercise routine.',
            prescription: 'N/A',
            nextVisit: 'May 2026'
        },
        5: {
            doctor: 'Dr. Michael Torres',
            specialty: 'Ophthalmology',
            date: 'September 12, 2025',
            time: '3:15 PM',
            reason: 'Annual eye examination and vision test',
            location: 'Room 102, Eye Center',
            duration: '35 minutes',
            rating: 5,
            feedback: 'Perfect experience. New glasses prescription is spot on!',
            notes: 'Vision stable. New prescription for reading glasses provided.',
            prescription: 'Reading glasses prescription',
            nextVisit: 'September 2026'
        },
        6: {
            doctor: 'Dr. Lisa Anderson',
            specialty: 'Endocrinology',
            date: 'August 5, 2025',
            time: '10:45 AM',
            reason: 'Diabetes management and medication review',
            location: 'Room 204, Building C',
            duration: '40 minutes',
            rating: 4,
            feedback: 'Good consultation. Helped me adjust my medication schedule.',
            notes: 'Blood sugar levels improving. Continue current medication with adjusted timing.',
            prescription: 'Metformin (2x daily)',
            nextVisit: 'November 2025'
        }
    };

    function searchAppointments() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const cards = document.querySelectorAll('.appointment-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const text = card.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function filterByMonth(month) {
        const cards = document.querySelectorAll('.appointment-card');
        let visibleCount = 0;

        cards.forEach(card => {
            if (month === 'all' || card.dataset.month === month) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function filterByRating(minRating) {
        const cards = document.querySelectorAll('.appointment-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const cardRating = parseInt(card.dataset.rating);
            if (minRating === 'all' || cardRating >= parseInt(minRating)) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function viewDetails(appointmentId) {
        const details = appointmentDetails[appointmentId];
        if (!details) return;

        const stars = '★'.repeat(details.rating) + '☆'.repeat(5 - details.rating);

        const modalHTML = `
                <div class="modal fade" id="detailsModal" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 18px; border: none;">
                            <div class="modal-header" style="background: linear-gradient(135deg, #2f9e8f 0%, #268c7f 100%); color: white; border-radius: 18px 18px 0 0;">
                                <h5 class="modal-title fw-bold">
                                    <i class="bi bi-file-medical"></i> Appointment Details
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-person-fill text-doctor"></i> Doctor</small>
                                            <strong>${details.doctor}</strong>
                                            <p class="mb-0 small text-muted">${details.specialty}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-calendar3 text-doctor"></i> Date & Time</small>
                                            <strong>${details.date}</strong>
                                            <p class="mb-0 small text-muted">${details.time}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-geo-alt-fill text-doctor"></i> Location</small>
                                            <strong>${details.location}</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-clock-fill text-doctor"></i> Duration</small>
                                            <strong>${details.duration}</strong>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-chat-left-text-fill text-doctor"></i> Reason for Visit</small>
                                            <p class="mb-0">${details.reason}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-3" style="background-color: #e6f4f1; border-radius: 12px; border-left: 4px solid #2f9e8f;">
                                            <small class="text-muted d-block mb-2"><i class="bi bi-journal-medical text-doctor"></i> Doctor's Notes</small>
                                            <p class="mb-0">${details.notes}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-capsule text-doctor"></i> Prescription</small>
                                            <strong>${details.prescription}</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-arrow-repeat text-doctor"></i> Next Visit</small>
                                            <strong>${details.nextVisit}</strong>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-3" style="background-color: #fff3cd; border-radius: 12px;">
                                            <small class="text-muted d-block mb-2"><i class="bi bi-star-fill" style="color: #fbbf24;"></i> Your Rating & Feedback</small>
                                            <div style="color: #fbbf24; font-size: 1.5rem; margin-bottom: 0.5rem;">${stars}</div>
                                            <p class="mb-0 small"><em>"${details.feedback}"</em></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 1px solid #e5e7eb;">
                                <button type="button" class="btn btn-outline-doctor" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle"></i> Close
                                </button>
                                <button type="button" class="btn btn-doctor" onclick="printAppointmentReport(${appointmentId})">
                                    <i class="bi bi-printer"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

        const existingModal = document.getElementById('detailsModal');
        if (existingModal) existingModal.remove();

        document.body.insertAdjacentHTML('beforeend', modalHTML);
        const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
        modal.show();
    }

    function bookFollowUp(appointmentId) {
        const details = appointmentDetails[appointmentId];
        alert(
            `📅 Booking follow-up with ${details.doctor}\n\nYou'll be redirected to the booking page where ${details.doctor} will be pre-selected for you.`
        );
    }

    function downloadReport(appointmentId) {
        const details = appointmentDetails[appointmentId];
        const stars = '★'.repeat(details.rating) + '☆'.repeat(5 - details.rating);

        const printWindow = window.open('', '', 'height=700,width=900');
        printWindow.document.write(`
                <html>
                <head>
                    <title>Medical Report - ${details.doctor}</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 40px; line-height: 1.6; }
                        .header { border-bottom: 3px solid #2f9e8f; padding-bottom: 20px; margin-bottom: 30px; }
                        .header h1 { color: #2f9e8f; margin: 0; }
                        .info-section { margin: 25px 0; padding: 15px; background: #f9fafb; border-radius: 8px; }
                        .label { font-weight: bold; color: #2f9e8f; display: inline-block; width: 150px; }
                        .notes-section { background: #e6f4f1; padding: 20px; border-radius: 8px; border-left: 4px solid #2f9e8f; margin: 20px 0; }
                        .rating { color: #fbbf24; font-size: 1.5rem; }
                        @media print { button { display: none; } }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>📋 Medical Appointment Report</h1>
                        <p style="color: #6b7280; margin: 5px 0 0 0;">Generated on ${new Date().toLocaleDateString()}</p>
                    </div>
                    
                    <div class="info-section">
                        <p><span class="label">Doctor:</span> ${details.doctor}</p>
                        <p><span class="label">Specialty:</span> ${details.specialty}</p>
                        <p><span class="label">Date & Time:</span> ${details.date} at ${details.time}</p>
                        <p><span class="label">Location:</span> ${details.location}</p>
                        <p><span class="label">Duration:</span> ${details.duration}</p>
                    </div>

                    <div class="info-section">
                        <p><span class="label">Reason for Visit:</span></p>
                        <p>${details.reason}</p>
                    </div>

                    <div class="notes-section">
                        <h3 style="color: #2f9e8f; margin-top: 0;">Doctor's Notes</h3>
                        <p>${details.notes}</p>
                    </div>

                    <div class="info-section">
                        <p><span class="label">Prescription:</span> ${details.prescription}</p>
                        <p><span class="label">Next Visit:</span> ${details.nextVisit}</p>
                    </div>

                    <div class="info-section">
                        <p><span class="label">Your Rating:</span> <span class="rating">${stars}</span></p>
                        <p><span class="label">Your Feedback:</span></p>
                        <p style="font-style: italic;">"${details.feedback}"</p>
                    </div>

                    <div style="text-align: center; margin-top: 40px;">
                        <button onclick="window.print()" style="padding: 12px 30px; background: #2f9e8f; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; margin-right: 10px;">
                            🖨️ Print / Save as PDF
                        </button>
                        <button onclick="window.close()" style="padding: 12px 30px; background: #6b7280; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer;">
                            ❌ Close
                        </button>
                    </div>
                </body>
                </html>
            `);
        printWindow.document.close();
    }

    function printAppointmentReport(appointmentId) {
        downloadReport(appointmentId);
    }

    function downloadRecords() {
        const printWindow = window.open('', '', 'height=900,width=1100');
        let appointmentsList = '';

        Object.keys(appointmentDetails).forEach(id => {
            const details = appointmentDetails[id];
            const stars = '★'.repeat(details.rating) + '☆'.repeat(5 - details.rating);

            appointmentsList += `
                    <div style="margin: 30px 0; padding: 20px; border: 2px solid #e5e7eb; border-radius: 12px; page-break-inside: avoid;">
                        <h3 style="color: #2f9e8f; margin: 0 0 15px 0;">${details.doctor} - ${details.specialty}</h3>
                        <p><strong>Date:</strong> ${details.date} at ${details.time}</p>
                        <p><strong>Location:</strong> ${details.location} | <strong>Duration:</strong> ${details.duration}</p>
                        <p><strong>Reason:</strong> ${details.reason}</p>
                        <div style="background: #e6f4f1; padding: 15px; border-radius: 8px; margin: 10px 0;">
                            <strong style="color: #2f9e8f;">Notes:</strong> ${details.notes}
                        </div>
                        <p><strong>Prescription:</strong> ${details.prescription}</p>
                        <p><strong>Rating:</strong> <span style="color: #fbbf24;">${stars}</span> - <em>"${details.feedback}"</em></p>
                    </div>
                `;
        });

        printWindow.document.write(`
                <html>
                <head>
                    <title>All Past Appointments Report</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 40px; }
                        .header { text-align: center; border-bottom: 3px solid #2f9e8f; padding-bottom: 20px; margin-bottom: 40px; }
                        .header h1 { color: #2f9e8f; margin: 0; }
                        @media print { button { display: none; } }
                    </style>
                </head>
                <body>
                    <div class="header">
                        <h1>📚 Complete Medical Records</h1>
                        <p>Past Appointments Report - Generated on ${new Date().toLocaleDateString()}</p>
                    </div>
                    
                    ${appointmentsList}

                    <div style="text-align: center; margin-top: 40px;">
                        <button onclick="window.print()" style="padding: 12px 30px; background: #2f9e8f; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; margin-right: 10px;">
                            🖨️ Print / Save as PDF
                        </button>
                        <button onclick="window.close()" style="padding: 12px 30px; background: #6b7280; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer;">
                            ❌ Close
                        </button>
                    </div>
                </body>
                </html>
            `);
        printWindow.document.close();
    }
    </script>
</body>

</html>
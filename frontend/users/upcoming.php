<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upcoming Appointments - Online Appointment Booking System</title>
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
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <h2 class="fw-bold mb-1">Upcoming Appointments</h2>
                    <p class="mb-0 opacity-90">View and manage your scheduled appointments</p>
                </div>
                <a href="book.php" class="btn btn-light btn-lg">
                    <i class="bi bi-calendar-plus"></i> <span class="d-none d-sm-inline">Book New</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container pb-5">
        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <div class="filter-tab active" onclick="filterAppointments('all')">
                <i class="bi bi-calendar-check"></i> All
            </div>
            <div class="filter-tab" onclick="filterAppointments('today')">
                <i class="bi bi-calendar-day"></i> Today
            </div>
            <div class="filter-tab" onclick="filterAppointments('week')">
                <i class="bi bi-calendar-week"></i> This Week
            </div>
            <div class="filter-tab" onclick="filterAppointments('month')">
                <i class="bi bi-calendar-month"></i> This Month
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- Appointments List -->
                <div id="appointmentsList">
                    <!-- Appointment 1 - Today -->
                    <div class="appointment-card" data-filter="today week month all">
                        <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
                            <span class="appointment-status status-confirmed">Confirmed</span>
                            <span class="countdown-badge urgent-badge">
                                <i class="bi bi-alarm"></i> Today at 2:00 PM
                            </span>
                        </div>

                        <div class="doctor-info">
                            <div class="doctor-avatar">
                                <i class="bi bi-person"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-1">Dr. Maria Santos</h5>
                                <p class="text-muted mb-0 small">Internal Medicine</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="info-badge">
                                <i class="bi bi-calendar"></i>
                                <span>Sunday, Jan 11, 2026</span>
                            </div>
                            <div class="info-badge">
                                <i class="bi bi-clock"></i>
                                <span>2:00 PM</span>
                            </div>
                            <div class="info-badge">
                                <i class="bi bi-geo-alt"></i>
                                <span>Room 204, Bldg A</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="mb-1 small text-muted">Reason:</p>
                            <p class="mb-0">Annual health checkup and blood pressure monitoring</p>
                        </div>

                        <div class="action-buttons">
                            <button class="btn btn-outline-doctor btn-sm-custom" onclick="viewDetails(1)">
                                <i class="bi bi-eye"></i> Details
                            </button>
                            <button class="btn btn-outline-doctor btn-sm-custom" onclick="reschedule(1)">
                                <i class="bi bi-calendar-event"></i> Reschedule
                            </button>
                            <button class="btn btn-outline-danger btn-sm-custom" onclick="cancelAppointment(1)">
                                <i class="bi bi-x-circle"></i> Cancel
                            </button>
                        </div>
                    </div>

                    <!-- Appointment 2 - This Week -->
                    <div class="appointment-card" data-filter="week month all">
                        <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
                            <span class="appointment-status status-confirmed">Confirmed</span>
                            <span class="countdown-badge">
                                <i class="bi bi-clock-history"></i> In 3 days
                            </span>
                        </div>

                        <div class="doctor-info">
                            <div class="doctor-avatar">
                                <i class="bi bi-person"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-1">Dr. Robert Chen</h5>
                                <p class="text-muted mb-0 small">Cardiologist</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="info-badge">
                                <i class="bi bi-calendar"></i>
                                <span>Wed, Jan 14, 2026</span>
                            </div>
                            <div class="info-badge">
                                <i class="bi bi-clock"></i>
                                <span>10:00 AM</span>
                            </div>
                            <div class="info-badge">
                                <i class="bi bi-geo-alt"></i>
                                <span>Room 305, Bldg B</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="mb-1 small text-muted">Reason:</p>
                            <p class="mb-0">Follow-up cardiovascular health assessment</p>
                        </div>

                        <div class="action-buttons">
                            <button class="btn btn-outline-doctor btn-sm-custom" onclick="viewDetails(2)">
                                <i class="bi bi-eye"></i> Details
                            </button>
                            <button class="btn btn-outline-doctor btn-sm-custom" onclick="reschedule(2)">
                                <i class="bi bi-calendar-event"></i> Reschedule
                            </button>
                            <button class="btn btn-outline-danger btn-sm-custom" onclick="cancelAppointment(2)">
                                <i class="bi bi-x-circle"></i> Cancel
                            </button>
                        </div>
                    </div>

                    <!-- Appointment 3 - This Month -->
                    <div class="appointment-card" data-filter="month all">
                        <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
                            <span class="appointment-status status-pending">Pending</span>
                            <span class="countdown-badge">
                                <i class="bi bi-clock-history"></i> In 10 days
                            </span>
                        </div>

                        <div class="doctor-info">
                            <div class="doctor-avatar">
                                <i class="bi bi-person"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-1">Dr. Lisa Garcia</h5>
                                <p class="text-muted mb-0 small">Pediatrician</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="info-badge">
                                <i class="bi bi-calendar"></i>
                                <span>Sat, Jan 21, 2026</span>
                            </div>
                            <div class="info-badge">
                                <i class="bi bi-clock"></i>
                                <span>3:30 PM</span>
                            </div>
                            <div class="info-badge">
                                <i class="bi bi-geo-alt"></i>
                                <span>Room 102, Bldg C</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="mb-1 small text-muted">Reason:</p>
                            <p class="mb-0">Routine vaccination and developmental assessment</p>
                        </div>

                        <div class="alert alert-warning border-0 mb-3"
                            style="background-color: #fef3c7; color: #92400e;">
                            <i class="bi bi-info-circle"></i>
                            <small>Awaiting confirmation. You'll be notified soon.</small>
                        </div>

                        <div class="action-buttons">
                            <button class="btn btn-outline-doctor btn-sm-custom" onclick="viewDetails(3)">
                                <i class="bi bi-eye"></i> Details
                            </button>
                            <button class="btn btn-outline-doctor btn-sm-custom" onclick="reschedule(3)">
                                <i class="bi bi-calendar-event"></i> Reschedule
                            </button>
                            <button class="btn btn-outline-danger btn-sm-custom" onclick="cancelAppointment(3)">
                                <i class="bi bi-x-circle"></i> Cancel
                            </button>
                        </div>
                    </div>

                    <!-- Appointment 4 - This Month -->
                    <div class="appointment-card" data-filter="month all">
                        <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
                            <span class="appointment-status status-upcoming">Scheduled</span>
                            <span class="countdown-badge">
                                <i class="bi bi-clock-history"></i> In 18 days
                            </span>
                        </div>

                        <div class="doctor-info">
                            <div class="doctor-avatar">
                                <i class="bi bi-person"></i>
                            </div>
                            <div>
                                <h5 class="fw-semibold mb-1">Dr. Patricia Gomez</h5>
                                <p class="text-muted mb-0 small">General Dentist</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="info-badge">
                                <i class="bi bi-calendar"></i>
                                <span>Sun, Jan 29, 2026</span>
                            </div>
                            <div class="info-badge">
                                <i class="bi bi-clock"></i>
                                <span>11:00 AM</span>
                            </div>
                            <div class="info-badge">
                                <i class="bi bi-geo-alt"></i>
                                <span>Room 401, Dental</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="mb-1 small text-muted">Reason:</p>
                            <p class="mb-0">Dental cleaning and oral health examination</p>
                        </div>

                        <div class="action-buttons">
                            <button class="btn btn-outline-doctor btn-sm-custom" onclick="viewDetails(4)">
                                <i class="bi bi-eye"></i> Details
                            </button>
                            <button class="btn btn-outline-doctor btn-sm-custom" onclick="reschedule(4)">
                                <i class="bi bi-calendar-event"></i> Reschedule
                            </button>
                            <button class="btn btn-outline-danger btn-sm-custom" onclick="cancelAppointment(4)">
                                <i class="bi bi-x-circle"></i> Cancel
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div class="empty-state" id="emptyState" style="display: none;">
                    <div class="empty-icon">
                        <i class="bi bi-calendar-x"></i>
                    </div>
                    <h4 class="fw-semibold mb-2">No Appointments Found</h4>
                    <p class="text-muted mb-4">You don't have any upcoming appointments in this period.</p>
                    <a href="book.php" class="btn btn-doctor">
                        <i class="bi bi-calendar-plus"></i> Book Appointment
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card-doctor p-4 sticky-top" style="top: 20px;">
                    <h5 class="fw-semibold mb-3">
                        <i class="bi bi-info-circle text-doctor"></i> Quick Info
                    </h5>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">Total Upcoming:</span>
                            <span class="fw-bold text-doctor fs-4">4</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted">This Week:</span>
                            <span class="fw-bold">2</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Pending:</span>
                            <span class="fw-bold">1</span>
                        </div>
                    </div>

                    <hr>

                    <div class="alert alert-info border-0 mb-3" style="background-color: #e6f4f1; color: #2f9e8f;">
                        <h6 class="fw-semibold mb-2">
                            <i class="bi bi-lightbulb"></i> Reminder
                        </h6>
                        <small>
                            Please arrive 15 minutes before your scheduled appointment time.
                        </small>
                    </div>

                    <div class="alert alert-warning border-0 mb-3" style="background-color: #fef3c7; color: #92400e;">
                        <h6 class="fw-semibold mb-2">
                            <i class="bi bi-exclamation-triangle"></i> Important
                        </h6>
                        <small>
                            Bring your ID and insurance card to all appointments.
                        </small>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="book.php" class="btn btn-doctor">
                            <i class="bi bi-calendar-plus"></i> Book New
                        </a>
                        <a href="history.php" class="btn btn-outline-doctor">
                            <i class="bi bi-journal-text"></i> View History
                        </a>
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
    function filterAppointments(filter) {
        // Update active tab
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        event.target.closest('.filter-tab').classList.add('active');

        // Filter appointments
        const appointments = document.querySelectorAll('.appointment-card');
        let visibleCount = 0;

        appointments.forEach(card => {
            const filters = card.getAttribute('data-filter').split(' ');
            if (filters.includes(filter)) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide empty state
        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function viewDetails(appointmentId) {
        alert('View details for appointment ' + appointmentId);
        // In production, open a modal or navigate to details page
    }

    function reschedule(appointmentId) {
        if (confirm('Do you want to reschedule this appointment?')) {
            alert('Redirecting to reschedule page...');
            // In production, navigate to reschedule page
        }
    }

    function cancelAppointment(appointmentId) {
        if (confirm('Are you sure you want to cancel this appointment? This action cannot be undone.')) {
            alert('Appointment cancelled successfully');
            // In production, send cancellation request to backend
            location.reload();
        }
    }
    </script>
</body>

</html>
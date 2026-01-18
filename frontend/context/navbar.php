<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-semibold" href="index.php">
            <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']): ?>

                <?php $role = $_SESSION['FK_tblRole']; ?>



                <!-- ================= User ================= -->
                <?php 
                    // Get current page filename
                    $current_page = basename($_SERVER['PHP_SELF']);

                    if ($role == 1): 
                    ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'home.php') ? 'active' : ''; ?>"
                        href="home.php">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo in_array($current_page, ['book.php', 'upcoming.php', 'past.php', 'history.php']) ? 'active' : ''; ?>"
                        href="#" id="appointmentDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Appointments</a>
                    <ul class="dropdown-menu" aria-labelledby="appointmentDropdown">
                        <li><a class="dropdown-item <?php echo ($current_page == '../users/book.php') ? 'active' : ''; ?>"
                                href="book.php">Book Appointment</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == '../users/upcoming.php') ? 'active' : ''; ?>"
                                href="upcoming.php">Upcoming Appointments</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == '../users/past.php') ? 'active' : ''; ?>"
                                href="past.php">Past Appointments</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == '../users/history.php') ? 'active' : ''; ?>"
                                href="history.php">Appointment History</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == '../users/payments.php') ? 'active' : ''; ?>"
                        href="payments.php">Payments</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == '../users/support.php') ? 'active' : ''; ?>"
                        href="support.php">Support</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == '../users/profile.php') ? 'active' : ''; ?>"
                        href="profile.php">Profile</a>
                </li>
                <?php endif; ?>

                <!-- ================= Admin ================= -->
                <?php if ($role == 2): ?>
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="appointmentDropdown" role="button"
                        data-bs-toggle="dropdown">Appointments</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="allAppointments.php">All Appointments</a></li>
                        <li><a class="dropdown-item" href="walkin.php">Book Walk-in</a></li>
                        <li><a class="dropdown-item" href="manageStatus.php">Manage Status</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="doctors.php">Doctors</a></li>
                <li class="nav-item"><a class="nav-link" href="patients.php">Patients</a></li>
                <li class="nav-item"><a class="nav-link" href="reports.php">Reports</a></li>
                <li class="nav-item"><a class="nav-link" href="inventory.php">Inventory</a></li>
                <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                <?php endif; ?>

                <!-- ================= Super Admin ================= -->
                <?php if ($role == 3): ?>
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="appointmentDropdown" role="button"
                        data-bs-toggle="dropdown">Appointments</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="allAppointments.php">All Appointments</a></li>
                        <li><a class="dropdown-item" href="walkin.php">Book Walk-in</a></li>
                        <li><a class="dropdown-item" href="manageStatus.php">Manage Status</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="doctors.php">Doctors</a></li>
                <li class="nav-item"><a class="nav-link" href="patients.php">Patients</a></li>
                <li class="nav-item"><a class="nav-link" href="reports.php">Reports</a></li>

                <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                <?php endif; ?>

                <!-- ================= Doctor ================= -->
                <?php if ($role == 4): ?>
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="myschedule.php">My Schedule</a></li>
                <li class="nav-item"><a class="nav-link" href="myappointment.php">My Appointment</a></li>
                <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
                <?php endif; ?>

                <!-- ================= Logout Button ================= -->
                <li class="nav-item ms-lg-3">
                    <a class="nav-link-login nav-link" href="../../backend/logout.php"
                        onclick="return confirm('Are you sure you want to logout?');">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>

                <?php else: ?>
                <!-- ================= GUEST ================= -->
                <li class="nav-item"><a class="nav-link" href="frontend/index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="frontend/about-us.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="frontend/doctor-list.php">Doctor List</a></li>
                <li class="nav-item"><a class="nav-link" href="frontend/departments.php">Departments & Services</a></li>
                <li class="nav-item"><a class="nav-link" href="frontend/contact.php">Contact Us</a></li>
                <li class="nav-item ms-lg-3">
                    <span class="nav-link-login nav-link" role="button" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </span>
                </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
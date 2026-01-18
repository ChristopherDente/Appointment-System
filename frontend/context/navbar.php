<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get current page filename
$current_page = basename($_SERVER['PHP_SELF']);

// Get current directory
$current_dir = basename(dirname($_SERVER['PHP_SELF']));

// Determine path prefix based on directory level
if ($current_dir == 'users' || $current_dir == 'admin' || $current_dir == 'doctor') {
    $pathPrefix = '../';
} else {
    $pathPrefix = './';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-semibold" href="<?php echo $pathPrefix; ?>index.php">
            <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']): ?>

                <?php $role = $_SESSION['FK_tblRole']; ?>

                <!-- ================= User (Patient) ================= -->
                <?php if ($role == 1): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'home.php') ? 'active' : ''; ?>"
                        href="<?php echo ($current_dir == 'users') ? '' : '../users/'; ?>home.php">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo in_array($current_page, ['book.php', 'upcoming.php', 'past.php', 'history.php']) ? 'active' : ''; ?>"
                        href="#" id="appointmentDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Appointments</a>
                    <ul class="dropdown-menu" aria-labelledby="appointmentDropdown">
                        <li><a class="dropdown-item <?php echo ($current_page == 'book.php') ? 'active' : ''; ?>"
                                href="<?php echo ($current_dir == 'users') ? '' : '../users/'; ?>book.php">Book Appointment</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == 'upcoming.php') ? 'active' : ''; ?>"
                                href="<?php echo ($current_dir == 'users') ? '' : '../users/'; ?>upcoming.php">Upcoming Appointments</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == 'past.php') ? 'active' : ''; ?>"
                                href="<?php echo ($current_dir == 'users') ? '' : '../users/'; ?>past.php">Past Appointments</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == 'history.php') ? 'active' : ''; ?>"
                                href="<?php echo ($current_dir == 'users') ? '' : '../users/'; ?>history.php">Appointment History</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'payments.php') ? 'active' : ''; ?>"
                        href="<?php echo ($current_dir == 'users') ? '' : '../users/'; ?>payments.php">Payments</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'support.php') ? 'active' : ''; ?>"
                        href="<?php echo ($current_dir == 'users') ? '' : '../users/'; ?>support.php">Support</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>"
                        href="<?php echo ($current_dir == 'users') ? '' : '../users/'; ?>profile.php">Profile</a>
                </li>
                <?php endif; ?>

                <!-- ================= Admin ================= -->
                <?php if ($role == 2): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo in_array($current_page, ['allAppointments.php', 'walkin.php', 'manageStatus.php']) ? 'active' : ''; ?>" 
                        href="#" id="appointmentDropdown" role="button" data-bs-toggle="dropdown">Appointments</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?php echo ($current_page == 'allAppointments.php') ? 'active' : ''; ?>" 
                                href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>allAppointments.php">All Appointments</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == 'walkin.php') ? 'active' : ''; ?>" 
                                href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>walkin.php">Book Walk-in</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == 'manageStatus.php') ? 'active' : ''; ?>" 
                                href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>manageStatus.php">Manage Status</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'doctors.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>doctors.php">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'patients.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>patients.php">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'reports.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>reports.php">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'inventory.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>inventory.php">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>profile.php">Profile</a>
                </li>
                <?php endif; ?>

                <!-- ================= Super Admin ================= -->
                <?php if ($role == 3): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php echo in_array($current_page, ['allAppointments.php', 'walkin.php', 'manageStatus.php']) ? 'active' : ''; ?>" 
                        href="#" id="appointmentDropdown" role="button" data-bs-toggle="dropdown">Appointments</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?php echo ($current_page == 'allAppointments.php') ? 'active' : ''; ?>" 
                                href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>allAppointments.php">All Appointments</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == 'walkin.php') ? 'active' : ''; ?>" 
                                href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>walkin.php">Book Walk-in</a></li>
                        <li><a class="dropdown-item <?php echo ($current_page == 'manageStatus.php') ? 'active' : ''; ?>" 
                                href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>manageStatus.php">Manage Status</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'doctors.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>doctors.php">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'patients.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>patients.php">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'reports.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>reports.php">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'admin') ? '' : '../admin/'; ?>profile.php">Profile</a>
                </li>
                <?php endif; ?>

                <!-- ================= Doctor ================= -->
                <?php if ($role == 4): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'doctor') ? '' : '../doctor/'; ?>dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'myschedule.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'doctor') ? '' : '../doctor/'; ?>myschedule.php">My Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'myappointment.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'doctor') ? '' : '../doctor/'; ?>myappointment.php">My Appointment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'profile.php') ? 'active' : ''; ?>" 
                        href="<?php echo ($current_dir == 'doctor') ? '' : '../doctor/'; ?>profile.php">Profile</a>
                </li>
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
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" 
                        href="<?php echo $pathPrefix; ?>frontend/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'about-us.php') ? 'active' : ''; ?>" 
                        href="<?php echo $pathPrefix; ?>frontend/about-us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'doctor-list.php') ? 'active' : ''; ?>" 
                        href="<?php echo $pathPrefix; ?>frontend/doctor-list.php">Doctor List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'departments.php') ? 'active' : ''; ?>" 
                        href="<?php echo $pathPrefix; ?>frontend/departments.php">Departments & Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>" 
                        href="<?php echo $pathPrefix; ?>frontend/contact.php">Contact Us</a>
                </li>
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
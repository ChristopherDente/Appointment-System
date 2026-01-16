<?php session_start(); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-semibold" href="#">
            <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <!-- ================= ADMIN ================= -->
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1): ?>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Appointments</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="allAppointments.php">All Appointments</a></li>
                            <li><a class="dropdown-item" href="walkin.php">Walk-in</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="doctors.php">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="patients.php">Patients</a></li>
                    <li class="nav-item"><a class="nav-link" href="reports.php">Reports</a></li>
                <?php endif; ?>

                <!-- ================= DOCTOR ================= -->
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 2): ?>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="schedule.php">My Schedule</a></li>
                <?php endif; ?>

                <!-- ================= PATIENT ================= -->
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 3): ?>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Appointments</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="book.php">Book</a></li>
                            <li><a class="dropdown-item" href="upcoming.php">Upcoming</a></li>
                            <li><a class="dropdown-item" href="history.php">History</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="payments.php">Payments</a></li>
                <?php endif; ?>

                <!-- ================= LOGOUT ================= -->
                <?php if (isset($_SESSION['is_login'])): ?>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link" href="logout.php"
                           onclick="return confirm('Logout?');">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

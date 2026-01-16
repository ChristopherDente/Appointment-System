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

                <?php if (isset($_SESSION['is_login'])): ?>

                    <!-- ================= User ================= -->
                    <?php if ($_SESSION['role'] == 1): ?>
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

                    <!-- ================= Admin ================= -->
                    <?php if ($_SESSION['role'] == 2): ?>
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="schedule.php">My Schedule</a></li>
                    <?php endif; ?>

                

                    <!-- ================= Super Admin ================= -->
                    <?php if ($_SESSION['role'] == 3): ?>
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

                    <!-- ================= Doctor ================= -->
                    <?php if ($_SESSION['role'] == 4): ?>
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="schedule.php">My Schedule</a></li>
                    <?php endif; ?>

                    <!-- LOGOUT -->
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link" href="logout.php" onclick="return confirm('Logout?');">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>

                <?php else: ?>

                    <!-- ================= GUEST ================= -->
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctor-list.php">Doctors</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light btn-sm ms-lg-2" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">
                            Register
                        </a>
                    </li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

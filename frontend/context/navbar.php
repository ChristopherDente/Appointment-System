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
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">Dashboard</a>
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
                    <a class="nav-link" href="support.php">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link position-relative d-flex align-items-center justify-content-center dropdown-toggle"
                        href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="width: 40px; height: 40px;">

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
                <?php endif; ?>

                <!-- ================= Admin ================= -->
                <?php if ($_SESSION['role'] == 2): ?>
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="schedule.php">My Schedule</a></li>
                <?php endif; ?>



                <!-- ================= Super Admin ================= -->
                <?php if ($_SESSION['role'] == 3): ?>
                  <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="appointmentDropdown" role="button"
                        data-bs-toggle="dropdown">Appointments</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="allAppointments.php">All Appointments</a></li>
                        <li><a class="dropdown-item" href="walkin.php">Book Walk-in</a></li>
                        <li><a class="dropdown-item" href="manageStatus.php">Manage Status</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctors.php">Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="patients.php">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inventory.php">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link position-relative d-flex align-items-center justify-content-center dropdown-toggle"
                        href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="width: 40px; height: 40px;">

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
                <?php endif; ?>

                <!-- ================= Doctor ================= -->
                <?php if ($_SESSION['role'] == 4): ?>
                 <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="schedule.php">My Schedule</a>
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
                <?php endif; ?>

                <!-- LOGOUT -->
                <li class="nav-item ms-lg-3">
                    <a class="nav-link" href="logout.php" onclick="return confirm('Logout?');">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>

                <?php else: ?>

                <!-- ================= GUEST ================= -->
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

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
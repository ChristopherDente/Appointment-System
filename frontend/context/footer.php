<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Determine the correct path prefix based on current location
$isInFrontend = strpos($_SERVER['PHP_SELF'], '/frontend/') !== false;
$pathPrefix = $isInFrontend ? '' : 'frontend/';
?>
 

<footer class="footer-doctor mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-semibold text-white mb-3">
                    <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
                </h5>
                <p class="small text-light opacity-75 mb-3">
                    A secure and easy-to-use online appointment booking platform designed for patients and healthcare providers.
                </p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="footer-social" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="footer-social" aria-label="Twitter">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="#" class="footer-social" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="footer-social" aria-label="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>

            <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']): ?>
                <?php $role = $_SESSION['FK_tblRole']; ?>

                <!-- ================= User (Patient) Footer ================= -->
                <?php if ($role == 1): ?>
                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6">
                        <h6 class="text-white fw-semibold mb-3">Quick Links</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="../pages/home.php">Dashboard</a></li>
                            <li><a href="../users/book.php">Book Appointment</a></li>
                            <li><a href="../users/upcoming.php">Upcoming</a></li>
                            <li><a href="../users/history.php">History</a></li>
                            <li><a href="../users/profile.php">Profile</a></li>
                        </ul>
                    </div>

                    <!-- Services -->
                    <div class="col-lg-3 col-md-6">
                        <h6 class="text-white fw-semibold mb-3">Services</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="../users/payments.php">Payment History</a></li>
                            <li><a href="../users/support.php">Support</a></li>
                        
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- ================= Admin Footer ================= -->
                <?php if ($role == 2): ?>
                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6">
                        <h6 class="text-white fw-semibold mb-3">Quick Links</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="allAppointments.php">Appointments</a></li>
                            <li><a href="doctors.php">Doctors</a></li>
                            <li><a href="patients.php">Patients</a></li>
                            <li><a href="profile.php">Profile</a></li>
                        </ul>
                    </div>

                    <!-- Management -->
                    <div class="col-lg-3 col-md-6">
                        <h6 class="text-white fw-semibold mb-3">Management</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="walkin.php">Book Walk-in</a></li>
                            <li><a href="manageStatus.php">Manage Status</a></li>
                            <li><a href="reports.php">Reports</a></li>
                            <li><a href="inventory.php">Inventory</a></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- ================= Super Admin Footer ================= -->
                <?php if ($role == 3): ?>
                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6">
                        <h6 class="text-white fw-semibold mb-3">Quick Links</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="allAppointments.php">Appointments</a></li>
                            <li><a href="doctors.php">Doctors</a></li>
                            <li><a href="patients.php">Patients</a></li>
                            <li><a href="profile.php">Profile</a></li>
                        </ul>
                    </div>

                    <!-- Management -->
                    <div class="col-lg-3 col-md-6">
                        <h6 class="text-white fw-semibold mb-3">Management</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="walkin.php">Book Walk-in</a></li>
                            <li><a href="manageStatus.php">Manage Status</a></li>
                            <li><a href="reports.php">Reports</a></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- ================= Doctor Footer ================= -->
                <?php if ($role == 4): ?>
                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6">
                        <h6 class="text-white fw-semibold mb-3">Quick Links</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="myschedule.php">My Schedule</a></li>
                            <li><a href="myappointment.php">My Appointments</a></li>
                            <li><a href="profile.php">Profile</a></li>
                        </ul>
                    </div>

                    <!-- Services -->
                    <div class="col-lg-3 col-md-6">
                        <h6 class="text-white fw-semibold mb-3">Resources</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="myschedule.php">Manage Schedule</a></li>
                            <li><a href="myappointment.php">View Appointments</a></li>
                            <li><a href="profile.php">Update Profile</a></li>
                        </ul>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <!-- ================= GUEST Footer ================= -->
                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="text-white fw-semibold mb-3">Quick Links</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="<?php echo $pathPrefix; ?>index.php">Home</a></li>
                        <li><a href="<?php echo $pathPrefix; ?>about-us.php">About Us</a></li>
                        <li><a href="<?php echo $pathPrefix; ?>doctor-list.php">Doctors</a></li>
                        <li><a href="<?php echo $pathPrefix; ?>departments.php">Departments</a></li>
                        <li><a href="<?php echo $pathPrefix; ?>contact.php">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="text-white fw-semibold mb-3">Our Services</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="<?php echo $pathPrefix; ?>departments.php">General Consultation</a></li>
                        <li><a href="<?php echo $pathPrefix; ?>departments.php">Pediatrics</a></li>
                        <li><a href="<?php echo $pathPrefix; ?>departments.php">Cardiology</a></li>
                        <li><a href="<?php echo $pathPrefix; ?>departments.php">Dermatology</a></li>
                        <li><a href="<?php echo $pathPrefix; ?>departments.php">View All</a></li>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Contact Info (Always visible) -->
            <div class="col-lg-3 col-md-6">
                <h6 class="text-white fw-semibold mb-3">Contact Us</h6>
                <ul class="list-unstyled small text-light opacity-75">
                    <li class="mb-2">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        <span>Bauang, Ilocos, Philippines</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-envelope-fill me-2"></i>
                        <a href="mailto:onlineappointmentsystem00@gmail.com" class="text-light text-decoration-none opacity-75">
                            onlineappointmentsystem00@gmail.com
                        </a>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-telephone-fill me-2"></i>
                        <a href="tel:+639127339200" class="text-light text-decoration-none opacity-75">
                            +63 912 733 9200
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-clock-fill me-2"></i>
                        <span>Mon - Sat: 8:00 AM - 5:00 PM</span>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="footer-divider my-4">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="small text-light opacity-75 mb-0">
                    © <?php echo date('Y'); ?> Online Appointment Booking System. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login']): ?>
                    <a href="profile.php" class="text-light opacity-75 text-decoration-none small me-3">My Account</a>
                    <a href="../../backend/logout.php" class="text-light opacity-75 text-decoration-none small" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
                <?php else: ?>
                    <a href="<?php echo $pathPrefix; ?>privacy-policy.php" class="text-light opacity-75 text-decoration-none small me-3">Privacy Policy</a>
                    <a href="<?php echo $pathPrefix; ?>terms.php" class="text-light opacity-75 text-decoration-none small">Terms of Service</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor Schedule - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<!-- NAVBAR (UNCHANGED FORMAT) -->
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
                <li class="nav-item">
                    <a class="nav-link active" href="schedule.php">My Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="doctor_profile.php">Profile</a>
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

<!-- PAGE HEADER (SAME STYLE) -->
<div class="page-header">
    <div class="container">
        <h2 class="fw-bold mb-2">My Schedule</h2>
        <p class="mb-0 opacity-90">Doctor appointment schedule</p>
    </div>
</div>

<!-- CONTENT (ONLY THIS IS NEW) -->
<div class="container dashboard-content">

    <!-- TODAY -->
    <div class="mb-5">
        <h4 class="fw-semibold mb-3">Today's Appointments</h4>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Time</th>
                        <th>Patient</th>
                        <th>Service</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>9:00 AM</td>
                        <td>Juan Dela Cruz</td>
                        <td>General Checkup</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                    </tr>
                    <tr>
                        <td>10:30 AM</td>
                        <td>Maria Santos</td>
                        <td>Consultation</td>
                        <td><span class="badge bg-primary">Confirmed</span></td>
                    </tr>
                    <tr>
                        <td>1:00 PM</td>
                        <td>Anna Lopez</td>
                        <td>Follow-up</td>
                        <td><span class="badge bg-success">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- WEEK -->
    <div>
        <h4 class="fw-semibold mb-3">Weekly Overview</h4>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Total Appointments</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jan 13, 2026</td>
                        <td>Monday</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Jan 14, 2026</td>
                        <td>Tuesday</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>Jan 15, 2026</td>
                        <td>Wednesday</td>
                        <td>6</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- FOOTER (UNCHANGED STYLE) -->
<footer class="footer-doctor mt-5">
    <div class="container py-4 text-center text-light opacity-75 small">
        © 2026 Online Appointment Booking System. All rights reserved.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

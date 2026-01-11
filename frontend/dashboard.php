<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // or your homepage
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- optional -->
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDashboard">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarDashboard">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <span class="nav-link">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>
        <p>Hello, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! You are logged in.</p>

        <!-- Example: Appointment Summary -->
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="card-title">Your Appointments</h5>
                <p class="card-text">You can view, book, or track your appointments from the system.</p>
                <a href="index.php" class="btn btn-doctor">Book New Appointment</a>
                <a href="index.php" class="btn btn-outline-doctor">Track Appointment</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

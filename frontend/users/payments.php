<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payments - Online Appointment Booking System</title>
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
                        <a class="nav-link active" href="payments.php">Payments</a>
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
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="dashboard.php" class="text-white text-decoration-none me-3">
                        <i class="bi bi-arrow-left fs-4"></i>
                    </a>
                    <div>
                        <h2 class="fw-bold mb-1">Billing & Payments</h2>
                        <p class="mb-0 opacity-90">View your payment history and manage billing</p>
                    </div>
                </div>
                <button class="btn btn-light" onclick="window.print()">
                    <i class="bi bi-printer"></i> Print Statement
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <h3>₱4,850</h3>
                    <p><i class="bi bi-wallet2"></i> Total Spent</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card" style="background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);">
                    <h3>8</h3>
                    <p><i class="bi bi-check-circle"></i> Paid Transactions</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card" style="background: linear-gradient(135deg, #FF9800 0%, #F57C00 100%);">
                    <h3>₱550</h3>
                    <p><i class="bi bi-clock-history"></i> Pending Payments</p>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="card-doctor p-4 mb-4">
            <div class="row align-items-center mb-3">
                <div class="col-md-6">
                    <div class="filter-tabs">
                        <span class="filter-tab active" onclick="filterPayments('all')">All</span>
                        <span class="filter-tab" onclick="filterPayments('paid')">Paid</span>
                        <span class="filter-tab" onclick="filterPayments('pending')">Pending</span>
                        <span class="filter-tab" onclick="filterPayments('failed')">Failed</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" class="form-control"
                            placeholder="Search by invoice number, doctor, or date..." id="searchInput"
                            onkeyup="searchPayments()">
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment History -->
        <div class="card-doctor p-4">
            <h5 class="fw-semibold mb-4">
                <i class="bi bi-receipt text-doctor"></i> Payment History
            </h5>

            <div id="paymentList">
                <!-- Payment Card 1 -->
                <div class="payment-card" data-status="paid">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Invoice #</div>
                            <div class="fw-semibold">INV-2026-001</div>
                            <div class="text-muted small">Jan 10, 2026</div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-muted small mb-1">Doctor</div>
                            <div class="fw-semibold">Dr. Maria Santos</div>
                            <div class="text-muted small">General Medicine</div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Payment Method</div>
                            <div class="payment-method-badge">
                                <i class="bi bi-credit-card"></i> Credit Card
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Amount</div>
                            <div class="fw-bold text-doctor">₱550</div>
                        </div>
                        <div class="col-md-2">
                            <span class="status-badge status-paid">
                                <i class="bi bi-check-circle"></i> Paid
                            </span>
                        </div>
                        <div class="col-md-1 text-end">
                            <button class="btn btn-sm btn-outline-doctor invoice-btn"
                                onclick="downloadInvoice('INV-2026-001')">
                                <i class="bi bi-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Card 2 -->
                <div class="payment-card" data-status="pending">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Invoice #</div>
                            <div class="fw-semibold">INV-2026-002</div>
                            <div class="text-muted small">Jan 15, 2026</div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-muted small mb-1">Doctor</div>
                            <div class="fw-semibold">Dr. Robert Chen</div>
                            <div class="text-muted small">Cardiology</div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Payment Method</div>
                            <div class="payment-method-badge">
                                <i class="bi bi-cash-coin"></i> Cash on Arrival
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Amount</div>
                            <div class="fw-bold text-doctor">₱1,250</div>
                        </div>
                        <div class="col-md-2">
                            <span class="status-badge status-pending">
                                <i class="bi bi-clock"></i> Pending
                            </span>
                        </div>
                        <div class="col-md-1 text-end">
                            <button class="btn btn-sm btn-doctor invoice-btn" onclick="payNow('INV-2026-002')">
                                Pay
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Card 3 -->
                <div class="payment-card" data-status="paid">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Invoice #</div>
                            <div class="fw-semibold">INV-2025-158</div>
                            <div class="text-muted small">Dec 28, 2025</div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-muted small mb-1">Doctor</div>
                            <div class="fw-semibold">Dr. Lisa Garcia</div>
                            <div class="text-muted small">Pediatrics</div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Payment Method</div>
                            <div class="payment-method-badge">
                                <i class="bi bi-phone"></i> GCash
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Amount</div>
                            <div class="fw-bold text-doctor">₱650</div>
                        </div>
                        <div class="col-md-2">
                            <span class="status-badge status-paid">
                                <i class="bi bi-check-circle"></i> Paid
                            </span>
                        </div>
                        <div class="col-md-1 text-end">
                            <button class="btn btn-sm btn-outline-doctor invoice-btn"
                                onclick="downloadInvoice('INV-2025-158')">
                                <i class="bi bi-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Card 4 -->
                <div class="payment-card" data-status="paid">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Invoice #</div>
                            <div class="fw-semibold">INV-2025-145</div>
                            <div class="text-muted small">Dec 15, 2025</div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-muted small mb-1">Doctor</div>
                            <div class="fw-semibold">Dr. Emily Rodriguez</div>
                            <div class="text-muted small">Dermatology</div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Payment Method</div>
                            <div class="payment-method-badge">
                                <i class="bi bi-wallet2"></i> PayMaya
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Amount</div>
                            <div class="fw-bold text-doctor">₱850</div>
                        </div>
                        <div class="col-md-2">
                            <span class="status-badge status-paid">
                                <i class="bi bi-check-circle"></i> Paid
                            </span>
                        </div>
                        <div class="col-md-1 text-end">
                            <button class="btn btn-sm btn-outline-doctor invoice-btn"
                                onclick="downloadInvoice('INV-2025-145')">
                                <i class="bi bi-download"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Card 5 -->
                <div class="payment-card" data-status="failed">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Invoice #</div>
                            <div class="fw-semibold">INV-2025-132</div>
                            <div class="text-muted small">Dec 5, 2025</div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-muted small mb-1">Doctor</div>
                            <div class="fw-semibold">Dr. James Wong</div>
                            <div class="text-muted small">Orthopedics</div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Payment Method</div>
                            <div class="payment-method-badge">
                                <i class="bi bi-credit-card"></i> Credit Card
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Amount</div>
                            <div class="fw-bold text-doctor">₱1,050</div>
                        </div>
                        <div class="col-md-2">
                            <span class="status-badge status-failed">
                                <i class="bi bi-x-circle"></i> Failed
                            </span>
                        </div>
                        <div class="col-md-1 text-end">
                            <button class="btn btn-sm btn-doctor invoice-btn" onclick="retryPayment('INV-2025-132')">
                                Retry
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Card 6 -->
                <div class="payment-card" data-status="paid">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Invoice #</div>
                            <div class="fw-semibold">INV-2025-120</div>
                            <div class="text-muted small">Nov 22, 2025</div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-muted small mb-1">Doctor</div>
                            <div class="fw-semibold">Dr. Patricia Gomez</div>
                            <div class="text-muted small">Dentistry</div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Payment Method</div>
                            <div class="payment-method-badge">
                                <i class="bi bi-cash-coin"></i> Cash
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-muted small mb-1">Amount</div>
                            <div class="fw-bold text-doctor">₱750</div>
                        </div>
                        <div class="col-md-2">
                            <span class="status-badge status-paid">
                                <i class="bi bi-check-circle"></i> Paid
                            </span>
                        </div>
                        <div class="col-md-1 text-end">
                            <button class="btn btn-sm btn-outline-doctor invoice-btn"
                                onclick="downloadInvoice('INV-2025-120')">
                                <i class="bi bi-download"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty State (hidden by default) -->
            <div class="empty-state" id="emptyState" style="display: none;">
                <i class="bi bi-receipt"></i>
                <h5 class="fw-semibold">No payments found</h5>
                <p>Try adjusting your filters or search query</p>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <div class="text-muted small">
                    Showing 1-6 of 8 transactions
                </div>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
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
    // Filter payments by status
    function filterPayments(status) {
        const tabs = document.querySelectorAll('.filter-tab');
        tabs.forEach(tab => tab.classList.remove('active'));
        event.target.classList.add('active');

        const payments = document.querySelectorAll('.payment-card');
        let visibleCount = 0;

        payments.forEach(payment => {
            if (status === 'all' || payment.dataset.status === status) {
                payment.style.display = 'block';
                visibleCount++;
            } else {
                payment.style.display = 'none';
            }
        });

        // Show empty state if no results
        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
        document.getElementById('paymentList').style.display = visibleCount === 0 ? 'none' : 'block';
    }

    // Search payments
    function searchPayments() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const payments = document.querySelectorAll('.payment-card');
        let visibleCount = 0;

        payments.forEach(payment => {
            const text = payment.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                payment.style.display = 'block';
                visibleCount++;
            } else {
                payment.style.display = 'none';
            }
        });

        // Show empty state if no results
        document.getElementById('emptyState').style.display = visibleCount === 0 ? 'block' : 'none';
        document.getElementById('paymentList').style.display = visibleCount === 0 ? 'none' : 'block';
    }

    // Download invoice
    function downloadInvoice(invoiceNumber) {
        alert(`Downloading invoice ${invoiceNumber}...`);
        // In production, this would trigger actual PDF download
    }

    // Pay now for pending payments
    function payNow(invoiceNumber) {
        if (confirm(`Proceed to payment for ${invoiceNumber}?`)) {
            alert('Redirecting to payment gateway...');
            // In production, redirect to payment page
        }
    }

    // Retry failed payment
    function retryPayment(invoiceNumber) {
        if (confirm(`Retry payment for ${invoiceNumber}?`)) {
            alert('Redirecting to payment gateway...');
            // In production, redirect to payment page
        }
    }
    </script>
</body>

</html>
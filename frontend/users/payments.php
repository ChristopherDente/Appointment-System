<?php
session_start();

if (empty($_SESSION['is_login'])) {
    header("Location: ../../index.php");
    exit;
}

// At the top of your home.php file (after session_start)
require_once '../../backend/config/conn.php'; // Adjust path as needed

// Get current user ID from session
$user_id = $_SESSION['PK_tbluser'] ?? null;
$patient_id = null;

if ($user_id) {
    // Get patient ID from tblpatient
    $patient_query = "SELECT PK_tblpatient FROM tblpatient WHERE FK_tbluser = ?";
    $stmt = $conn->prepare($patient_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $patient_id = $row['PK_tblpatient'];
    }
    $stmt->close();
}

// Initialize stats
$upcoming_count = 0;
$completed_count = 0;
$pending_payments = 0;

if ($patient_id) {
    // Get upcoming appointments count
    $upcoming_query = "SELECT COUNT(*) as count 
                      FROM tblappointments 
                      WHERE FK_tblpatient = ? 
                      AND appointment_date >= CURDATE() 
                      AND status IN ('Confirmed', 'Approved')
                      AND is_active = 1";
    $stmt = $conn->prepare($upcoming_query);
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $upcoming_count = $row['count'];
    }
    $stmt->close();

    // Get completed appointments count
    $completed_query = "SELECT COUNT(*) as count 
                       FROM tblappointments 
                       WHERE FK_tblpatient = ? 
                       AND status = 'Done'
                       AND is_active = 1";
    $stmt = $conn->prepare($completed_query);
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $completed_count = $row['count'];
    }
    $stmt->close();

    // Get pending payments (if you have a payments table)
    // Assuming you have tblpayments with amount and status fields
    $payment_query = "SELECT COALESCE(SUM(amount), 0) as total 
                     FROM tblpayments 
                     WHERE FK_tblpatient = ? 
                     AND status = 'Pending'
                     AND is_active = 1";
    $stmt = $conn->prepare($payment_query);
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $pending_payments = $row['total'];
    }
    $stmt->close();
}


// Get month from URL parameter or use current month
$display_month = isset($_GET['month']) ? $_GET['month'] : date('Y-m');

// Validate the month format (YYYY-MM)
if (!preg_match('/^\d{4}-\d{2}$/', $display_month)) {
    $display_month = date('Y-m');
}


// Calculate calendar range based on the display month
$calendar_start = date('Y-m-01', strtotime($display_month)); // First day of selected month
$calendar_end = date('Y-m-t', strtotime($display_month)); // Last day of selected month


$calendar_query = "SELECT 
    a.PK_tblappointments,
    a.appointment_date,
    a.appointment_time,
    a.status,
    CONCAT(u.fname, ' ', u.lname) AS doctor_name,
    doc.specialization,
    s.servicename
FROM tblappointments a
LEFT JOIN tbldoctors doc ON a.FK_tbldoctors = doc.PK_tbldoctors
LEFT JOIN tbluser u ON doc.FK_tbluser = u.PK_tbluser
LEFT JOIN tblservices s ON a.FK_tblservices = s.PK_tblservices
WHERE a.FK_tblpatient = ?
  AND a.appointment_date BETWEEN ? AND ?
  AND a.is_active = 1
ORDER BY a.appointment_date, a.appointment_time";


$appointments = [];
if ($patient_id) {
    $stmt = $conn->prepare($calendar_query);
    $stmt->bind_param(
        "iss",
        $patient_id,
        $calendar_start,
        $calendar_end
    );
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $date = $row['appointment_date'];
        $appointments[$date][] = $row;
    }

    $stmt->close();
}


// Get current month info

$current_year = date('Y', strtotime($display_month));
$current_month = date('m', strtotime($display_month));
$month_name = date('F Y', strtotime($display_month));
$first_day = date('w', strtotime($calendar_start)); // Day of week (0=Sunday)
$days_in_month = date('t', strtotime($display_month));

// Calculate previous and next month
$prev_month = date('Y-m', strtotime($display_month . ' -1 month'));
$next_month = date('Y-m', strtotime($display_month . ' +1 month'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body>
    <!-- navbar -->
    <?php include '../context/navbar.php'; ?>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <div class="d-flex align-items-center">
                <a href="home.php" class="text-white text-decoration-none me-3">
                    <i class="bi bi-arrow-left fs-4"></i>
                </a>
                <div>
                    <h2 class="fw-bold mb-1">Billing & Payments</h2>
                    <p class="mb-0 opacity-90">View your payment history and manage billing</p>
                </div>
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
    <?php include '../context/footer.php'; ?>

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
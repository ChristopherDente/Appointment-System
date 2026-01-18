<?php
session_start();

if (empty($_SESSION['is_login'])) {
    header("Location: ../../index.php");
    exit;
}

require_once '../../backend/config/conn.php';

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

// Initialize statistics
$total_spent = 0;
$paid_count = 0;
$pending_amount = 0;

// Fetch payments from database
$payments = [];
if ($patient_id) {
    $payment_query = "SELECT 
                p.PK_tblpayments,
                p.invoice_number,
                p.amount,
                p.payment_method,
                p.status,
                p.payment_date,
                p.created_at,
                a.appointment_date,
                u.fname AS doc_firstName,
                u.lname AS doc_lastName,
                dept.departmentName,
                s.servicename
                FROM tblpayments p
                LEFT JOIN tblappointments a ON a.FK_tblpatient = p.FK_tblpatient
                LEFT JOIN tbldoctors d ON a.FK_tbldoctors = d.PK_tbldoctors
                LEFT JOIN tbluser u ON d.FK_tbluser = u.PK_tbluser
                LEFT JOIN tbldepartment dept ON a.FK_department = dept.PK_tblDepartment
                LEFT JOIN tblservices s ON a.FK_tblservices = s.PK_tblservices
                WHERE p.FK_tblpatient = ?
                AND p.is_active = 1
                ORDER BY p.created_at DESC;
                ";
    
    $stmt = $conn->prepare($payment_query);
    $stmt->bind_param("i", $patient_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $payments[] = $row;
        
        // Calculate statistics
        if ($row['status'] == 'Paid' || $row['status'] == 'Completed') {
            $total_spent += $row['amount'];
            $paid_count++;
        } elseif ($row['status'] == 'Pending') {
            $pending_amount += $row['amount'];
        }
    }
    $stmt->close();
}

// Helper functions
function formatCurrency($amount) {
    return '₱' . number_format($amount, 2);
}

function formatDate($date) {
    return date('M j, Y', strtotime($date));
}

function getStatusBadgeClass($status) {
    switch (strtolower($status)) {
        case 'paid':
        case 'completed':
            return 'status-paid';
        case 'pending':
            return 'status-pending';
        case 'failed':
        case 'cancelled':
            return 'status-failed';
        default:
            return 'status-pending';
    }
}

function getStatusText($status) {
    switch (strtolower($status)) {
        case 'paid':
        case 'completed':
            return 'Paid';
        case 'pending':
            return 'Pending';
        case 'failed':
            return 'Failed';
        case 'cancelled':
            return 'Cancelled';
        default:
            return ucfirst($status);
    }
}

function getStatusIcon($status) {
    switch (strtolower($status)) {
        case 'paid':
        case 'completed':
            return 'bi-check-circle';
        case 'pending':
            return 'bi-clock';
        case 'failed':
        case 'cancelled':
            return 'bi-x-circle';
        default:
            return 'bi-clock';
    }
}

function getPaymentMethodIcon($method) {
    switch (strtolower($method)) {
        case 'credit card':
        case 'debit card':
        case 'card':
            return 'bi-credit-card';
        case 'cash':
        case 'cash on arrival':
            return 'bi-cash-coin';
        case 'gcash':
            return 'bi-phone';
        case 'paymaya':
            return 'bi-wallet2';
        case 'bank transfer':
            return 'bi-bank';
        default:
            return 'bi-credit-card';
    }
}

function getPaymentMethodDisplay($method) {
    if (empty($method)) {
        return 'Not Specified';
    }
    return ucwords($method);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Billing & Payments - Online Appointment System</title>
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
                    <h3><?php echo formatCurrency($total_spent); ?></h3>
                    <p><i class="bi bi-wallet2"></i> Total Spent</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <h3><?php echo $paid_count; ?></h3>
                    <p><i class="bi bi-check-circle"></i> Paid Transactions</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <h3><?php echo formatCurrency($pending_amount); ?></h3>
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

            <?php if (empty($payments)): ?>
                <!-- Empty State - No Payments -->
                <div class="empty-state">
                    <i class="bi bi-receipt"></i>
                    <h5 class="fw-semibold">No payment history</h5>
                    <p>Your payment transactions will appear here</p>
                </div>
            <?php else: ?>
                <div id="paymentList">
                    <?php foreach ($payments as $payment): 
                        $status_lower = strtolower($payment['status']);
                        $is_paid = ($status_lower == 'paid' || $status_lower == 'completed');
                        $is_pending = ($status_lower == 'pending');
                        $is_failed = ($status_lower == 'failed' || $status_lower == 'cancelled');
                    ?>
                        <!-- Payment Card -->
                        <div class="payment-card" data-status="<?php echo $status_lower; ?>">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <div class="text-muted small mb-1">Invoice #</div>
                                    <div class="fw-semibold"><?php echo htmlspecialchars($payment['invoice_number'] ?? 'N/A'); ?></div>
                                    <div class="text-muted small">
                                        <?php echo formatDate($payment['payment_date'] ?? $payment['created_at']); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-muted small mb-1">Doctor</div>
                                    <div class="fw-semibold">
                                        Dr. <?php echo htmlspecialchars($payment['doc_firstName'] . ' ' . $payment['doc_lastName']); ?>
                                    </div>
                                    <div class="text-muted small">
                                        <?php echo htmlspecialchars($payment['departmentName'] ?? 'General'); ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-muted small mb-1">Payment Method</div>
                                    <div class="payment-method-badge">
                                        <i class="bi <?php echo getPaymentMethodIcon($payment['payment_method']); ?>"></i>
                                        <?php echo getPaymentMethodDisplay($payment['payment_method']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-muted small mb-1">Amount</div>
                                    <div class="fw-bold text-doctor">
                                        <?php echo formatCurrency($payment['amount']); ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <span class="status-badge <?php echo getStatusBadgeClass($payment['status']); ?>">
                                        <i class="bi <?php echo getStatusIcon($payment['status']); ?>"></i>
                                        <?php echo getStatusText($payment['status']); ?>
                                    </span>
                                </div>
                                <div class="col-md-1 text-end">
                                    <?php if ($is_paid): ?>
                                        <button class="btn btn-sm btn-outline-doctor invoice-btn"
                                            onclick="downloadInvoice('<?php echo htmlspecialchars($payment['invoice_number']); ?>', <?php echo $payment['PK_tblpayments']; ?>)">
                                            <i class="bi bi-download"></i>
                                        </button>
                                    <?php elseif ($is_pending): ?>
                                        <button class="btn btn-sm btn-doctor invoice-btn"
                                            onclick="payNow('<?php echo htmlspecialchars($payment['invoice_number']); ?>', <?php echo $payment['PK_tblpayments']; ?>)">
                                            Pay
                                        </button>
                                    <?php elseif ($is_failed): ?>
                                        <button class="btn btn-sm btn-doctor invoice-btn"
                                            onclick="retryPayment('<?php echo htmlspecialchars($payment['invoice_number']); ?>', <?php echo $payment['PK_tblpayments']; ?>)">
                                            Retry
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Empty State (hidden by default, shown when filtered) -->
                <div class="empty-state" id="emptyState" style="display: none;">
                    <i class="bi bi-receipt"></i>
                    <h5 class="fw-semibold">No payments found</h5>
                    <p>Try adjusting your filters or search query</p>
                </div>

                <!-- Pagination (Optional - can be implemented with LIMIT/OFFSET) -->
                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <div class="text-muted small">
                        Showing <?php echo count($payments); ?> transaction<?php echo count($payments) != 1 ? 's' : ''; ?>
                    </div>
                </div>
            <?php endif; ?>
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
            const paymentStatus = payment.dataset.status;
            
            // Handle 'paid' filter to include both 'paid' and 'completed'
            if (status === 'all' || 
                paymentStatus === status || 
                (status === 'paid' && (paymentStatus === 'paid' || paymentStatus === 'completed')) ||
                (status === 'failed' && (paymentStatus === 'failed' || paymentStatus === 'cancelled'))) {
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
    function downloadInvoice(invoiceNumber, paymentId) {
        // Redirect to invoice download/view page
        window.location.href = `download_invoice.php?id=${paymentId}`;
    }

    // Pay now for pending payments
    function payNow(invoiceNumber, paymentId) {
        if (confirm(`Proceed to payment for ${invoiceNumber}?`)) {
            // Redirect to payment processing page
            window.location.href = `process_payment.php?id=${paymentId}`;
        }
    }

    // Retry failed payment
    function retryPayment(invoiceNumber, paymentId) {
        if (confirm(`Retry payment for ${invoiceNumber}?`)) {
            // Redirect to payment processing page
            window.location.href = `process_payment.php?id=${paymentId}&retry=1`;
        }
    }
    </script>
</body>

</html>
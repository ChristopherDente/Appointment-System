<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reports - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
    :root {
        --doctor-primary: #0d6efd;
        --doctor-light: #e7f1ff;
        --doctor-dark: #0a58ca;
    }

    .report-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
        transition: all 0.3s;
    }

    .report-card:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    }

    .stat-box {
        background: linear-gradient(135deg, var(--doctor-light) 0%, white 100%);
        border-left: 4px solid var(--doctor-primary);
        padding: 1.5rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }

    .stat-box h3 {
        color: var(--doctor-primary);
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .chart-container {
        position: relative;
        height: 300px;
        margin: 1rem 0;
    }

    .filter-section {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
    }



    .table-report {
        background: white;
        border-radius: 12px;
        overflow: hidden;
    }

    .table-report thead {
        background: linear-gradient(135deg, var(--doctor-primary) 0%, var(--doctor-dark) 100%);
        color: white;
    }

    .badge-revenue {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
    }

    .doctor-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 1rem;
        border-left: 4px solid var(--doctor-primary);
    }

    .progress-label {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .export-btn {
        border-radius: 8px;
    }



    .summary-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
    }

    .summary-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .summary-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto 1rem;
    }

    .icon-blue {
        background: #e7f1ff;
        color: #0d6efd;
    }

    .icon-green {
        background: #d1f2eb;
        color: #28a745;
    }

    .icon-orange {
        background: #fff3cd;
        color: #fd7e14;
    }

    .icon-purple {
        background: #e9d5ff;
        color: #6f42c1;
    }

    .date-range-display {
        background: var(--doctor-light);
        padding: 0.75rem 1rem;
        border-radius: 8px;
        display: inline-block;
        margin-bottom: 1rem;
    }

    canvas {
        max-height: 300px;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-semibold" href="dashboard.php">
                <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
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
                        <a class="nav-link active" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inventory.php">Inventory</a>
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
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h2 class="fw-bold mb-2">Reports & Analytics</h2>
            <p class="mb-0 opacity-90">Comprehensive insights and performance metrics</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Report Tabs -->
        <div class="mb-4">
            <ul class="nav nav-pills nav-fill" id="reportTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="daily-tab" data-bs-toggle="pill" data-bs-target="#daily"
                        type="button">
                        <i class="bi bi-calendar-day"></i> Daily Report
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="monthly-tab" data-bs-toggle="pill" data-bs-target="#monthly"
                        type="button">
                        <i class="bi bi-calendar-month"></i> Monthly/Yearly
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="revenue-tab" data-bs-toggle="pill" data-bs-target="#revenue"
                        type="button">
                        <i class="bi bi-currency-dollar"></i> Revenue
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="doctor-tab" data-bs-toggle="pill" data-bs-target="#doctor"
                        type="button">
                        <i class="bi bi-person-badge"></i> Doctor Performance
                    </button>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="reportTabsContent">

            <!-- Daily Report Tab -->
            <div class="tab-pane fade show active" id="daily" role="tabpanel">
                <!-- Date Filter -->
                <div class="filter-section">
                    <div class="row align-items-end g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Select Date</label>
                            <input type="date" class="form-control" id="dailyDate" value="2026-01-12">
                        </div>
                        <div class="col-md-4">
                            <!--  -->
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary w-100" onclick="generateDailyReport()">
                                <i class="bi bi-search"></i> Generate Report
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Summary Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="summary-card">
                            <div class="summary-icon icon-blue">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <h3 class="fw-bold mb-1">24</h3>
                            <p class="text-muted mb-0 small">Total Appointments</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="summary-card">
                            <div class="summary-icon icon-green">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <h3 class="fw-bold mb-1">18</h3>
                            <p class="text-muted mb-0 small">Completed</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="summary-card">
                            <div class="summary-icon icon-orange">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <h3 class="fw-bold mb-1">4</h3>
                            <p class="text-muted mb-0 small">Pending</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="summary-card">
                            <div class="summary-icon icon-purple">
                                <i class="bi bi-x-circle"></i>
                            </div>
                            <h3 class="fw-bold mb-1">2</h3>
                            <p class="text-muted mb-0 small">Cancelled</p>
                        </div>
                    </div>
                </div>

                <!-- Chart and Table -->
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="report-card">
                            <h5 class="fw-bold mb-3"><i class="bi bi-pie-chart"></i> Appointments by Status</h5>
                            <canvas id="dailyStatusChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="report-card">
                            <h5 class="fw-bold mb-3"><i class="bi bi-bar-chart"></i> Appointments by Department</h5>
                            <canvas id="dailyDeptChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Detailed Table -->
                <div class="report-card mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0"><i class="bi bi-table"></i> Daily Appointments Details</h5>
                        <button class="btn btn-success export-btn" onclick="exportToExcel('daily')">
                            <i class="bi bi-file-earmark-excel"></i> Export to Excel
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dailyTable">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Patient Name</th>
                                    <th>Doctor</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th>Fee</th>
                                </tr>
                            </thead>
                            <tbody id="dailyTableBody">
                                <!-- Data will be populated by JavaScript -->
                            </tbody>
                            <tfoot>
                                <tr class="fw-bold">
                                    <td colspan="5" class="text-end">Total Revenue:</td>
                                    <td>₱12,450</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Monthly/Yearly Report Tab -->
            <div class="tab-pane fade" id="monthly" role="tabpanel">
                <!-- Date Filter -->
                <div class="filter-section">
                    <div class="row align-items-end g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Report Type</label>
                            <select class="form-select" id="reportType" onchange="togglePeriodInputs()">
                                <option value="monthly">Monthly Report</option>
                                <option value="yearly">Yearly Report</option>
                            </select>
                        </div>
                        <div class="col-md-3" id="monthInput">
                            <label class="form-label fw-semibold">Month</label>
                            <input type="month" class="form-control" id="monthSelect" value="2026-01">
                        </div>
                        <div class="col-md-3" id="yearInput" style="display: none;">
                            <label class="form-label fw-semibold">Year</label>
                            <input type="number" class="form-control" id="yearSelect" value="2026" min="2020"
                                max="2030">
                        </div>
                        <div class="col-md-3">
                            <!--  -->
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary w-100" onclick="generateMonthlyReport()">
                                <i class="bi bi-search"></i> Generate Report
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Summary Stats -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="stat-box">
                            <h3>524</h3>
                            <p class="text-muted mb-0">Total Appointments</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-box">
                            <h3>₱268,450</h3>
                            <p class="text-muted mb-0">Total Revenue</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-box">
                            <h3>89%</h3>
                            <p class="text-muted mb-0">Completion Rate</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-box">
                            <h3>342</h3>
                            <p class="text-muted mb-0">Unique Patients</p>
                        </div>
                    </div>
                </div>

                <!-- Trend Chart -->
                <div class="report-card mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0"><i class="bi bi-graph-up"></i> Appointment Trends</h5>
                        <div class="date-range-display">
                            <i class="bi bi-calendar-range"></i> January 2026
                        </div>
                    </div>
                    <canvas id="monthlyTrendChart"></canvas>
                </div>

                <!-- Department Breakdown -->
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="report-card">
                            <h5 class="fw-bold mb-3"><i class="bi bi-building"></i> Department Performance</h5>
                            <canvas id="deptPerformanceChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="report-card">
                            <h5 class="fw-bold mb-3"><i class="bi bi-calendar-week"></i> Weekly Distribution</h5>
                            <canvas id="weeklyDistChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Export Button -->
                <div class="text-center mt-4">
                    <button class="btn btn-success btn-lg export-btn" onclick="exportToExcel('monthly')">
                        <i class="bi bi-file-earmark-excel"></i> Export Monthly Report
                    </button>
                </div>
            </div>

            <!-- Revenue Report Tab -->
            <div class="tab-pane fade" id="revenue" role="tabpanel">
                <!-- Date Filter -->
                <div class="filter-section">
                    <div class="row align-items-end g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">From Date</label>
                            <input type="date" class="form-control" id="revenueFromDate" value="2026-01-01">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">To Date</label>
                            <input type="date" class="form-control" id="revenueToDate" value="2026-01-12">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Payment Status</label>
                            <select class="form-select" id="paymentStatus">
                                <option value="">All Status</option>
                                <option value="paid">Paid</option>
                                <option value="pending">Pending</option>
                                <option value="partial">Partial</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary w-100" onclick="generateRevenueReport()">
                                <i class="bi bi-search"></i> Generate Report
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Revenue Summary -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="summary-card border-start border-5 border-success">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="text-start">
                                    <p class="text-muted mb-1 small">Total Revenue</p>
                                    <h3 class="fw-bold text-success mb-0">₱268,450</h3>
                                </div>
                                <i class="bi bi-cash-stack text-success" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="summary-card border-start border-5 border-primary">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="text-start">
                                    <p class="text-muted mb-1 small">Collected</p>
                                    <h3 class="fw-bold text-primary mb-0">₱245,200</h3>
                                </div>
                                <i class="bi bi-check-circle text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="summary-card border-start border-5 border-warning">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="text-start">
                                    <p class="text-muted mb-1 small">Pending</p>
                                    <h3 class="fw-bold text-warning mb-0">₱23,250</h3>
                                </div>
                                <i class="bi bi-clock-history text-warning" style="font-size: 2.5rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue Charts -->
                <div class="row g-4 mb-4">
                    <div class="col-lg-8">
                        <div class="report-card">
                            <h5 class="fw-bold mb-3"><i class="bi bi-graph-up-arrow"></i> Revenue Trend</h5>
                            <canvas id="revenueTrendChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="report-card">
                            <h5 class="fw-bold mb-3"><i class="bi bi-pie-chart"></i> Payment Methods</h5>
                            <canvas id="paymentMethodChart"></canvas>
                            <div class="mt-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="bi bi-cash text-success"></i> Cash</span>
                                    <strong>₱98,180</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="bi bi-credit-card text-primary"></i> Card</span>
                                    <strong>₱122,070</strong>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="bi bi-bank text-info"></i> Online</span>
                                    <strong>₱48,200</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue by Department -->
                <div class="report-card mb-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-building"></i> Revenue by Department</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Department</th>
                                    <th>Appointments</th>
                                    <th>Revenue</th>
                                    <th>Average Fee</th>
                                    <th>Growth</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="bi bi-heart-pulse text-danger"></i> Cardiology</td>
                                    <td>145</td>
                                    <td><strong>₱87,000</strong></td>
                                    <td>₱600</td>
                                    <td><span class="badge bg-success">+12%</span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-people text-primary"></i> Pediatrics</td>
                                    <td>128</td>
                                    <td><strong>₱51,200</strong></td>
                                    <td>₱400</td>
                                    <td><span class="badge bg-success">+8%</span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-bandaid text-warning"></i> Orthopedics</td>
                                    <td>98</td>
                                    <td><strong>₱63,700</strong></td>
                                    <td>₱650</td>
                                    <td><span class="badge bg-success">+15%</span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-droplet text-info"></i> Dermatology</td>
                                    <td>87</td>
                                    <td><strong>₱43,500</strong></td>
                                    <td>₱500</td>
                                    <td><span class="badge bg-danger">-3%</span></td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-brain text-purple"></i> Neurology</td>
                                    <td>66</td>
                                    <td><strong>₱46,200</strong></td>
                                    <td>₱700</td>
                                    <td><span class="badge bg-success">+10%</span></td>
                                </tr>
                            </tbody>
                            <tfoot class="table-light fw-bold">
                                <tr>
                                    <td>Total</td>
                                    <td>524</td>
                                    <td>₱291,600</td>
                                    <td>₱557</td>
                                    <td>-</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <!-- Export Button -->
                <div class="text-center">
                    <button class="btn btn-success btn-lg export-btn" onclick="exportToExcel('revenue')">
                        <i class="bi bi-file-earmark-excel"></i> Export Revenue Report
                    </button>
                </div>
            </div>

            <!-- Doctor Performance Tab -->
            <div class="tab-pane fade" id="doctor" role="tabpanel">
                <!-- Date Filter -->
                <div class="filter-section">
                    <div class="row align-items-end g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Period</label>
                            <select class="form-select" id="doctorPeriod">
                                <option value="this-month">This Month</option>
                                <option value="last-month">Last Month</option>
                                <option value="this-year">This Year</option>
                                <option value="custom">Custom Range</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Sort By</label>
                            <select class="form-select" id="doctorSort">
                                <option value="appointments">Most Appointments</option>
                                <option value="revenue">Highest Revenue</option>
                                <option value="rating">Highest Rating</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary w-100" onclick="generateDoctorReport()">
                                <i class="bi bi-search"></i> Generate Report
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Top Performers -->
                <div class="report-card mb-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-trophy"></i> Top Performing Doctors</h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-light rounded">
                                <i class="bi bi-award-fill text-warning" style="font-size: 2rem;"></i>
                                <h6 class="fw-bold mt-2 mb-1">Dr. Sarah Smith</h6>
                                <p class="text-muted small mb-1">Cardiology</p>
                                <h4 class="fw-bold text-primary">145</h4>
                                <p class="text-muted small mb-0">Appointments</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-light rounded">
                                <i class="bi bi-award-fill text-secondary" style="font-size: 2rem;"></i>
                                <h6 class="fw-bold mt-2 mb-1">Dr. Michael Johnson</h6>
                                <p class="text-muted small mb-1">Pediatrics</p>
                                <h4 class="fw-bold text-primary">128</h4>
                                <p class="text-muted small mb-0">Appointments</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-light rounded">
                                <i class="bi bi-award-fill text-danger" style="font-size: 2rem;"></i>
                                <h6 class="fw-bold mt-2 mb-1">Dr. Emily Brown</h6>
                                <p class="text-muted small mb-1">Orthopedics</p>
                                <h4 class="fw-bold text-primary">98</h4>
                                <p class="text-muted small mb-0">Appointments</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Doctor Performance Details -->
                <div class="report-card mb-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-person-badge"></i> Individual Performance</h5>

                    <div class="doctor-card">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-1">Dr. Sarah Smith</h6>
                                <p class="text-muted small mb-0">Cardiology | 8 years experience</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <span class="badge bg-success badge-revenue me-2">Active</span>
                                <span class="badge bg-primary badge-revenue">⭐ 4.8/5.0</span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-3">
                                <small class="text-muted">Appointments</small>
                                <h5 class="fw-bold mb-0">145</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Revenue Generated</small>
                                <h5 class="fw-bold mb-0">₱87,000</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Completion Rate</small>
                                <h5 class="fw-bold mb-0">94%</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Avg. Fee</small>
                                <h5 class="fw-bold mb-0">₱600</h5>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span class="text-muted small">Performance Score</span>
                            <strong>94%</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 94%"></div>
                        </div>
                    </div>

                    <div class="doctor-card">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-1">Dr. Michael Johnson</h6>
                                <p class="text-muted small mb-0">Pediatrics | 6 years experience</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <span class="badge bg-success badge-revenue me-2">Active</span>
                                <span class="badge bg-primary badge-revenue">⭐ 4.9/5.0</span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-3">
                                <small class="text-muted">Appointments</small>
                                <h5 class="fw-bold mb-0">128</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Revenue Generated</small>
                                <h5 class="fw-bold mb-0">₱51,200</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Completion Rate</small>
                                <h5 class="fw-bold mb-0">96%</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Avg. Fee</small>
                                <h5 class="fw-bold mb-0">₱400</h5>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span class="text-muted small">Performance Score</span>
                            <strong>96%</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 96%"></div>
                        </div>
                    </div>

                    <div class="doctor-card">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-1">Dr. Emily Brown</h6>
                                <p class="text-muted small mb-0">Orthopedics | 10 years experience</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <span class="badge bg-success badge-revenue me-2">Active</span>
                                <span class="badge bg-primary badge-revenue">⭐ 4.7/5.0</span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-3">
                                <small class="text-muted">Appointments</small>
                                <h5 class="fw-bold mb-0">98</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Revenue Generated</small>
                                <h5 class="fw-bold mb-0">₱63,700</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Completion Rate</small>
                                <h5 class="fw-bold mb-0">92%</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Avg. Fee</small>
                                <h5 class="fw-bold mb-0">₱650</h5>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span class="text-muted small">Performance Score</span>
                            <strong>92%</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 92%"></div>
                        </div>
                    </div>

                    <div class="doctor-card">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-1">Dr. David Martinez</h6>
                                <p class="text-muted small mb-0">Dermatology | 5 years experience</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <span class="badge bg-success badge-revenue me-2">Active</span>
                                <span class="badge bg-primary badge-revenue">⭐ 4.6/5.0</span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-3">
                                <small class="text-muted">Appointments</small>
                                <h5 class="fw-bold mb-0">87</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Revenue Generated</small>
                                <h5 class="fw-bold mb-0">₱43,500</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Completion Rate</small>
                                <h5 class="fw-bold mb-0">88%</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Avg. Fee</small>
                                <h5 class="fw-bold mb-0">₱500</h5>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span class="text-muted small">Performance Score</span>
                            <strong>88%</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: 88%"></div>
                        </div>
                    </div>

                    <div class="doctor-card">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-1">Dr. Lisa Taylor</h6>
                                <p class="text-muted small mb-0">Neurology | 12 years experience</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <span class="badge bg-success badge-revenue me-2">Active</span>
                                <span class="badge bg-primary badge-revenue">⭐ 4.9/5.0</span>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-3">
                                <small class="text-muted">Appointments</small>
                                <h5 class="fw-bold mb-0">66</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Revenue Generated</small>
                                <h5 class="fw-bold mb-0">₱46,200</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Completion Rate</small>
                                <h5 class="fw-bold mb-0">95%</h5>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Avg. Fee</small>
                                <h5 class="fw-bold mb-0">₱700</h5>
                            </div>
                        </div>
                        <div class="progress-label">
                            <span class="text-muted small">Performance Score</span>
                            <strong>95%</strong>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 95%"></div>
                        </div>
                    </div>
                </div>

                <!-- Comparison Chart -->
                <div class="report-card mb-4">
                    <h5 class="fw-bold mb-3"><i class="bi bi-bar-chart-line"></i> Doctor Comparison</h5>
                    <canvas id="doctorComparisonChart"></canvas>
                </div>

                <!-- Export Button -->
                <div class="text-center">
                    <button class="btn btn-success btn-lg export-btn" onclick="exportToExcel('doctor')">
                        <i class="bi bi-file-earmark-excel"></i> Export Doctor Performance Report
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-doctor mt-5">
        <div class="container py-4">
            <div class="text-center small text-light opacity-75">
                © 2026 Online Appointment Booking System. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    // Sample data for daily appointments
    const dailyAppointments = [{
            time: '09:00 AM',
            patient: 'John Doe',
            doctor: 'Dr. Smith',
            department: 'Cardiology',
            status: 'Completed',
            fee: 600
        },
        {
            time: '09:30 AM',
            patient: 'Jane Smith',
            doctor: 'Dr. Johnson',
            department: 'Pediatrics',
            status: 'Completed',
            fee: 400
        },
        {
            time: '10:00 AM',
            patient: 'Mike Wilson',
            doctor: 'Dr. Brown',
            department: 'Orthopedics',
            status: 'Completed',
            fee: 650
        },
        {
            time: '10:30 AM',
            patient: 'Sarah Davis',
            doctor: 'Dr. Martinez',
            department: 'Dermatology',
            status: 'Completed',
            fee: 500
        },
        {
            time: '11:00 AM',
            patient: 'Robert Lee',
            doctor: 'Dr. Taylor',
            department: 'Neurology',
            status: 'Completed',
            fee: 700
        },
        {
            time: '11:30 AM',
            patient: 'Emily Brown',
            doctor: 'Dr. Smith',
            department: 'Cardiology',
            status: 'Completed',
            fee: 600
        },
        {
            time: '02:00 PM',
            patient: 'David Anderson',
            doctor: 'Dr. Johnson',
            department: 'Pediatrics',
            status: 'Completed',
            fee: 400
        },
        {
            time: '02:30 PM',
            patient: 'Lisa Martinez',
            doctor: 'Dr. Brown',
            department: 'Orthopedics',
            status: 'Completed',
            fee: 650
        },
        {
            time: '03:00 PM',
            patient: 'James Taylor',
            doctor: 'Dr. Martinez',
            department: 'Dermatology',
            status: 'Pending',
            fee: 500
        },
        {
            time: '03:30 PM',
            patient: 'Maria Garcia',
            doctor: 'Dr. Taylor',
            department: 'Neurology',
            status: 'Pending',
            fee: 700
        },
        {
            time: '04:00 PM',
            patient: 'Thomas White',
            doctor: 'Dr. Smith',
            department: 'Cardiology',
            status: 'Pending',
            fee: 600
        },
        {
            time: '04:30 PM',
            patient: 'Jessica Lee',
            doctor: 'Dr. Johnson',
            department: 'Pediatrics',
            status: 'Pending',
            fee: 400
        },
    ];

    // Initialize charts
    let dailyStatusChart, dailyDeptChart, monthlyTrendChart, deptPerformanceChart;
    let weeklyDistChart, revenueTrendChart, paymentMethodChart, doctorComparisonChart;

    function initCharts() {
        // Daily Status Chart
        const statusCtx = document.getElementById('dailyStatusChart');
        if (statusCtx) {
            dailyStatusChart = new Chart(statusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Completed', 'Pending', 'Cancelled'],
                    datasets: [{
                        data: [18, 4, 2],
                        backgroundColor: ['#28a745', '#ffc107', '#dc3545']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        // Daily Department Chart
        const deptCtx = document.getElementById('dailyDeptChart');
        if (deptCtx) {
            dailyDeptChart = new Chart(deptCtx, {
                type: 'bar',
                data: {
                    labels: ['Cardiology', 'Pediatrics', 'Orthopedics', 'Dermatology', 'Neurology'],
                    datasets: [{
                        label: 'Appointments',
                        data: [5, 6, 4, 5, 4],
                        backgroundColor: '#0d6efd'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        }

        // Monthly Trend Chart
        const trendCtx = document.getElementById('monthlyTrendChart');
        if (trendCtx) {
            monthlyTrendChart = new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'Appointments',
                        data: [124, 145, 132, 123],
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13, 110, 253, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Department Performance Chart
        const perfCtx = document.getElementById('deptPerformanceChart');
        if (perfCtx) {
            deptPerformanceChart = new Chart(perfCtx, {
                type: 'pie',
                data: {
                    labels: ['Cardiology', 'Pediatrics', 'Orthopedics', 'Dermatology', 'Neurology'],
                    datasets: [{
                        data: [145, 128, 98, 87, 66],
                        backgroundColor: ['#dc3545', '#0d6efd', '#ffc107', '#20c997', '#6f42c1']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        // Weekly Distribution Chart
        const weeklyCtx = document.getElementById('weeklyDistChart');
        if (weeklyCtx) {
            weeklyDistChart = new Chart(weeklyCtx, {
                type: 'bar',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Appointments',
                        data: [85, 92, 78, 88, 95, 45, 20],
                        backgroundColor: '#28a745'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Revenue Trend Chart
        const revTrendCtx = document.getElementById('revenueTrendChart');
        if (revTrendCtx) {
            revenueTrendChart = new Chart(revTrendCtx, {
                type: 'line',
                data: {
                    labels: ['Jan 1-3', 'Jan 4-6', 'Jan 7-9', 'Jan 10-12'],
                    datasets: [{
                        label: 'Revenue (₱)',
                        data: [62450, 71200, 68900, 66000],
                        borderColor: '#28a745',
                        backgroundColor: 'rgba(40, 167, 69, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '₱' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        }

        // Payment Method Chart
        const paymentCtx = document.getElementById('paymentMethodChart');
        if (paymentCtx) {
            paymentMethodChart = new Chart(paymentCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Cash', 'Card', 'Online'],
                    datasets: [{
                        data: [98180, 122070, 48200],
                        backgroundColor: ['#28a745', '#0d6efd', '#17a2b8']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        // Doctor Comparison Chart
        const doctorCtx = document.getElementById('doctorComparisonChart');
        if (doctorCtx) {
            doctorComparisonChart = new Chart(doctorCtx, {
                type: 'bar',
                data: {
                    labels: ['Dr. Smith', 'Dr. Johnson', 'Dr. Brown', 'Dr. Martinez', 'Dr. Taylor'],
                    datasets: [{
                            label: 'Appointments',
                            data: [145, 128, 98, 87, 66],
                            backgroundColor: '#0d6efd'
                        },
                        {
                            label: 'Revenue (₱100s)',
                            data: [870, 512, 637, 435, 462],
                            backgroundColor: '#28a745'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }

    function generateDailyReport() {
        const tbody = document.getElementById('dailyTableBody');
        tbody.innerHTML = '';

        dailyAppointments.forEach(apt => {
            const statusClass = apt.status === 'Completed' ? 'bg-success' :
                apt.status === 'Pending' ? 'bg-warning' : 'bg-danger';

            const row = `
                    <tr>
                        <td>${apt.time}</td>
                        <td>${apt.patient}</td>
                        <td>${apt.doctor}</td>
                        <td>${apt.department}</td>
                        <td><span class="badge ${statusClass}">${apt.status}</span></td>
                        <td>₱${apt.fee}</td>
                    </tr>
                `;
            tbody.innerHTML += row;
        });
    }

    function generateMonthlyReport() {
        alert('Monthly report generated! (This would fetch data from backend)');
    }

    function generateRevenueReport() {
        alert('Revenue report generated! (This would fetch data from backend)');
    }

    function generateDoctorReport() {
        alert('Doctor performance report generated! (This would fetch data from backend)');
    }

    function togglePeriodInputs() {
        const reportType = document.getElementById('reportType').value;
        const monthInput = document.getElementById('monthInput');
        const yearInput = document.getElementById('yearInput');

        if (reportType === 'monthly') {
            monthInput.style.display = 'block';
            yearInput.style.display = 'none';
        } else {
            monthInput.style.display = 'none';
            yearInput.style.display = 'block';
        }
    }

    function exportToExcel(reportType) {
        alert(`Exporting ${reportType} report to Excel... (This would generate an Excel file)`);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        initCharts();
        generateDailyReport();
    });
    </script>

</body>

</html>
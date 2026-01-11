<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Appointment History - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <script>
    function searchHistory() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const items = document.querySelectorAll('.timeline-item');

        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function filterByStatus(status) {
        const items = document.querySelectorAll('.timeline-item');
        const pills = document.querySelectorAll('.filter-pill');

        pills.forEach(pill => pill.classList.remove('active'));
        event.target.classList.add('active');

        items.forEach(item => {
            if (status === 'all' || item.dataset.status === status) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function filterByYear(year) {
        const items = document.querySelectorAll('.timeline-item');
        const dividers = document.querySelectorAll('.year-divider');

        items.forEach(item => {
            if (year === 'all' || item.dataset.year === year) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        dividers.forEach(divider => {
            const yearText = divider.querySelector('span').textContent;
            if (year === 'all' || yearText === year) {
                divider.style.display = 'flex';
            } else {
                divider.style.display = 'none';
            }
        });
    }

    const appointmentDetails = {
        1: {
            doctor: 'Dr. Juan Cruz',
            specialty: 'Family Medicine',
            date: 'January 8, 2026',
            time: '10:00 AM',
            reason: 'Annual physical examination and lab work review',
            location: 'Room 201, Building A',
            duration: '30 minutes',
            status: 'Completed',
            notes: 'Patient is in good health. Blood pressure normal. Cholesterol levels slightly elevated - recommend dietary changes.',
            prescription: 'Multivitamin (1x daily)',
            nextVisit: 'January 2027'
        },
        2: {
            doctor: 'Dr. Emily Rodriguez',
            specialty: 'Dermatology',
            date: 'January 5, 2026',
            time: '2:30 PM',
            reason: 'Skin condition follow-up and treatment review',
            location: 'Room 315, Building B',
            duration: '25 minutes',
            status: 'Completed',
            notes: 'Skin condition showing improvement. Continue current treatment regimen.',
            prescription: 'Topical cream (2x daily)',
            nextVisit: 'March 2026'
        },
        3: {
            doctor: 'Dr. Patricia Gomez',
            specialty: 'General Dentist',
            date: 'December 20, 2025',
            time: '11:00 AM',
            reason: 'Routine dental cleaning and checkup',
            location: 'Room 401, Dental Wing',
            duration: '45 minutes',
            status: 'Completed',
            notes: 'No cavities detected. Gums healthy. Continue regular flossing.',
            prescription: 'Fluoride toothpaste',
            nextVisit: 'June 2026'
        },
        4: {
            doctor: 'Dr. James Wong',
            specialty: 'Orthopedic Surgeon',
            date: 'December 10, 2025',
            time: '3:00 PM',
            reason: 'Knee pain consultation',
            location: 'N/A',
            duration: 'N/A',
            status: 'Cancelled',
            notes: 'Cancelled by patient on December 9, 2025',
            prescription: 'N/A',
            nextVisit: 'Reschedule if needed'
        },
        5: {
            doctor: 'Dr. Robert Chen',
            specialty: 'Cardiologist',
            date: 'November 15, 2025',
            time: '9:30 AM',
            reason: 'Heart health screening and blood pressure monitoring',
            location: 'Room 305, Building B',
            duration: '40 minutes',
            status: 'Completed',
            notes: 'Blood pressure within normal range. Heart rhythm regular. Continue exercise routine.',
            prescription: 'N/A',
            nextVisit: 'May 2026'
        },
        6: {
            doctor: 'Dr. Sarah Williams',
            specialty: 'Internal Medicine',
            date: 'October 28, 2025',
            time: '1:00 PM',
            reason: 'Follow-up consultation for chronic condition',
            location: 'N/A',
            duration: 'N/A',
            status: 'No Show',
            notes: 'Patient did not show up for appointment',
            prescription: 'N/A',
            nextVisit: 'Please reschedule'
        }
    };

    function viewFullDetails(appointmentId) {
        const details = appointmentDetails[appointmentId] || {
            doctor: 'Dr. Unknown',
            specialty: 'General',
            date: 'N/A',
            time: 'N/A',
            reason: 'Consultation',
            location: 'N/A',
            duration: 'N/A',
            status: 'Completed',
            notes: 'No additional details available.',
            prescription: 'N/A',
            nextVisit: 'N/A'
        };

        const modalHTML = `
                <div class="modal fade" id="detailsModal" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 18px; border: none;">
                            <div class="modal-header" style="background: linear-gradient(135deg, #2f9e8f 0%, #268c7f 100%); color: white; border-radius: 18px 18px 0 0;">
                                <h5 class="modal-title fw-bold">
                                    <i class="bi bi-file-medical"></i> Appointment Details
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-person-fill text-doctor"></i> Doctor</small>
                                            <strong>${details.doctor}</strong>
                                            <p class="mb-0 small text-muted">${details.specialty}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-calendar3 text-doctor"></i> Date & Time</small>
                                            <strong>${details.date}</strong>
                                            <p class="mb-0 small text-muted">${details.time}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-geo-alt-fill text-doctor"></i> Location</small>
                                            <strong>${details.location}</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-clock-fill text-doctor"></i> Duration</small>
                                            <strong>${details.duration}</strong>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-chat-left-text-fill text-doctor"></i> Reason for Visit</small>
                                            <p class="mb-0">${details.reason}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-3" style="background-color: #e6f4f1; border-radius: 12px; border-left: 4px solid #2f9e8f;">
                                            <small class="text-muted d-block mb-2"><i class="bi bi-journal-medical text-doctor"></i> Doctor's Notes</small>
                                            <p class="mb-0">${details.notes}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-capsule text-doctor"></i> Prescription</small>
                                            <strong>${details.prescription}</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3" style="background-color: #f9fafb; border-radius: 12px;">
                                            <small class="text-muted d-block mb-1"><i class="bi bi-arrow-repeat text-doctor"></i> Next Visit</small>
                                            <strong>${details.nextVisit}</strong>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="p-2 text-center" style="background-color: ${details.status === 'Completed' ? '#d1fae5' : details.status === 'Cancelled' ? '#fee2e2' : '#fef3c7'}; border-radius: 12px;">
                                            <strong style="color: ${details.status === 'Completed' ? '#065f46' : details.status === 'Cancelled' ? '#991b1b' : '#92400e'};">
                                                Status: ${details.status}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top: 1px solid #e5e7eb;">
                                <button type="button" class="btn btn-outline-doctor" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle"></i> Close
                                </button>
                                <button type="button" class="btn btn-doctor" onclick="printAppointment(${appointmentId})">
                                    <i class="bi bi-printer"></i> Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

        const existingModal = document.getElementById('detailsModal');
        if (existingModal) {
            existingModal.remove();
        }

        document.body.insertAdjacentHTML('beforeend', modalHTML);
        const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
        modal.show();
    }

    function printAppointment(appointmentId) {
        const details = appointmentDetails[appointmentId];
        const printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write(`
                <html>
                <head>
                    <title>Appointment Details - ${details.doctor}</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 40px; }
                        h1 { color: #2f9e8f; }
                        .info-row { margin: 15px 0; padding: 10px; background: #f9fafb; border-radius: 8px; }
                        .label { font-weight: bold; color: #6b7280; }
                    </style>
                </head>
                <body>
                    <h1>Appointment Details</h1>
                    <div class="info-row"><span class="label">Doctor:</span> ${details.doctor} - ${details.specialty}</div>
                    <div class="info-row"><span class="label">Date & Time:</span> ${details.date} at ${details.time}</div>
                    <div class="info-row"><span class="label">Location:</span> ${details.location}</div>
                    <div class="info-row"><span class="label">Duration:</span> ${details.duration}</div>
                    <div class="info-row"><span class="label">Reason:</span> ${details.reason}</div>
                    <div class="info-row"><span class="label">Notes:</span> ${details.notes}</div>
                    <div class="info-row"><span class="label">Prescription:</span> ${details.prescription}</div>
                    <div class="info-row"><span class="label">Next Visit:</span> ${details.nextVisit}</div>
                    <div class="info-row"><span class="label">Status:</span> ${details.status}</div>
                </body>
                </html>
            `);
        printWindow.document.close();
        printWindow.print();
    }

    function exportHistory() {
        const printWindow = window.open('', '', 'height=800,width=1000');
        const items = document.querySelectorAll('.timeline-item');
        let appointmentsList = '';

        items.forEach((item, index) => {
            if (item.style.display !== 'none') {
                const date = item.querySelector('.timeline-date').textContent.trim();
                const doctor = item.querySelector('.doctor-info-small h6').textContent;
                const specialty = item.querySelector('.doctor-info-small p').textContent;
                const reason = item.querySelector('.mb-2 p').textContent;
                const status = item.querySelector('.status-badge').textContent;

                appointmentsList += `
                            <div style="margin: 20px 0; padding: 15px; border: 1px solid #e5e7eb; border-radius: 8px; page-break-inside: avoid;">
                                <h3 style="color: #2f9e8f; margin: 0 0 10px 0;">Appointment #${index + 1}</h3>
                                <p><strong>Date:</strong> ${date}</p>
                                <p><strong>Doctor:</strong> ${doctor}</p>
                                <p><strong>Specialty:</strong> ${specialty}</p>
                                <p><strong>Reason:</strong> ${reason}</p>
                                <p><strong>Status:</strong> <span style="background: ${status.includes('Completed') ? '#d1fae5' : status.includes('Cancelled') ? '#fee2e2' : '#fef3c7'}; padding: 4px 12px; border-radius: 12px;">${status}</span></p>
                            </div>
                        `;
            }
        });

        printWindow.document.write(`
                    <html>
                    <head>
                        <title>Appointment History Report</title>
                        <style>
                            body { font-family: Arial, sans-serif; padding: 40px; }
                            .header { text-align: center; border-bottom: 3px solid #2f9e8f; padding-bottom: 20px; margin-bottom: 30px; }
                            .header h1 { color: #2f9e8f; margin: 0; }
                            .stats { display: flex; gap: 20px; margin: 20px 0; justify-content: center; }
                            .stat-box { padding: 15px 30px; background: #f9fafb; border-radius: 8px; text-align: center; }
                            .stat-number { font-size: 28px; font-weight: bold; color: #2f9e8f; }
                            .stat-label { font-size: 14px; color: #6b7280; }
                            @media print { 
                                button { display: none; }
                                .no-print { display: none; }
                            }
                        </style>
                    </head>
                    <body>
                        <div class="header">
                            <h1>📋 Appointment History Report</h1>
                            <p>Generated on ${new Date().toLocaleDateString()}</p>
                        </div>
                        
                        <div class="stats">
                            <div class="stat-box">
                                <div class="stat-number">18</div>
                                <div class="stat-label">Total Visits</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-number">15</div>
                                <div class="stat-label">Completed</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-number">2</div>
                                <div class="stat-label">Cancelled</div>
                            </div>
                            <div class="stat-box">
                                <div class="stat-number">1</div>
                                <div class="stat-label">No Show</div>
                            </div>
                        </div>

                        <h2 style="color: #2f9e8f; margin-top: 40px;">Appointment Details</h2>
                        ${appointmentsList}

                        <div class="no-print" style="text-align: center; margin-top: 40px;">
                            <button onclick="window.print()" style="padding: 12px 30px; background: #2f9e8f; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer;">
                                🖨️ Print / Save as PDF
                            </button>
                            <button onclick="window.close()" style="padding: 12px 30px; background: #6b7280; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; margin-left: 10px;">
                                ❌ Close
                            </button>
                        </div>
                    </body>
                    </html>
                `);
        printWindow.document.close();
    }
    </script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-semibold" href="#">
                <span class="navbar-brand fw-semibold">
                    <i class="bi bi-heart-pulse"></i> Online Appointment Booking System
                </span>

            </a>

            <!-- Mobile toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="appointmentDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Appointments
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="appointmentDropdown">
                            <li><a class="dropdown-item" href="book.php">Book Appointment</a></li>
                            <li><a class="dropdown-item" href="upcoming.php">Upcoming
                                    Appointments</a></li>
                            <li><a class="dropdown-item" href="past.php">Past Appointments</a>
                            </li>
                            <li><a class="dropdown-item" href="history.php">Appointment
                                    History</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payments.php">
                            Payments
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="support.php">
                            Support
                        </a>
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
                                <a class="dropdown-item text-center text-primary fw-semibold"
                                    href="/notifications.php">
                                    View all notifications
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="view.php">View Profile</a></li>
                            <li><a class="dropdown-item" href="edit.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="change-password.php">Change Password</a>
                            </li>
                            <li><a class="dropdown-item" href="medical-info.php">Medical
                                    Information</a></li>
                        </ul>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a class="nav-link-login nav-link" href="/logout.php"
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
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <h2 class="fw-bold mb-1">Appointment History</h2>
                    <p class="mb-0 opacity-90">Complete record of all your appointments</p>
                </div>
                <button class="btn btn-light btn-export" onclick="exportHistory()">
                    <i class="bi bi-download"></i> <span class="d-none d-sm-inline">Export PDF</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container pb-5">
        <!-- Statistics -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="stat-card-small">
                    <div class="stat-number">18</div>
                    <div class="stat-label">Total Visits</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card-small">
                    <div class="stat-number">15</div>
                    <div class="stat-label">Completed</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card-small">
                    <div class="stat-number">2</div>
                    <div class="stat-label">Cancelled</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card-small">
                    <div class="stat-number">1</div>
                    <div class="stat-label">No Show</div>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="search-filter-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" class="form-control" id="searchInput"
                            placeholder="Search by doctor name, department, or reason..." onkeyup="searchHistory()">
                    </div>
                </div>
                <div class="col-md-4 mt-3 mt-md-0">
                    <select class="form-select" style="border-radius: 12px; border: 2px solid #e5e7eb;"
                        onchange="filterByYear(this.value)">
                        <option value="all">All Years</option>
                        <option value="2026" selected>2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
            </div>

            <div class="filter-pills">
                <div class="filter-pill active" onclick="filterByStatus('all')">All</div>
                <div class="filter-pill" onclick="filterByStatus('completed')">
                    <i class="bi bi-check-circle"></i> Completed
                </div>
                <div class="filter-pill" onclick="filterByStatus('cancelled')">
                    <i class="bi bi-x-circle"></i> Cancelled
                </div>
                <div class="filter-pill" onclick="filterByStatus('no-show')">
                    <i class="bi bi-exclamation-circle"></i> No Show
                </div>
            </div>
        </div>

        <!-- Timeline -->
        <div class="timeline" id="historyTimeline">
            <!-- 2026 -->
            <div class="year-divider">
                <span>2026</span>
            </div>

            <!-- Appointment 1 -->
            <div class="timeline-item" data-status="completed" data-year="2026">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            January 8, 2026 • 10:00 AM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Juan Cruz</h6>
                            <p class="text-muted small mb-0">Family Medicine</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Annual physical examination and lab work review</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 201, Building A
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 30 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(1)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 2 -->
            <div class="timeline-item" data-status="completed" data-year="2026">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            January 5, 2026 • 2:30 PM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Emily Rodriguez</h6>
                            <p class="text-muted small mb-0">Dermatology</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Skin condition follow-up and treatment review</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 315, Building B
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 25 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(2)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- 2025 -->
            <div class="year-divider">
                <span>2025</span>
            </div>

            <!-- Appointment 3 -->
            <div class="timeline-item" data-status="completed" data-year="2025">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            December 20, 2025 • 11:00 AM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Patricia Gomez</h6>
                            <p class="text-muted small mb-0">General Dentist</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Routine dental cleaning and checkup</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 401, Dental Wing
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 45 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(3)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 4 - Cancelled -->
            <div class="timeline-item" data-status="cancelled" data-year="2025">
                <div class="timeline-marker cancelled">
                    <i class="bi bi-x"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            December 10, 2025 • 3:00 PM
                        </div>
                        <span class="status-badge status-cancelled">Cancelled</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. James Wong</h6>
                            <p class="text-muted small mb-0">Orthopedic Surgeon</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Knee pain consultation</p>
                    </div>

                    <div class="alert alert-danger border-0 mb-2"
                        style="background-color: #fee2e2; color: #991b1b; padding: 0.5rem 0.75rem;">
                        <small><i class="bi bi-info-circle"></i> Cancelled by patient on December 9, 2025</small>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(4)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 5 -->
            <div class="timeline-item" data-status="completed" data-year="2025">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            November 15, 2025 • 9:30 AM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Robert Chen</h6>
                            <p class="text-muted small mb-0">Cardiologist</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Heart health screening and blood pressure monitoring</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 305, Building B
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 40 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(5)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 6 - No Show -->
            <div class="timeline-item" data-status="no-show" data-year="2025">
                <div class="timeline-marker no-show">
                    <i class="bi bi-exclamation"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            October 28, 2025 • 1:00 PM
                        </div>
                        <span class="status-badge status-no-show">No Show</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Sarah Williams</h6>
                            <p class="text-muted small mb-0">Internal Medicine</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Follow-up consultation for chronic condition</p>
                    </div>

                    <div class="alert alert-warning border-0 mb-2"
                        style="background-color: #fef3c7; color: #92400e; padding: 0.5rem 0.75rem;">
                        <small><i class="bi bi-info-circle"></i> Patient did not show up for appointment</small>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(6)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 7 -->
            <div class="timeline-item" data-status="completed" data-year="2025">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            September 12, 2025 • 3:15 PM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Michael Torres</h6>
                            <p class="text-muted small mb-0">Ophthalmology</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Annual eye examination and vision test</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 102, Eye Center
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 35 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(7)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 8 -->
            <div class="timeline-item" data-status="completed" data-year="2025">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            August 5, 2025 • 10:45 AM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Lisa Anderson</h6>
                            <p class="text-muted small mb-0">Endocrinology</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Diabetes management and medication review</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 204, Building C
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 40 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(8)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- 2024 -->
            <div class="year-divider">
                <span>2024</span>
            </div>

            <!-- Appointment 9 -->
            <div class="timeline-item" data-status="completed" data-year="2024">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            December 15, 2024 • 2:00 PM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Juan Cruz</h6>
                            <p class="text-muted small mb-0">Family Medicine</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Flu vaccination and general checkup</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 201, Building A
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 20 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(9)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 10 - Cancelled -->
            <div class="timeline-item" data-status="cancelled" data-year="2024">
                <div class="timeline-marker cancelled">
                    <i class="bi bi-x"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            November 8, 2024 • 4:30 PM
                        </div>
                        <span class="status-badge status-cancelled">Cancelled</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Rachel Kim</h6>
                            <p class="text-muted small mb-0">Gastroenterology</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Digestive health consultation</p>
                    </div>

                    <div class="alert alert-danger border-0 mb-2"
                        style="background-color: #fee2e2; color: #991b1b; padding: 0.5rem 0.75rem;">
                        <small><i class="bi bi-info-circle"></i> Cancelled by clinic due to emergency</small>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(10)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 11 -->
            <div class="timeline-item" data-status="completed" data-year="2024">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            October 22, 2024 • 11:30 AM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Patricia Gomez</h6>
                            <p class="text-muted small mb-0">General Dentist</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Dental cleaning and cavity filling</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 401, Dental Wing
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 60 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(11)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 12 -->
            <div class="timeline-item" data-status="completed" data-year="2024">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            September 3, 2024 • 1:15 PM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. David Martinez</h6>
                            <p class="text-muted small mb-0">Pulmonology</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Asthma management and lung function test</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 220, Building B
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 45 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(12)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 13 -->
            <div class="timeline-item" data-status="completed" data-year="2024">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            July 18, 2024 • 9:00 AM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Emily Rodriguez</h6>
                            <p class="text-muted small mb-0">Dermatology</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Skin cancer screening and mole check</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 315, Building B
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 30 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(13)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 14 -->
            <div class="timeline-item" data-status="completed" data-year="2024">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            June 10, 2024 • 2:45 PM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Robert Chen</h6>
                            <p class="text-muted small mb-0">Cardiologist</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">EKG and cardiovascular health assessment</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 305, Building B
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 50 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(14)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 15 -->
            <div class="timeline-item" data-status="completed" data-year="2024">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            May 5, 2024 • 10:15 AM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Susan Park</h6>
                            <p class="text-muted small mb-0">Rheumatology</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Arthritis treatment review and joint examination</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 410, Building C
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 35 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(15)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 16 -->
            <div class="timeline-item" data-status="completed" data-year="2024">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            March 20, 2024 • 3:30 PM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Thomas Lee</h6>
                            <p class="text-muted small mb-0">Urology</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Routine urological examination</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 125, Building A
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 25 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(16)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 17 -->
            <div class="timeline-item" data-status="completed" data-year="2024">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            February 14, 2024 • 11:00 AM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Jennifer Collins</h6>
                            <p class="text-muted small mb-0">Neurology</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Headache evaluation and neurological assessment</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 505, Building C
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 40 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(17)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>

            <!-- Appointment 18 -->
            <div class="timeline-item" data-status="completed" data-year="2024">
                <div class="timeline-marker completed">
                    <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div class="timeline-date">
                            <i class="bi bi-calendar3"></i>
                            January 9, 2024 • 9:30 AM
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="doctor-info-small">
                        <div class="doctor-avatar-small">
                            <i class="bi bi-person"></i>
                        </div>
                        <div>
                            <h6 class="fw-semibold mb-0">Dr. Juan Cruz</h6>
                            <p class="text-muted small mb-0">Family Medicine</p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <strong class="small text-muted">Reason:</strong>
                        <p class="mb-0 small">Annual physical examination</p>
                    </div>

                    <div class="mb-3">
                        <span class="info-badge-small">
                            <i class="bi bi-geo-alt-fill"></i> Room 201, Building A
                        </span>
                        <span class="info-badge-small">
                            <i class="bi bi-clock-fill"></i> 30 minutes
                        </span>
                    </div>

                    <button class="btn btn-outline-doctor btn-sm" onclick="viewFullDetails(18)">
                        <i class="bi bi-eye"></i> View Details
                    </button>
                </div>
            </div>
        </div>

        <!-- Empty State (hidden by default) -->
        <div id="emptyState" style="display: none;" class="text-center py-5">
            <i class="bi bi-inbox display-1 text-muted"></i>
            <h4 class="mt-3 text-muted">No appointments found</h4>
            <p class="text-muted">Try adjusting your search or filters</p>
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
                        <li><a href="view.php">Profile</a></li>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
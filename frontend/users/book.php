<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Appointment - Online Appointment Booking System</title>
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
                        <a class="nav-link dropdown-toggle active" href="#" id="appointmentDropdown" role="button"
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
            <div class="d-flex align-items-center">
                <a href="dashboard.php" class="text-white text-decoration-none me-3">
                    <i class="bi bi-arrow-left fs-4"></i>
                </a>
                <div>
                    <h2 class="fw-bold mb-1">Book an Appointment</h2>
                    <p class="mb-0 opacity-90">Schedule your visit with our healthcare professionals</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Form -->
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card-doctor p-4">
                    <!-- Step Indicator -->
                    <div class="step-indicator">
                        <div class="step active" data-step="1">
                            <div class="step-circle">1</div>
                            <div class="step-label">Department</div>
                        </div>
                        <div class="step" data-step="2">
                            <div class="step-circle">2</div>
                            <div class="step-label">Doctor</div>
                        </div>
                        <div class="step" data-step="3">
                            <div class="step-circle">3</div>
                            <div class="step-label">Date & Time</div>
                        </div>
                        <div class="step" data-step="4">
                            <div class="step-circle">4</div>
                            <div class="step-label">Details</div>
                        </div>
                        <div class="step" data-step="5">
                            <div class="step-circle">5</div>
                            <div class="step-label">Payment</div>
                        </div>
                    </div>

                    <form id="bookingForm" method="POST" action="save-appointment.php">
                        <!-- Step 1: Select Department -->
                        <div class="form-section active" id="step1">
                            <h4 class="fw-semibold mb-3">Select Department</h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="doctor-card" onclick="selectDepartment(this, 'General Medicine', 500)">
                                        <i class="bi bi-hospital fs-3 text-doctor mb-2"></i>
                                        <h5 class="fw-semibold mb-1">General Medicine</h5>
                                        <p class="text-muted small mb-0">Primary healthcare and consultations</p>
                                        <p class="text-doctor fw-semibold mt-2 mb-0">₱500</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="doctor-card" onclick="selectDepartment(this, 'Cardiology', 1200)">
                                        <i class="bi bi-heart-pulse fs-3 text-doctor mb-2"></i>
                                        <h5 class="fw-semibold mb-1">Cardiology</h5>
                                        <p class="text-muted small mb-0">Heart and cardiovascular health</p>
                                        <p class="text-doctor fw-semibold mt-2 mb-0">₱1,200</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="doctor-card" onclick="selectDepartment(this, 'Pediatrics', 600)">
                                        <i class="bi bi-person-hearts fs-3 text-doctor mb-2"></i>
                                        <h5 class="fw-semibold mb-1">Pediatrics</h5>
                                        <p class="text-muted small mb-0">Children's healthcare</p>
                                        <p class="text-doctor fw-semibold mt-2 mb-0">₱600</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="doctor-card" onclick="selectDepartment(this, 'Orthopedics', 1000)">
                                        <i class="bi bi-bandaid fs-3 text-doctor mb-2"></i>
                                        <h5 class="fw-semibold mb-1">Orthopedics</h5>
                                        <p class="text-muted small mb-0">Bone and joint care</p>
                                        <p class="text-doctor fw-semibold mt-2 mb-0">₱1,000</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="doctor-card" onclick="selectDepartment(this, 'Dermatology', 800)">
                                        <i class="bi bi-droplet fs-3 text-doctor mb-2"></i>
                                        <h5 class="fw-semibold mb-1">Dermatology</h5>
                                        <p class="text-muted small mb-0">Skin and hair treatment</p>
                                        <p class="text-doctor fw-semibold mt-2 mb-0">₱800</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="doctor-card" onclick="selectDepartment(this, 'Dentistry', 700)">
                                        <i class="bi bi-tooth fs-3 text-doctor mb-2"></i>
                                        <h5 class="fw-semibold mb-1">Dentistry</h5>
                                        <p class="text-muted small mb-0">Dental and oral care</p>
                                        <p class="text-doctor fw-semibold mt-2 mb-0">₱700</p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="department" id="departmentInput">
                            <input type="hidden" name="consultation_fee" id="consultationFeeInput">
                        </div>

                        <!-- Step 2: Select Doctor -->
                        <div class="form-section" id="step2">
                            <h4 class="fw-semibold mb-3">Select Doctor</h4>
                            <div class="row g-3" id="doctorList"></div>
                            <input type="hidden" name="doctor_id" id="doctorInput">
                        </div>

                        <!-- Step 3: Select Date & Time -->
                        <div class="form-section" id="step3">
                            <h4 class="fw-semibold mb-3">Select Date & Time</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Appointment Date</label>
                                    <input type="date" class="form-control" name="appointment_date" id="appointmentDate"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Select Time Slot</label>
                                    <div class="row g-2" id="timeSlots"></div>
                                    <input type="hidden" name="appointment_time" id="timeInput">
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Additional Details -->
                        <div class="form-section" id="step4">
                            <h4 class="fw-semibold mb-3">Additional Details</h4>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Reason for Visit <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="reason" required>
                                        <option value="" disabled selected>Select your reason for visit</option>

                                        <!-- General Consultation -->
                                        <optgroup label="General Consultation">
                                            <option value="Routine Check-up / General Consultation">Routine Check-up /
                                                General Consultation</option>
                                            <option value="Follow-up Appointment">Follow-up Appointment</option>
                                            <option value="Second Opinion">Second Opinion</option>
                                            <option value="Health Screening">Health Screening</option>
                                        </optgroup>

                                        <!-- Specialty Consultations -->
                                        <optgroup label="Specialty Consultations">
                                            <option value="Pediatric Consultation">Pediatric Consultation</option>
                                            <option value="Obstetrics & Gynecology">Obstetrics & Gynecology</option>
                                            <option value="Cardiology Consultation">Cardiology Consultation</option>
                                            <option value="Dermatology / Skin Issue">Dermatology / Skin Issue</option>
                                            <option value="Neurology Consultation">Neurology Consultation</option>
                                            <option value="Orthopedic / Bone & Joint Issue">Orthopedic / Bone & Joint
                                                Issue</option>
                                            <option value="ENT Consultation">ENT (Ear, Nose, Throat) Consultation
                                            </option>
                                            <option value="Ophthalmology / Eye Consultation">Eye / Ophthalmology
                                                Consultation</option>
                                            <option value="Dental / Oral Health">Dental / Oral Health</option>
                                        </optgroup>

                                        <!-- Symptoms / Complaints -->
                                        <optgroup label="Symptoms / Complaints">
                                            <option value="Fever / Flu / Cold">Fever / Flu / Cold</option>
                                            <option value="Cough / Sore Throat">Cough / Sore Throat</option>
                                            <option value="Headache / Migraine">Headache / Migraine</option>
                                            <option value="Stomach Pain / Digestive Issues">Stomach Pain / Digestive
                                                Issues</option>
                                            <option value="Chest Pain / Heart Symptoms">Chest Pain / Heart-Related
                                                Symptoms</option>
                                            <option value="Shortness of Breath">Shortness of Breath</option>
                                            <option value="Skin Rash / Allergy">Skin Rash / Allergy</option>
                                            <option value="Fatigue / Weakness">Fatigue / Weakness</option>
                                        </optgroup>

                                        <!-- Preventive / Screening -->
                                        <optgroup label="Preventive / Screening">
                                            <option value="Vaccination / Immunization">Vaccination / Immunization
                                            </option>
                                            <option value="Routine Blood Test / Lab Test">Routine Blood Test / Lab Test
                                            </option>
                                            <option value="Cancer Screening">Cancer Screening</option>
                                            <option value="Blood Pressure / Diabetes Check">Blood Pressure / Diabetes
                                                Check</option>
                                            <option value="Prenatal / Antenatal Care">Prenatal / Antenatal Care</option>
                                        </optgroup>

                                        <!-- Mental Health -->
                                        <optgroup label="Mental Health">
                                            <option value="Stress / Anxiety / Depression Consultation">Stress / Anxiety
                                                / Depression Consultation</option>
                                            <option value="Counseling Session">Counseling Session</option>
                                            <option value="Psychiatric Evaluation">Psychiatric Evaluation</option>
                                        </optgroup>

                                        <!-- Other Reasons -->
                                        <optgroup label="Other Reasons">
                                            <option value="Prescription Refill">Prescription Refill</option>
                                            <option value="Medical Certificate / Clearance">Medical Certificate /
                                                Clearance</option>
                                            <option value="Post-Surgery Follow-up">Post-Surgery Follow-up</option>
                                            <option value="Injury / Accident">Injury / Accident</option>
                                            <option value="Specialized Procedure or Treatment">Specialized Procedure or
                                                Treatment</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="contact" placeholder="+63 9XX XXX XXXX"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="your.email@example.com" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Additional Notes (Optional)</label>
                                    <textarea class="form-control" name="notes" rows="3"
                                        placeholder="Any additional information you'd like to share..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Payment Method -->
                        <div class="form-section" id="step5">
                            <h4 class="fw-semibold mb-3">Payment Method</h4>

                            <!-- Fee Breakdown -->
                            <div class="fee-breakdown mb-4">
                                <h6 class="fw-semibold mb-3">Fee Breakdown</h6>
                                <div class="fee-item">
                                    <span>Consultation Fee</span>
                                    <span id="displayConsultationFee">₱0</span>
                                </div>
                                <div class="fee-item">
                                    <span>Service Fee</span>
                                    <span id="displayServiceFee">₱50</span>
                                </div>
                                <div class="fee-item">
                                    <span>Total Amount</span>
                                    <span id="displayTotalFee">₱0</span>
                                </div>
                            </div>

                            <!-- Payment Methods -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <div class="payment-method" onclick="selectPaymentMethod(this, 'credit-card')">
                                        <i class="bi bi-credit-card"></i>
                                        <h6 class="fw-semibold mb-0">Credit/Debit Card</h6>
                                        <small class="text-muted">Visa, Mastercard, Amex</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="payment-method" onclick="selectPaymentMethod(this, 'gcash')">
                                        <i class="bi bi-phone"></i>
                                        <h6 class="fw-semibold mb-0">GCash</h6>
                                        <small class="text-muted">Mobile wallet</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="payment-method" onclick="selectPaymentMethod(this, 'paymaya')">
                                        <i class="bi bi-wallet2"></i>
                                        <h6 class="fw-semibold mb-0">PayMaya</h6>
                                        <small class="text-muted">Digital payment</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="payment-method" onclick="selectPaymentMethod(this, 'cash')">
                                        <i class="bi bi-cash-coin"></i>
                                        <h6 class="fw-semibold mb-0">Cash on Arrival</h6>
                                        <small class="text-muted">Pay at the clinic</small>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="payment_method" id="paymentMethodInput">

                            <!-- Credit Card Details -->
                            <div class="payment-details" id="creditCardDetails">
                                <h6 class="fw-semibold mb-3">Card Information</h6>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Card Number</label>
                                        <input type="text" class="form-control card-input"
                                            placeholder="1234 5678 9012 3456" maxlength="19" id="cardNumber">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Expiry Date</label>
                                        <input type="text" class="form-control" placeholder="MM/YY" maxlength="5"
                                            id="cardExpiry">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">CVV</label>
                                        <input type="text" class="form-control" placeholder="123" maxlength="3"
                                            id="cardCVV">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Cardholder Name</label>
                                        <input type="text" class="form-control" placeholder="Name on card"
                                            id="cardholderName">
                                    </div>
                                </div>
                            </div>

                            <!-- GCash Details -->
                            <div class="payment-details" id="gcashDetails">
                                <h6 class="fw-semibold mb-3">GCash Information</h6>
                                <div class="alert alert-info">
                                    <i class="bi bi-info-circle"></i>
                                    You will be redirected to GCash to complete your payment.
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">GCash Mobile Number</label>
                                    <input type="tel" class="form-control" placeholder="+63 9XX XXX XXXX"
                                        id="gcashNumber">
                                </div>
                            </div>

                            <!-- PayMaya Details -->
                            <div class="payment-details" id="paymayaDetails">
                                <h6 class="fw-semibold mb-3">PayMaya Information</h6>
                                <div class="alert alert-info">
                                    <i class="bi bi-info-circle"></i>
                                    You will be redirected to PayMaya to complete your payment.
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">PayMaya Mobile Number</label>
                                    <input type="tel" class="form-control" placeholder="+63 9XX XXX XXXX"
                                        id="paymayaNumber">
                                </div>
                            </div>

                            <div class="alert alert-warning mt-3">
                                <i class="bi bi-shield-check"></i>
                                <small>Your payment information is secure and encrypted.</small>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                            <button type="button" class="btn btn-outline-doctor" id="prevBtn" onclick="changeStep(-1)"
                                style="display: none;">
                                <i class="bi bi-arrow-left"></i> Previous
                            </button>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-doctor" id="nextBtn" onclick="changeStep(1)">
                                    Next <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="submit" class="btn btn-doctor" id="submitBtn" style="display: none;">
                                    <i class="bi bi-check-circle"></i> Confirm & Pay
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Summary Sidebar -->
            <div class="col-lg-4">
                <div class="card-doctor p-4 sticky-top" style="top: 20px;">
                    <h5 class="fw-semibold mb-3">
                        <i class="bi bi-clipboard-check text-doctor"></i> Appointment Summary
                    </h5>
                    <div class="summary-box">
                        <div class="summary-item">
                            <span class="summary-label">Department:</span>
                            <span class="summary-value" id="summaryDepartment">-</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Doctor:</span>
                            <span class="summary-value" id="summaryDoctor">-</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Date:</span>
                            <span class="summary-value" id="summaryDate">-</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Time:</span>
                            <span class="summary-value" id="summaryTime">-</span>
                        </div>
                        <div class="summary-item border-top pt-2 mt-2">
                            <span class="summary-label fw-semibold">Total Fee:</span>
                            <span class="summary-value text-doctor fw-bold" id="summaryTotal">₱0</span>
                        </div>
                    </div>

                    <div class="alert alert-info mt-3 mb-0 border-0" style="background-color: #e6f4f1; color: #2f9e8f;">
                        <i class="bi bi-info-circle"></i>
                        <small class="d-block mt-1">
                            Please arrive 15 minutes before your appointment time.
                        </small>
                    </div>
                </div>
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
    let currentStep = 1;
    const totalSteps = 5;
    let consultationFee = 0;
    const serviceFee = 50;

    const doctors = {
        'General Medicine': [{
                id: 1,
                name: 'Dr. Maria Santos',
                specialization: 'Internal Medicine',
                experience: '15 years'
            },
            {
                id: 2,
                name: 'Dr. Juan Cruz',
                specialization: 'Family Medicine',
                experience: '10 years'
            }
        ],
        'Cardiology': [{
                id: 3,
                name: 'Dr. Robert Chen',
                specialization: 'Cardiologist',
                experience: '20 years'
            },
            {
                id: 4,
                name: 'Dr. Ana Reyes',
                specialization: 'Interventional Cardiology',
                experience: '12 years'
            }
        ],
        'Pediatrics': [{
                id: 5,
                name: 'Dr. Lisa Garcia',
                specialization: 'Pediatrician',
                experience: '8 years'
            },
            {
                id: 6,
                name: 'Dr. Mark Tan',
                specialization: 'Child Specialist',
                experience: '14 years'
            }
        ],
        'Orthopedics': [{
                id: 7,
                name: 'Dr. James Wong',
                specialization: 'Orthopedic Surgeon',
                experience: '18 years'
            },
            {
                id: 8,
                name: 'Dr. Sarah Lee',
                specialization: 'Sports Medicine',
                experience: '11 years'
            }
        ],
        'Dermatology': [{
                id: 9,
                name: 'Dr. Emily Rodriguez',
                specialization: 'Dermatologist',
                experience: '9 years'
            },
            {
                id: 10,
                name: 'Dr. Michael Lim',
                specialization: 'Cosmetic Dermatology',
                experience: '13 years'
            }
        ],
        'Dentistry': [{
                id: 11,
                name: 'Dr. Patricia Gomez',
                specialization: 'General Dentist',
                experience: '16 years'
            },
            {
                id: 12,
                name: 'Dr. David Kim',
                specialization: 'Orthodontist',
                experience: '10 years'
            }
        ]
    };

    function selectDepartment(element, department, fee) {
        document.querySelectorAll('#step1 .doctor-card').forEach(card => {
            card.classList.remove('selected');
        });
        element.classList.add('selected');
        document.getElementById('departmentInput').value = department;
        document.getElementById('consultationFeeInput').value = fee;
        document.getElementById('summaryDepartment').textContent = department;

        consultationFee = fee;
        updateFeeBreakdown();
        loadDoctors(department);
    }

    function updateFeeBreakdown() {
        const total = consultationFee + serviceFee;
        document.getElementById('displayConsultationFee').textContent = '₱' + consultationFee.toLocaleString();
        document.getElementById('displayServiceFee').textContent = '₱' + serviceFee.toLocaleString();
        document.getElementById('displayTotalFee').textContent = '₱' + total.toLocaleString();
        document.getElementById('summaryTotal').textContent = '₱' + total.toLocaleString();
    }

    function loadDoctors(department) {
        const doctorList = document.getElementById('doctorList');
        doctorList.innerHTML = '';

        if (doctors[department]) {
            doctors[department].forEach(doctor => {
                const col = document.createElement('div');
                col.className = 'col-md-6';
                col.innerHTML = `
                    <div class="doctor-card" onclick="selectDoctor(this, ${doctor.id}, '${doctor.name}')">
                        <div class="doctor-avatar mx-auto">
                            <i class="bi bi-person"></i>
                        </div>
                        <h5 class="fw-semibold mb-1">${doctor.name}</h5>
                        <p class="text-muted small mb-1">${doctor.specialization}</p>
                        <p class="text-muted small mb-0"><i class="bi bi-award"></i> ${doctor.experience} experience</p>
                    </div>
                `;
                doctorList.appendChild(col);
            });
        }
    }

    function selectDoctor(element, doctorId, doctorName) {
        document.querySelectorAll('#step2 .doctor-card').forEach(card => {
            card.classList.remove('selected');
        });
        element.classList.add('selected');
        document.getElementById('doctorInput').value = doctorId;
        document.getElementById('summaryDoctor').textContent = doctorName;
    }

    function generateTimeSlots() {
        const timeSlotsContainer = document.getElementById('timeSlots');
        timeSlotsContainer.innerHTML = '';

        const slots = [
            '09:00:00', '09:30:00', '10:00:00', '10:30:00',
            '11:00:00', '11:30:00', '13:00:00', '13:30:00',
            '13:00:00', '14:30:00', '15:00:00', '15:30:00',
            '16:00:00', '16:30:00'
        ];

        slots.forEach(time => {
            const col = document.createElement('div');
            col.className = 'col-6 col-md-4';
            const isAvailable = Math.random() > 0.3;
            col.innerHTML = `
                <div class="time-slot ${isAvailable ? '' : 'unavailable'}" 
                     onclick="${isAvailable ? `selectTime(this, '${time}')` : ''}">
                    <i class="bi bi-clock"></i> ${time}
                </div>
            `;
            timeSlotsContainer.appendChild(col);
        });
    }

    function selectTime(element, time) {
        document.querySelectorAll('.time-slot').forEach(slot => {
            slot.classList.remove('selected');
        });
        element.classList.add('selected');
        document.getElementById('timeInput').value = time;
        document.getElementById('summaryTime').textContent = time;
    }

    function selectPaymentMethod(element, method) {
        document.querySelectorAll('.payment-method').forEach(card => {
            card.classList.remove('selected');
        });
        element.classList.add('selected');
        document.getElementById('paymentMethodInput').value = method;

        // Hide all payment details
        document.querySelectorAll('.payment-details').forEach(detail => {
            detail.classList.remove('active');
        });

        // Show selected payment method details
        if (method === 'credit-card') {
            document.getElementById('creditCardDetails').classList.add('active');
        } else if (method === 'gcash') {
            document.getElementById('gcashDetails').classList.add('active');
        } else if (method === 'paymaya') {
            document.getElementById('paymayaDetails').classList.add('active');
        }
    }

    // Date input listener
    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('appointmentDate');
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);

        dateInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const options = {
                weekday: 'short',
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            document.getElementById('summaryDate').textContent = selectedDate.toLocaleDateString(
                'en-US', options);
            generateTimeSlots();
        });

        // Card number formatting
        const cardNumber = document.getElementById('cardNumber');
        if (cardNumber) {
            cardNumber.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\s/g, '');
                let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
                e.target.value = formattedValue;
            });
        }

        // Card expiry formatting
        const cardExpiry = document.getElementById('cardExpiry');
        if (cardExpiry) {
            cardExpiry.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                e.target.value = value;
            });
        }
    });

    function changeStep(direction) {
        // Validation before moving forward
        if (direction === 1) {
            if (currentStep === 1 && !document.getElementById('departmentInput').value) {
                alert('Please select a department');
                return;
            }
            if (currentStep === 2 && !document.getElementById('doctorInput').value) {
                alert('Please select a doctor');
                return;
            }
            if (currentStep === 3) {
                if (!document.getElementById('appointmentDate').value) {
                    alert('Please select a date');
                    return;
                }
                if (!document.getElementById('timeInput').value) {
                    alert('Please select a time slot');
                    return;
                }
            }
            if (currentStep === 4) {
                const form = document.getElementById('bookingForm');
                const reason = form.querySelector('[name="reason"]').value;
                const contact = form.querySelector('[name="contact"]').value;
                const email = form.querySelector('[name="email"]').value;

                if (!reason || !contact || !email) {
                    alert('Please fill in all required fields');
                    return;
                }
            }
        }

        // Hide current step
        document.getElementById('step' + currentStep).classList.remove('active');
        document.querySelector(`.step[data-step="${currentStep}"]`).classList.remove('active');

        // Update step
        currentStep += direction;

        // Show new step
        document.getElementById('step' + currentStep).classList.add('active');
        document.querySelector(`.step[data-step="${currentStep}"]`).classList.add('active');

        // Mark completed steps
        for (let i = 1; i < currentStep; i++) {
            document.querySelector(`.step[data-step="${i}"]`).classList.add('completed');
        }

        // Update buttons
        document.getElementById('prevBtn').style.display = currentStep === 1 ? 'none' : 'block';
        document.getElementById('nextBtn').style.display = currentStep === totalSteps ? 'none' : 'block';
        document.getElementById('submitBtn').style.display = currentStep === totalSteps ? 'block' : 'none';

        // Scroll to top
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Form submission
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Validate payment method
        if (!document.getElementById('paymentMethodInput').value) {
            alert('Please select a payment method');
            return;
        }

        const paymentMethod = document.getElementById('paymentMethodInput').value;

        // Validate payment details based on method
        if (paymentMethod === 'credit-card') {
            const cardNumber = document.getElementById('cardNumber').value;
            const cardExpiry = document.getElementById('cardExpiry').value;
            const cardCVV = document.getElementById('cardCVV').value;
            const cardholderName = document.getElementById('cardholderName').value;

            if (!cardNumber || !cardExpiry || !cardCVV || !cardholderName) {
                alert('Please fill in all card details');
                return;
            }
        } else if (paymentMethod === 'gcash') {
            const gcashNumber = document.getElementById('gcashNumber').value;
            if (!gcashNumber) {
                alert('Please enter your GCash mobile number');
                return;
            }
        } else if (paymentMethod === 'paymaya') {
            const paymayaNumber = document.getElementById('paymayaNumber').value;
            if (!paymayaNumber) {
                alert('Please enter your PayMaya mobile number');
                return;
            }
        }

        // Show confirmation
        const total = consultationFee + serviceFee;
        const selectedDepartment = document.getElementById('departmentInput').value;
        const selectedDate = document.getElementById('appointmentDate').value;
        const selectedTime = document.getElementById('timeInput').value;

        const reason = this.querySelector('[name="reason"]').value;
        const contact = this.querySelector('[name="contact"]').value;
        const email = this.querySelector('[name="email"]').value;
        const notes = this.querySelector('[name="notes"]').value;

        if (!selectedDepartment) {
            alert('Please select a department');
            return;
        }

        if (confirm('Are you sure you want to book this appointment?')) {
            fetch('http://appointment-system.test/backend/appointment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    department: selectedDepartment,// send dynamic department
                    date: selectedDate,
                    time: selectedTime,
                    reason: reason,
                    contact_number: contact,
                    email: email,
                    additional_information: notes,
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Appointment successfully booked!');
                    window.location.href = 'dashboard.php';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(err => {
                console.error(err);
                alert('Something went wrong. Please try again.');
            });
        }

    });
    </script>
</body>

</html>
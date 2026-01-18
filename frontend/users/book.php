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

// Fetch departments from database
$departments = [];
$dept_query = "SELECT PK_tblDepartment, departmentName FROM tbldepartment WHERE is_active = 1";
$dept_result = $conn->query($dept_query);
while ($row = $dept_result->fetch_assoc()) {
    $departments[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Appointment - Online Appointment System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/style.css">
    
    <style>
        /* Payment Method Styles */
        .payment-method {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            height: 100%;
        }
        
        .payment-method:hover {
            border-color: #2f9e8f;
            background-color: #f8fffe;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(47, 158, 143, 0.15);
        }
        
        .payment-method.selected {
            border-color: #2f9e8f;
            background-color: #e6f4f1;
            box-shadow: 0 4px 12px rgba(47, 158, 143, 0.2);
        }
        
        .payment-method i {
            font-size: 2rem;
            color: #2f9e8f;
            margin-bottom: 10px;
            display: block;
        }
        
        .payment-method h6 {
            margin-bottom: 5px;
            color: #333;
        }
        
        .payment-method small {
            color: #666;
        }
        
        .payment-details {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
        
        .payment-details.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fee-breakdown {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }
        
        .fee-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .fee-item:last-child {
            border-bottom: none;
            font-weight: 600;
            font-size: 1.1rem;
            color: #2f9e8f;
            padding-top: 12px;
            margin-top: 8px;
            border-top: 2px solid #2f9e8f;
        }
    </style>
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
                            <div class="step-label">Service</div>
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
                                <?php foreach ($departments as $department): ?>
                                <div class="col-md-6">
                                    <div class="doctor-card"
                                        onclick="selectDepartment(this, <?= $department['PK_tblDepartment'] ?>, '<?= htmlspecialchars($department['departmentName']) ?>')">
                                        <i class="bi bi-hospital fs-3 text-doctor mb-2"></i>
                                        <h5 class="fw-semibold mb-1">
                                            <?= htmlspecialchars($department['departmentName']) ?></h5>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <input type="hidden" name="department_id" id="departmentInput">
                            <input type="hidden" name="department_name" id="departmentNameInput">
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
                                    <label class="form-label">Reason for Visit <span class="text-danger">*</span></label>
                                    <select class="form-select" name="reason" required>
                                        <option value="" disabled selected>Select your reason for visit</option>
                                        <optgroup label="General Consultation">
                                            <option value="Routine Check-up / General Consultation">Routine Check-up / General Consultation</option>
                                            <option value="Follow-up Appointment">Follow-up Appointment</option>
                                            <option value="Second Opinion">Second Opinion</option>
                                            <option value="Health Screening">Health Screening</option>
                                        </optgroup>
                                        <optgroup label="Specialty Consultations">
                                            <option value="Pediatric Consultation">Pediatric Consultation</option>
                                            <option value="Obstetrics & Gynecology">Obstetrics & Gynecology</option>
                                            <option value="Cardiology Consultation">Cardiology Consultation</option>
                                            <option value="Dermatology / Skin Issue">Dermatology / Skin Issue</option>
                                            <option value="Neurology Consultation">Neurology Consultation</option>
                                            <option value="Orthopedic / Bone & Joint Issue">Orthopedic / Bone & Joint Issue</option>
                                            <option value="ENT Consultation">ENT (Ear, Nose, Throat) Consultation</option>
                                            <option value="Ophthalmology / Eye Consultation">Eye / Ophthalmology Consultation</option>
                                            <option value="Dental / Oral Health">Dental / Oral Health</option>
                                        </optgroup>
                                    </select>
                                </div>

                                 
                                <div class="col-12">
                                    <label class="form-label">Additional Notes (Optional)</label>
                                    <textarea class="form-control" name="notes" rows="3" placeholder="Any additional information you'd like to share..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Payment Method -->
                        <div class="form-section" id="step5">
                            <h4 class="fw-semibold mb-3">Payment Method</h4>

                            <!-- Fee Breakdown -->
                            <!-- <div class="fee-breakdown mb-4">
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
                            </div> -->

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
                                        <input type="text" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19" id="cardNumber">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Expiry Date</label>
                                        <input type="text" class="form-control" placeholder="MM/YY" maxlength="5" id="cardExpiry">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">CVV</label>
                                        <input type="text" class="form-control" placeholder="123" maxlength="3" id="cardCVV">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Cardholder Name</label>
                                        <input type="text" class="form-control" placeholder="Name on card" id="cardholderName">
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
                                    <input type="tel" class="form-control" placeholder="+63 9XX XXX XXXX" id="gcashNumber">
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
                                    <input type="tel" class="form-control" placeholder="+63 9XX XXX XXXX" id="paymayaNumber">
                                </div>
                            </div>

                            <div class="alert alert-warning mt-3">
                                <i class="bi bi-shield-check"></i>
                                <small>Your payment information is secure and encrypted.</small>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                            <button type="button" class="btn btn-outline-doctor" id="prevBtn" onclick="changeStep(-1)" style="display: none;">
                                <i class="bi bi-arrow-left"></i> Previous
                            </button>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-doctor" id="nextBtn" onclick="changeStep(1)">
                                    Next <i class="bi bi-arrow-right"></i>
                                </button>
                                <button type="submit" class="btn btn-doctor" id="submitBtn" style="display: none;">
                                    <i class="bi bi-check-circle"></i> Confirm Appointment
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
                            <span class="summary-label">Service:</span>
                            <span class="summary-value" id="summaryService">-</span>
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
                        <!-- <div class="summary-item border-top pt-2 mt-2">
                            <span class="summary-label fw-semibold">Total Fee:</span>
                            <span class="summary-value text-doctor fw-bold" id="summaryTotal">₱0</span>
                        </div> -->
                    </div>

                    <div class="alert alert-info mt-3 mb-0 border-0" style="background-color: #e6f4f1; color: #2f9e8f;">
                        <i class="bi bi-info-circle"></i>
                        <small class="d-block mt-1">Please arrive 15 minutes before your appointment time.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../context/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    let currentStep = 1;
    const totalSteps = 5;
    let consultationFee = 0;
    let selectedDoctorId = null;
    let selectedScheduleId = null;
    const SERVICE_FEE = 50;

    function updateFeeBreakdown() {
        const total = consultationFee + SERVICE_FEE;
        document.getElementById('displayConsultationFee').textContent = '₱' + consultationFee.toLocaleString();
        document.getElementById('displayServiceFee').textContent = '₱' + SERVICE_FEE.toLocaleString();
        document.getElementById('displayTotalFee').textContent = '₱' + total.toLocaleString();
        document.getElementById('summaryTotal').textContent = '₱' + total.toLocaleString();
    }

    function selectDepartment(element, departmentId, departmentName) {
        document.querySelectorAll('#step1 .doctor-card').forEach(card => {
            card.classList.remove('selected');
        });
        element.classList.add('selected');
        document.getElementById('departmentInput').value = departmentId;
        document.getElementById('departmentNameInput').value = departmentName;
        document.getElementById('summaryService').textContent = departmentName;
        loadDoctors(departmentId);
    }

    function loadDoctors(departmentId) {
        const doctorList = document.getElementById('doctorList');
        doctorList.innerHTML = '<div class="col-12 text-center"><div class="spinner-border text-doctor"></div></div>';

        fetch('get-doctors.php?department_id=' + departmentId)
            .then(res => res.json())
            .then(doctors => {
                doctorList.innerHTML = '';
                if (doctors.length === 0) {
                    doctorList.innerHTML = '<div class="col-12"><div class="alert alert-warning">No doctors available for this department.</div></div>';
                    return;
                }

                doctors.forEach(doctor => {
                    const col = document.createElement('div');
                    col.className = 'col-md-6';
                    col.innerHTML = `
                    <div class="doctor-card" onclick="selectDoctor(this, ${doctor.PK_tbldoctors}, '${doctor.name}', ${doctor.consultation_fee || 0})">
                        <div class="doctor-avatar mx-auto">
                            <i class="bi bi-person"></i>
                        </div>
                        <h5 class="fw-semibold mb-1">${doctor.name}</h5>
                        <p class="text-muted small mb-1">${doctor.specialization}</p>
                        <p class="text-muted small mb-0"><i class="bi bi-envelope"></i> ${doctor.email}</p>
                    </div>`;
                    doctorList.appendChild(col);
                });
            })
            .catch(err => {
                console.error('Error loading doctors:', err);
                doctorList.innerHTML = '<div class="col-12"><div class="alert alert-danger">Error loading doctors. Please try again.</div></div>';
            });
    }

    function selectDoctor(element, doctorId, doctorName, fee) {
        document.querySelectorAll('#step2 .doctor-card').forEach(card => {
            card.classList.remove('selected');
        });
        element.classList.add('selected');
        document.getElementById('doctorInput').value = doctorId;
        document.getElementById('summaryDoctor').textContent = doctorName;
        selectedDoctorId = doctorId;
        consultationFee = parseFloat(fee) || 0;
        updateFeeBreakdown();
    }

    function loadTimeSlots(doctorId, date) {
        const timeSlotsContainer = document.getElementById('timeSlots');
        timeSlotsContainer.innerHTML = '<div class="col-12 text-center"><div class="spinner-border spinner-border-sm text-doctor"></div></div>';

        fetch(`get-timeslots.php?doctor_id=${doctorId}&date=${date}`)
            .then(res => res.json())
            .then(slots => {
                timeSlotsContainer.innerHTML = '';
                if (slots.length === 0) {
                    timeSlotsContainer.innerHTML = '<div class="col-12"><small class="text-muted">No available time slots for this date.</small></div>';
                    return;
                }

                slots.forEach(slot => {
                    const col = document.createElement('div');
                    col.className = 'col-6 col-md-4';
                    const isAvailable = slot.available && slot.current_patients < slot.max_patients;
                    col.innerHTML = `
                    <div class="time-slot ${isAvailable ? '' : 'unavailable'}" 
                         onclick="${isAvailable ? `selectTime(this, '${slot.time_start}', ${slot.schedule_id})` : ''}">
                        <i class="bi bi-clock"></i> ${slot.time_start}
                        <small class="d-block">${slot.current_patients}/${slot.max_patients}</small>
                    </div>`;
                    timeSlotsContainer.appendChild(col);
                });
            })
            .catch(err => {
                console.error('Error loading time slots:', err);
                timeSlotsContainer.innerHTML = '<div class="col-12"><small class="text-danger">Error loading time slots.</small></div>';
            });
    }

    function selectTime(element, time, scheduleId) {
        document.querySelectorAll('.time-slot').forEach(slot => {
            slot.classList.remove('selected');
        });
        element.classList.add('selected');
        document.getElementById('timeInput').value = time;
        document.getElementById('summaryTime').textContent = time;
        selectedScheduleId = scheduleId;
    }

    function selectPaymentMethod(element, method) {
        document.querySelectorAll('.payment-method').forEach(card => {
            card.classList.remove('selected');
        });
        element.classList.add('selected');
        document.getElementById('paymentMethodInput').value = method;

        document.querySelectorAll('.payment-details').forEach(detail => {
            detail.classList.remove('active');
        });

        const cardNumber = document.getElementById('cardNumber');
        const cardExpiry = document.getElementById('cardExpiry');
        const cardCVV = document.getElementById('cardCVV');
        const cardholderName = document.getElementById('cardholderName');
        const gcashNumber = document.getElementById('gcashNumber');
        const paymayaNumber = document.getElementById('paymayaNumber');

        cardNumber.removeAttribute('required');
        cardExpiry.removeAttribute('required');
        cardCVV.removeAttribute('required');
        cardholderName.removeAttribute('required');
        gcashNumber.removeAttribute('required');
        paymayaNumber.removeAttribute('required');

        switch(method) {
            case 'credit-card':
                document.getElementById('creditCardDetails').classList.add('active');
                cardNumber.setAttribute('required', 'required');
                cardExpiry.setAttribute('required', 'required');
                cardCVV.setAttribute('required', 'required');
                cardholderName.setAttribute('required', 'required');
                break;
            case 'gcash':
                document.getElementById('gcashDetails').classList.add('active');
                gcashNumber.setAttribute('required', 'required');
                break;
            case 'paymaya':
                document.getElementById('paymayaDetails').classList.add('active');
                paymayaNumber.setAttribute('required', 'required');
                break;
            case 'cash':
                break;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('appointmentDate');
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);

        dateInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
            document.getElementById('summaryDate').textContent = selectedDate.toLocaleDateString('en-US', options);

            if (selectedDoctorId) {
                loadTimeSlots(selectedDoctorId, this.value);
            }
        });

        const cardNumber = document.getElementById('cardNumber');
        if (cardNumber) {
            cardNumber.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\s/g, '').replace(/\D/g, '');
                let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
                e.target.value = formattedValue;
            });
        }

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

        const cardCVV = document.getElementById('cardCVV');
        if (cardCVV) {
            cardCVV.addEventListener('input', function(e) {
                e.target.value = e.target.value.replace(/\D/g, '');
            });
        }

        const phoneInputs = [document.getElementById('gcashNumber'), document.getElementById('paymayaNumber')];
        phoneInputs.forEach(input => {
            if (input) {
                input.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.startsWith('63')) {
                        value = value.substring(2);
                    } else if (value.startsWith('0')) {
                        value = value.substring(1);
                    }
                    if (value.length > 0) {
                        e.target.value = '+63 ' + value.replace(/(\d{3})(\d{3})(\d{4})/, '$1 $2 $3').trim();
                    }
                });
            }
        });

        updateFeeBreakdown();
    });

    function changeStep(direction) {
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
                const reason = document.querySelector('select[name="reason"]').value;
                
            }
        }

        document.getElementById('step' + currentStep).classList.remove('active');
        document.querySelector(`.step[data-step="${currentStep}"]`).classList.remove('active');

        currentStep += direction;

        document.getElementById('step' + currentStep).classList.add('active');
        document.querySelector(`.step[data-step="${currentStep}"]`).classList.add('active');

        for (let i = 1; i < currentStep; i++) {
            document.querySelector(`.step[data-step="${i}"]`).classList.add('active', 'completed');
        }

        document.getElementById('prevBtn').style.display = currentStep === 1 ? 'none' : 'block';
        document.getElementById('nextBtn').style.display = currentStep === totalSteps ? 'none' : 'block';
        document.getElementById('submitBtn').style.display = currentStep === totalSteps ? 'block' : 'none';

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    document.getElementById('bookingForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const paymentMethod = document.getElementById('paymentMethodInput').value;
        if (!paymentMethod) {
            alert('Please select a payment method');
            return;
        }

        if (paymentMethod === 'credit-card') {
            const cardNumber = document.getElementById('cardNumber').value.replace(/\s/g, '');
            const cardExpiry = document.getElementById('cardExpiry').value;
            const cardCVV = document.getElementById('cardCVV').value;
            const cardholderName = document.getElementById('cardholderName').value;

            if (!cardNumber || cardNumber.length < 13) {
                alert('Please enter a valid credit card number');
                return;
            }
            if (!cardExpiry || cardExpiry.length !== 5) {
                alert('Please enter a valid expiry date (MM/YY)');
                return;
            }
            if (!cardCVV || cardCVV.length < 3) {
                alert('Please enter a valid CVV');
                return;
            }
            if (!cardholderName || cardholderName.trim().length === 0) {
                alert('Please enter the cardholder name');
                return;
            }
        } else if (paymentMethod === 'gcash') {
            const gcashNumber = document.getElementById('gcashNumber').value;
            if (!gcashNumber || gcashNumber.length < 10) {
                alert('Please enter a valid GCash mobile number');
                return;
            }
        } else if (paymentMethod === 'paymaya') {
            const paymayaNumber = document.getElementById('paymayaNumber').value;
            if (!paymayaNumber || paymayaNumber.length < 10) {
                alert('Please enter a valid PayMaya mobile number');
                return;
            }
        }

        if (!selectedScheduleId) {
            alert('Please select a time slot');
            return;
        }

        const formData = new FormData(this);
        formData.append('schedule_id', selectedScheduleId);
        formData.append('consultation_fee', consultationFee);
        formData.append('service_fee', SERVICE_FEE);
        formData.append('total_amount', consultationFee + SERVICE_FEE);

        if (paymentMethod === 'credit-card') {
            formData.append('card_number', document.getElementById('cardNumber').value);
            formData.append('card_expiry', document.getElementById('cardExpiry').value);
            formData.append('card_cvv', document.getElementById('cardCVV').value);
            formData.append('cardholder_name', document.getElementById('cardholderName').value);
        } else if (paymentMethod === 'gcash') {
            formData.append('gcash_number', document.getElementById('gcashNumber').value);
        } else if (paymentMethod === 'paymaya') {
            formData.append('paymaya_number', document.getElementById('paymayaNumber').value);
        }

        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';

        fetch('../../backend/appointment.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Appointment booked successfully! Reference Number: ' + data.reference);
                    window.location.href = 'dashboard.php';
                } else {
                    alert('Error: ' + data.message);
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            })
            .catch(err => {
                console.error('Error:', err);
                alert('An error occurred. Please try again.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
    });
    </script>

</body>

</html>
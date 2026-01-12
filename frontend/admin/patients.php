<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Schedule - Online Appointment Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .schedule-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 1.5rem;
        }
        .day-card {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s;
        }
        .day-card.active {
            border-color: var(--doctor-primary);
            background: var(--doctor-light);
        }
        .time-slot-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #e9ecef;
            border-radius: 20px;
            margin: 0.25rem;
            font-size: 0.875rem;
        }
        .time-slot-badge .remove-btn {
            cursor: pointer;
            margin-left: 0.5rem;
            color: #dc3545;
        }
        .calendar-view {
            background: white;
            border-radius: 8px;
            padding: 1rem;
        }
        .calendar-day {
            aspect-ratio: 1;
            border: 1px solid #dee2e6;
            padding: 0.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .calendar-day:hover {
            background: var(--doctor-light);
        }
        .calendar-day.has-schedule {
            background: #d4edda;
            border-color: #28a745;
        }
        .calendar-day.selected {
            background: var(--doctor-primary);
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-doctor shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php"><i class="bi bi-heart-pulse"></i> Online Appointment Booking System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" href="doctors.php">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php" onclick="return confirm('Are you sure?');"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <div class="d-flex align-items-center gap-2">
                <a href="doctors.php" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
                <div class="flex-grow-1">
                    <h2 class="fw-bold mb-2">Doctor Schedule Management</h2>
                    <p class="mb-0 opacity-90">Dr. Sarah Smith - Cardiology</p>
                </div>
                <button class="btn btn-light" onclick="openAvailabilityModal()">
                    <i class="bi bi-calendar-plus"></i> Set Availability
                </button>
            </div>
        </div>
    </div>

    <div class="container dashboard-content">
        <div class="row">
            <div class="col-lg-8">
                <!-- Weekly Schedule -->
                <div class="schedule-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-semibold mb-0"><i class="bi bi-calendar-week"></i> Weekly Schedule</h5>
                        <button class="btn btn-sm btn-outline-primary" onclick="saveSchedule()">
                            <i class="bi bi-save"></i> Save Changes
                        </button>
                    </div>

                    <div id="weeklySchedule">
                        <!-- Monday -->
                        <div class="day-card active">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="monday" checked onchange="toggleDay(this, 'mondaySlots')">
                                        <label class="form-check-label fw-semibold" for="monday">Monday</label>
                                    </div>
                                    <div id="mondaySlots">
                                        <span class="time-slot-badge">
                                            09:00 AM - 12:00 PM
                                            <i class="bi bi-x-circle remove-btn" onclick="removeSlot(this)"></i>
                                        </span>
                                        <span class="time-slot-badge">
                                            02:00 PM - 05:00 PM
                                            <i class="bi bi-x-circle remove-btn" onclick="removeSlot(this)"></i>
                                        </span>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="addTimeSlot('mondaySlots')">
                                    <i class="bi bi-plus"></i> Add Slot
                                </button>
                            </div>
                        </div>

                        <!-- Tuesday -->
                        <div class="day-card active">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="tuesday" checked onchange="toggleDay(this, 'tuesdaySlots')">
                                        <label class="form-check-label fw-semibold" for="tuesday">Tuesday</label>
                                    </div>
                                    <div id="tuesdaySlots">
                                        <span class="time-slot-badge">
                                            09:00 AM - 12:00 PM
                                            <i class="bi bi-x-circle remove-btn" onclick="removeSlot(this)"></i>
                                        </span>
                                        <span class="time-slot-badge">
                                            02:00 PM - 05:00 PM
                                            <i class="bi bi-x-circle remove-btn" onclick="removeSlot(this)"></i>
                                        </span>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="addTimeSlot('tuesdaySlots')">
                                    <i class="bi bi-plus"></i> Add Slot
                                </button>
                            </div>
                        </div>

                        <!-- Wednesday -->
                        <div class="day-card active">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="wednesday" checked onchange="toggleDay(this, 'wednesdaySlots')">
                                        <label class="form-check-label fw-semibold" for="wednesday">Wednesday</label>
                                    </div>
                                    <div id="wednesdaySlots">
                                        <span class="time-slot-badge">
                                            09:00 AM - 12:00 PM
                                            <i class="bi bi-x-circle remove-btn" onclick="removeSlot(this)"></i>
                                        </span>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="addTimeSlot('wednesdaySlots')">
                                    <i class="bi bi-plus"></i> Add Slot
                                </button>
                            </div>
                        </div>

                        <!-- Thursday -->
                        <div class="day-card active">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="thursday" checked onchange="toggleDay(this, 'thursdaySlots')">
                                        <label class="form-check-label fw-semibold" for="thursday">Thursday</label>
                                    </div>
                                    <div id="thursdaySlots">
                                        <span class="time-slot-badge">
                                            09:00 AM - 12:00 PM
                                            <i class="bi bi-x-circle remove-btn" onclick="removeSlot(this)"></i>
                                        </span>
                                        <span class="time-slot-badge">
                                            02:00 PM - 05:00 PM
                                            <i class="bi bi-x-circle remove-btn" onclick="removeSlot(this)"></i>
                                        </span>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="addTimeSlot('thursdaySlots')">
                                    <i class="bi bi-plus"></i> Add Slot
                                </button>
                            </div>
                        </div>

                        <!-- Friday -->
                        <div class="day-card active">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="friday" checked onchange="toggleDay(this, 'fridaySlots')">
                                        <label class="form-check-label fw-semibold" for="friday">Friday</label>
                                    </div>
                                    <div id="fridaySlots">
                                        <span class="time-slot-badge">
                                            09:00 AM - 12:00 PM
                                            <i class="bi bi-x-circle remove-btn" onclick="removeSlot(this)"></i>
                                        </span>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="addTimeSlot('fridaySlots')">
                                    <i class="bi bi-plus"></i> Add Slot
                                </button>
                            </div>
                        </div>

                        <!-- Saturday -->
                        <div class="day-card">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="saturday" onchange="toggleDay(this, 'saturdaySlots')">
                                        <label class="form-check-label fw-semibold" for="saturday">Saturday</label>
                                    </div>
                                    <div id="saturdaySlots" style="display:none;"></div>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="addTimeSlot('saturdaySlots')">
                                    <i class="bi bi-plus"></i> Add Slot
                                </button>
                            </div>
                        </div>

                        <!-- Sunday -->
                        <div class="day-card">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="sunday" onchange="toggleDay(this, 'sundaySlots')">
                                        <label class="form-check-label fw-semibold" for="sunday">Sunday</label>
                                    </div>
                                    <div id="sundaySlots" style="display:none;"></div>
                                </div>
                                <button class="btn btn-sm btn-outline-primary" onclick="addTimeSlot('sundaySlots')">
                                    <i class="bi bi-plus"></i> Add Slot
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Leave/Unavailable Dates -->
                <div class="schedule-card">
                    <h5 class="fw-semibold mb-3"><i class="bi bi-calendar-x"></i> Leave/Unavailable Dates</h5>
                    <button class="btn btn-outline-primary w-100 mb-3" onclick="addLeaveDate()">
                        <i class="bi bi-plus-circle"></i> Add Leave Date
                    </button>
                    <div id="leaveDates">
                        <div class="alert alert-warning d-flex justify-content-between align-items-center p-2 mb-2">
                            <div>
                                <small class="fw-semibold d-block">Jan 15, 2026</small>
                                <small class="text-muted">Conference</small>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" onclick="removeLeave(this)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                        <div class="alert alert-warning d-flex justify-content-between align-items-center p-2 mb-2">
                            <div>
                                <small class="fw-semibold d-block">Jan 20, 2026</small>
                                <small class="text-muted">Personal Leave</small>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" onclick="removeLeave(this)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="schedule-card">
                    <h5 class="fw-semibold mb-3"><i class="bi bi-graph-up"></i> Schedule Stats</h5>
                    <div class="mb-2">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Active Days</span>
                            <strong>5 days/week</strong>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Total Hours</span>
                            <strong>32 hours/week</strong>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Upcoming Leaves</span>
                            <strong>2 dates</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Time Slot Modal -->
    <div class="modal fade" id="timeSlotModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-doctor text-white">
                    <h5 class="modal-title"><i class="bi bi-clock"></i> Add Time Slot</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Start Time</label>
                        <input type="time" class="form-control" id="startTime">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Time</label>
                        <input type="time" class="form-control" id="endTime">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-doctor" onclick="confirmTimeSlot()">Add Slot</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Leave Modal -->
    <div class="modal fade" id="leaveModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-doctor text-white">
                    <h5 class="modal-title"><i class="bi bi-calendar-x"></i> Add Leave Date</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" id="leaveDate">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reason</label>
                        <input type="text" class="form-control" id="leaveReason" placeholder="e.g., Conference, Personal Leave">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-doctor" onclick="confirmLeave()">Add Leave</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-doctor mt-5">
        <div class="container py-4">
            <div class="text-center small text-light opacity-75">© 2026 Online Appointment Booking System</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentSlotContainer = '';
        let timeSlotModal, leaveModal;

        document.addEventListener('DOMContentLoaded', function() {
            timeSlotModal = new bootstrap.Modal(document.getElementById('timeSlotModal'));
            leaveModal = new bootstrap.Modal(document.getElementById('leaveModal'));
        });

        function toggleDay(checkbox, slotId) {
            const slotContainer = document.getElementById(slotId);
            const dayCard = checkbox.closest('.day-card');
            if (checkbox.checked) {
                slotContainer.style.display = 'block';
                dayCard.classList.add('active');
            } else {
                slotContainer.style.display = 'none';
                dayCard.classList.remove('active');
            }
        }

        function addTimeSlot(container) {
            currentSlotContainer = container;
            timeSlotModal.show();
        }

        function confirmTimeSlot() {
            const startTime = document.getElementById('startTime').value;
            const endTime = document.getElementById('endTime').value;
            
            if (!startTime || !endTime) {
                alert('Please fill in both start and end times');
                return;
            }

            const container = document.getElementById(currentSlotContainer);
            const slot = document.createElement('span');
            slot.className = 'time-slot-badge';
            slot.innerHTML = `${formatTime(startTime)} - ${formatTime(endTime)} <i class="bi bi-x-circle remove-btn" onclick="removeSlot(this)"></i>`;
            container.appendChild(slot);
            
            timeSlotModal.hide();
            document.getElementById('startTime').value = '';
            document.getElementById('endTime').value = '';
        }

        function formatTime(time) {
            const [hours, minutes] = time.split(':');
            const hour = parseInt(hours);
            const ampm = hour >= 12 ? 'PM' : 'AM';
            const displayHour = hour % 12 || 12;
            return `${displayHour}:${minutes} ${ampm}`;
        }

        function removeSlot(btn) {
            if (confirm('Remove this time slot?')) {
                btn.closest('.time-slot-badge').remove();
            }
        }

        function addLeaveDate() {
            leaveModal.show();
        }

        function confirmLeave() {
            const date = document.getElementById('leaveDate').value;
            const reason = document.getElementById('leaveReason').value;
            
            if (!date || !reason) {
                alert('Please fill in all fields');
                return;
            }

            const container = document.getElementById('leaveDates');
            const leaveDiv = document.createElement('div');
            leaveDiv.className = 'alert alert-warning d-flex justify-content-between align-items-center p-2 mb-2';
            leaveDiv.innerHTML = `
                <div>
                    <small class="fw-semibold d-block">${new Date(date).toLocaleDateString('en-US', {month: 'short', day: 'numeric', year: 'numeric'})}</small>
                    <small class="text-muted">${reason}</small>
                </div>
                <button class="btn btn-sm btn-outline-danger" onclick="removeLeave(this)">
                    <i class="bi bi-trash"></i>
                </button>
            `;
            container.appendChild(leaveDiv);
            
            leaveModal.hide();
            document.getElementById('leaveDate').value = '';
            document.getElementById('leaveReason').value = '';
        }

        function removeLeave(btn) {
            if (confirm('Remove this leave date?')) {
                btn.closest('.alert').remove();
            }
        }

        function saveSchedule() {
            alert('Schedule saved successfully!');
        }

        function openAvailabilityModal() {
            alert('Opening availability settings...');
        }
    </script>
</body>
</html>
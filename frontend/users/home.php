 <!-- Page Header -->
 <div class="page-header">
     <div class="container">
         <div class="d-flex align-items-center">
             <div class="col-md-8">
                 <h2 class="fw-bold mb-2">Welcome back, John!</h2>
                 <p class="mb-0 opacity-90">Manage your appointments and health information in one place.</p>
             </div>
             <div class="col-md-4 text-md-end mt-3 mt-md-0">
                 <button class="btn btn-light btn-lg px-4">
                     <i class="bi bi-calendar-plus"></i> Book New Appointment
                 </button>
             </div>
         </div>
     </div>
 </div>
 <!-- Dashboard Content -->
 <div class="container dashboard-content">

     <!-- Stats Overview -->
     <div class="row g-4">
         <div class="col-md-3 col-sm-6">
             <div class="stat-card">
                 <div class="d-flex align-items-center gap-3">
                     <div class="stat-icon">
                         <i class="bi bi-calendar-check"></i>
                     </div>
                     <div>
                         <h3 class="fw-bold mb-0">3</h3>
                         <p class="text-muted mb-0 small">Upcoming</p>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-md-3 col-sm-6">
             <div class="stat-card">
                 <div class="d-flex align-items-center gap-3">
                     <div class="stat-icon">
                         <i class="bi bi-clock-history"></i>
                     </div>
                     <div>
                         <h3 class="fw-bold mb-0">12</h3>
                         <p class="text-muted mb-0 small">Completed</p>
                     </div>
                 </div>
             </div>
         </div>


         <div class="col-md-3 col-sm-6">
             <div class="stat-card">
                 <div class="d-flex align-items-center gap-3">
                     <div class="stat-icon">
                         <i class="bi bi-credit-card"></i>
                     </div>
                     <div>
                         <h3 class="fw-bold mb-0">₱0</h3>
                         <p class="text-muted mb-0 small">Pending</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <!-- Quick Actions -->
     <div class="row mt-5">
         <div class="col-12">
             <h4 class="fw-semibold mb-4">Quick Actions</h4>
         </div>
         <div class="col-md-4 mb-3">
             <a href="book-appointment.php" class="text-decoration-none">
                 <div class="stat-card text-center">
                     <div class="stat-icon mx-auto mb-3">
                         <i class="bi bi-calendar-plus"></i>
                     </div>
                     <h5 class="fw-semibold text-doctor">Book Appointment</h5>
                     <p class="text-muted small mb-0">Schedule a new appointment with a doctor</p>
                 </div>
             </a>
         </div>
         <div class="col-md-4 mb-3">
             <a href="upcoming-appointments.php" class="text-decoration-none">
                 <div class="stat-card text-center">
                     <div class="stat-icon mx-auto mb-3">
                         <i class="bi bi-clock-history"></i>
                     </div>
                     <h5 class="fw-semibold text-doctor">View Appointments</h5>
                     <p class="text-muted small mb-0">Check your upcoming and past appointments</p>
                 </div>
             </a>
         </div>
         <div class="col-md-4 mb-3">
             <a href="payments.php" class="text-decoration-none">
                 <div class="stat-card text-center">
                     <div class="stat-icon mx-auto mb-3">
                         <i class="bi bi-credit-card"></i>
                     </div>
                     <h5 class="fw-semibold text-doctor">Payment History</h5>
                     <p class="text-muted small mb-0">View billing and payment records</p>
                 </div>
             </a>
         </div>
     </div>
 </div>
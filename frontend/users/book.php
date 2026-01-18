 <link rel="stylesheet" href="../assets/styles/style.css">
 <!-- Page Header -->
 <div class="page-header">
     <div class="container">
         <div class="d-flex align-items-center">
             <a href="dashboard.php" class="text-white text-decoration-none me-3">
                 <i class="bi bi-arrow-left fs-4"></i>
             </a>
             <div>
                 <h2 class="fw-bold mb-1">
                     Book an Appointment
                 </h2>
                 <p class="mb-0 opacity-90">Schedule your visit with our healthcare professionals</p>
             </div>
         </div>
     </div>
 </div>
 <!-- Main Content -->
 <div class="container pb-5">
     <!-- Search and Filter -->
     <div class="search-filter-bar">
         <div class="row g-3">
             <div class="col-md-6">
                 <div class="search-box">
                     <i class="bi bi-search"></i>
                     <input type="text" class="form-control" id="searchInput"
                         placeholder="Search by doctor, specialty, or reason..." onkeyup="searchAppointments()">
                 </div>
             </div>
             <div class="col-md-3">
                 <select class="form-select" style="border-radius: 12px; border: 2px solid #e5e7eb;"
                     onchange="filterByMonth(this.value)">
                     <option value="all">All Months</option>
                     <option value="2026-01">January 2026</option>
                     <option value="2025-12">December 2025</option>
                     <option value="2025-11">November 2025</option>
                     <option value="2025-10">October 2025</option>
                     <option value="2025-09">September 2025</option>
                     <option value="2025-08">August 2025</option>
                 </select>
             </div>
             <div class="col-md-3">
                 <select class="form-select" style="border-radius: 12px; border: 2px solid #e5e7eb;"
                     onchange="filterByRating(this.value)">
                     <option value="all">All Ratings</option>
                     <option value="5">5 Stars</option>
                     <option value="4">4 Stars & Up</option>
                     <option value="3">3 Stars & Up</option>
                 </select>
             </div>
         </div>
     </div>

     <!-- Appointments List -->
     <div id="appointmentsList">
         <!-- Appointment 1 -->
         <div class="appointment-card" data-month="2026-01" data-rating="5">
             <div class="appointment-header">
                 <div class="doctor-info">
                     <div class="doctor-avatar">
                         <i class="bi bi-person-fill"></i>
                     </div>
                     <div>
                         <h5 class="mb-1 fw-bold">Dr. Juan Cruz</h5>
                         <p class="text-muted mb-0 small">Family Medicine</p>
                     </div>
                 </div>
                 <span class="status-badge status-completed">
                     <i class="bi bi-check-circle"></i> Completed
                 </span>
             </div>

             <div class="appointment-details">
                 <div class="detail-item">
                     <i class="bi bi-calendar3"></i>
                     <span>January 8, 2026</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-clock"></i>
                     <span>10:00 AM</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-geo-alt"></i>
                     <span>Room 201, Building A</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-hourglass"></i>
                     <span>30 minutes</span>
                 </div>
             </div>

             <div class="mb-2">
                 <strong class="small text-muted">Reason for Visit:</strong>
                 <p class="mb-0">Annual physical examination and lab work review</p>
             </div>

             <div class="feedback-section">
                 <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                 <div class="rating-display">
                     <div class="star-rating">
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                     </div>
                     <span class="small text-muted">(5.0)</span>
                 </div>
                 <p class="mb-0 small mt-2 text-muted">"Excellent service! Dr. Cruz was very thorough and
                     professional."</p>
             </div>

             <div class="mt-3 d-flex gap-2 flex-wrap">
                 <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(1)">
                     <i class="bi bi-eye"></i> View Details
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(1)">
                     <i class="bi bi-calendar-plus"></i> Book Follow-up
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(1)">
                     <i class="bi bi-file-earmark-pdf"></i> Download Report
                 </button>
             </div>
         </div>

         <!-- Appointment 2 -->
         <div class="appointment-card" data-month="2026-01" data-rating="5">
             <div class="appointment-header">
                 <div class="doctor-info">
                     <div class="doctor-avatar">
                         <i class="bi bi-person-fill"></i>
                     </div>
                     <div>
                         <h5 class="mb-1 fw-bold">Dr. Emily Rodriguez</h5>
                         <p class="text-muted mb-0 small">Dermatology</p>
                     </div>
                 </div>
                 <span class="status-badge status-completed">
                     <i class="bi bi-check-circle"></i> Completed
                 </span>
             </div>

             <div class="appointment-details">
                 <div class="detail-item">
                     <i class="bi bi-calendar3"></i>
                     <span>January 5, 2026</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-clock"></i>
                     <span>2:30 PM</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-geo-alt"></i>
                     <span>Room 315, Building B</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-hourglass"></i>
                     <span>25 minutes</span>
                 </div>
             </div>

             <div class="mb-2">
                 <strong class="small text-muted">Reason for Visit:</strong>
                 <p class="mb-0">Skin condition follow-up and treatment review</p>
             </div>

             <div class="feedback-section">
                 <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                 <div class="rating-display">
                     <div class="star-rating">
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                     </div>
                     <span class="small text-muted">(5.0)</span>
                 </div>
                 <p class="mb-0 small mt-2 text-muted">"Very knowledgeable and caring. My skin has improved
                     significantly!"</p>
             </div>

             <div class="mt-3 d-flex gap-2 flex-wrap">
                 <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(2)">
                     <i class="bi bi-eye"></i> View Details
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(2)">
                     <i class="bi bi-calendar-plus"></i> Book Follow-up
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(2)">
                     <i class="bi bi-file-earmark-pdf"></i> Download Report
                 </button>
             </div>
         </div>

         <!-- Appointment 3 -->
         <div class="appointment-card" data-month="2025-12" data-rating="4">
             <div class="appointment-header">
                 <div class="doctor-info">
                     <div class="doctor-avatar">
                         <i class="bi bi-person-fill"></i>
                     </div>
                     <div>
                         <h5 class="mb-1 fw-bold">Dr. Patricia Gomez</h5>
                         <p class="text-muted mb-0 small">General Dentist</p>
                     </div>
                 </div>
                 <span class="status-badge status-completed">
                     <i class="bi bi-check-circle"></i> Completed
                 </span>
             </div>

             <div class="appointment-details">
                 <div class="detail-item">
                     <i class="bi bi-calendar3"></i>
                     <span>December 20, 2025</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-clock"></i>
                     <span>11:00 AM</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-geo-alt"></i>
                     <span>Room 401, Dental Wing</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-hourglass"></i>
                     <span>45 minutes</span>
                 </div>
             </div>

             <div class="mb-2">
                 <strong class="small text-muted">Reason for Visit:</strong>
                 <p class="mb-0">Routine dental cleaning and checkup</p>
             </div>

             <div class="feedback-section">
                 <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                 <div class="rating-display">
                     <div class="star-rating">
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star"></i>
                     </div>
                     <span class="small text-muted">(4.0)</span>
                 </div>
                 <p class="mb-0 small mt-2 text-muted">"Great cleaning! Wait time was a bit long though."</p>
             </div>

             <div class="mt-3 d-flex gap-2 flex-wrap">
                 <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(3)">
                     <i class="bi bi-eye"></i> View Details
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(3)">
                     <i class="bi bi-calendar-plus"></i> Book Follow-up
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(3)">
                     <i class="bi bi-file-earmark-pdf"></i> Download Report
                 </button>
             </div>
         </div>

         <!-- Appointment 4 -->
         <div class="appointment-card" data-month="2025-11" data-rating="5">
             <div class="appointment-header">
                 <div class="doctor-info">
                     <div class="doctor-avatar">
                         <i class="bi bi-person-fill"></i>
                     </div>
                     <div>
                         <h5 class="mb-1 fw-bold">Dr. Robert Chen</h5>
                         <p class="text-muted mb-0 small">Cardiologist</p>
                     </div>
                 </div>
                 <span class="status-badge status-completed">
                     <i class="bi bi-check-circle"></i> Completed
                 </span>
             </div>

             <div class="appointment-details">
                 <div class="detail-item">
                     <i class="bi bi-calendar3"></i>
                     <span>November 15, 2025</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-clock"></i>
                     <span>9:30 AM</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-geo-alt"></i>
                     <span>Room 305, Building B</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-hourglass"></i>
                     <span>40 minutes</span>
                 </div>
             </div>

             <div class="mb-2">
                 <strong class="small text-muted">Reason for Visit:</strong>
                 <p class="mb-0">Heart health screening and blood pressure monitoring</p>
             </div>

             <div class="feedback-section">
                 <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                 <div class="rating-display">
                     <div class="star-rating">
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                     </div>
                     <span class="small text-muted">(5.0)</span>
                 </div>
                 <p class="mb-0 small mt-2 text-muted">"Dr. Chen is amazing! Very detailed explanation of my heart
                     health."</p>
             </div>

             <div class="mt-3 d-flex gap-2 flex-wrap">
                 <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(4)">
                     <i class="bi bi-eye"></i> View Details
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(4)">
                     <i class="bi bi-calendar-plus"></i> Book Follow-up
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(4)">
                     <i class="bi bi-file-earmark-pdf"></i> Download Report
                 </button>
             </div>
         </div>

         <!-- Appointment 5 -->
         <div class="appointment-card" data-month="2025-09" data-rating="5">
             <div class="appointment-header">
                 <div class="doctor-info">
                     <div class="doctor-avatar">
                         <i class="bi bi-person-fill"></i>
                     </div>
                     <div>
                         <h5 class="mb-1 fw-bold">Dr. Michael Torres</h5>
                         <p class="text-muted mb-0 small">Ophthalmology</p>
                     </div>
                 </div>
                 <span class="status-badge status-completed">
                     <i class="bi bi-check-circle"></i> Completed
                 </span>
             </div>

             <div class="appointment-details">
                 <div class="detail-item">
                     <i class="bi bi-calendar3"></i>
                     <span>September 12, 2025</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-clock"></i>
                     <span>3:15 PM</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-geo-alt"></i>
                     <span>Room 102, Eye Center</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-hourglass"></i>
                     <span>35 minutes</span>
                 </div>
             </div>

             <div class="mb-2">
                 <strong class="small text-muted">Reason for Visit:</strong>
                 <p class="mb-0">Annual eye examination and vision test</p>
             </div>

             <div class="feedback-section">
                 <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                 <div class="rating-display">
                     <div class="star-rating">
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                     </div>
                     <span class="small text-muted">(5.0)</span>
                 </div>
                 <p class="mb-0 small mt-2 text-muted">"Perfect experience. New glasses prescription is spot on!"</p>
             </div>

             <div class="mt-3 d-flex gap-2 flex-wrap">
                 <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(5)">
                     <i class="bi bi-eye"></i> View Details
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(5)">
                     <i class="bi bi-calendar-plus"></i> Book Follow-up
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(5)">
                     <i class="bi bi-file-earmark-pdf"></i> Download Report
                 </button>
             </div>
         </div>

         <!-- Appointment 6 -->
         <div class="appointment-card" data-month="2025-08" data-rating="4">
             <div class="appointment-header">
                 <div class="doctor-info">
                     <div class="doctor-avatar">
                         <i class="bi bi-person-fill"></i>
                     </div>
                     <div>
                         <h5 class="mb-1 fw-bold">Dr. Lisa Anderson</h5>
                         <p class="text-muted mb-0 small">Endocrinology</p>
                     </div>
                 </div>
                 <span class="status-badge status-completed">
                     <i class="bi bi-check-circle"></i> Completed
                 </span>
             </div>

             <div class="appointment-details">
                 <div class="detail-item">
                     <i class="bi bi-calendar3"></i>
                     <span>August 5, 2025</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-clock"></i>
                     <span>10:45 AM</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-geo-alt"></i>
                     <span>Room 204, Building C</span>
                 </div>
                 <div class="detail-item">
                     <i class="bi bi-hourglass"></i>
                     <span>40 minutes</span>
                 </div>
             </div>

             <div class="mb-2">
                 <strong class="small text-muted">Reason for Visit:</strong>
                 <p class="mb-0">Diabetes management and medication review</p>
             </div>

             <div class="feedback-section">
                 <strong class="small text-muted d-block mb-2">Your Feedback:</strong>
                 <div class="rating-display">
                     <div class="star-rating">
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star-fill"></i>
                         <i class="bi bi-star"></i>
                     </div>
                     <span class="small text-muted">(4.0)</span>
                 </div>
                 <p class="mb-0 small mt-2 text-muted">"Good consultation. Helped me adjust my medication schedule."
                 </p>
             </div>

             <div class="mt-3 d-flex gap-2 flex-wrap">
                 <button class="btn btn-outline-doctor btn-sm" onclick="viewDetails(6)">
                     <i class="bi bi-eye"></i> View Details
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="bookFollowUp(6)">
                     <i class="bi bi-calendar-plus"></i> Book Follow-up
                 </button>
                 <button class="btn btn-outline-doctor btn-sm" onclick="downloadReport(6)">
                     <i class="bi bi-file-earmark-pdf"></i> Download Report
                 </button>
             </div>
         </div>
     </div>

     <!-- Empty State -->
     <div id="emptyState" class="empty-state" style="display: none;">
         <i class="bi bi-inbox"></i>
         <h4 class="text-muted">No appointments found</h4>
         <p class="text-muted">Try adjusting your search or filters</p>
     </div>
 </div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inventory Management - Online Appointment Booking System</title>
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

        

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .icon-blue { background: #e7f1ff; color: #0d6efd; }
        .icon-green { background: #d1f2eb; color: #28a745; }
        .icon-orange { background: #fff3cd; color: #fd7e14; }
        .icon-red { background: #f8d7da; color: #dc3545; }

        .filter-section {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
        }

        .item-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 1rem;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        .item-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            border-left-color: var(--doctor-primary);
        }

        .item-card.low-stock {
            border-left-color: #ffc107;
            background: #fffbf0;
        }

        .item-card.out-of-stock {
            border-left-color: #dc3545;
            background: #fff5f5;
        }

        .stock-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .category-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .btn-action {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            border-radius: 6px;
            margin: 0 0.2rem;
        }

        .table-inventory {
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .table-inventory thead {
            background: linear-gradient(135deg, var(--doctor-primary) 0%, var(--doctor-dark) 100%);
            color: white;
        }

       

        .item-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #6c757d;
        }

        .stock-indicator {
            width: 100%;
            height: 6px;
            background: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
            margin-top: 0.5rem;
        }

        .stock-fill {
            height: 100%;
            transition: width 0.3s;
        }

        .stock-fill.high { background: #28a745; }
        .stock-fill.medium { background: #ffc107; }
        .stock-fill.low { background: #dc3545; }

        .modal-lg {
            max-width: 800px;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quantity-btn {
            width: 35px;
            height: 35px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .view-toggle {
            background: white;
            border-radius: 8px;
            padding: 0.3rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .view-toggle .btn {
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
        }

        .view-toggle .btn.active {
            background: var(--doctor-primary);
            color: white;
        }

        .alert-custom {
            border-left: 4px solid;
            border-radius: 8px;
        }

        .alert-custom.alert-warning {
            border-left-color: #ffc107;
            background: #fff9e6;
        }

        .alert-custom.alert-danger {
            border-left-color: #dc3545;
            background: #ffe6e6;
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
                        <a class="nav-link" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="inventory.php">Inventory</a>
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
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold mb-2">Inventory Management</h2>
                    <p class="mb-0 opacity-90">Manage medical supplies, equipment, and medicines</p>
                </div>
                <div>
                    <button class="btn btn-light me-2" onclick="downloadInventoryReport()">
                        <i class="bi bi-download"></i> Export
                    </button>
                    <button class="btn btn-warning text-dark" data-bs-toggle="modal" data-bs-target="#addItemModal">
                        <i class="bi bi-plus-circle"></i> Add New Item
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Alerts -->
        <div id="alertContainer"></div>

        <!-- Statistics Cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="stat-icon icon-blue mx-auto">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h3 class="fw-bold mb-1" id="totalItems">245</h3>
                    <p class="text-muted mb-0 small">Total Items</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="stat-icon icon-green mx-auto">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h3 class="fw-bold mb-1" id="inStock">198</h3>
                    <p class="text-muted mb-0 small">In Stock</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="stat-icon icon-orange mx-auto">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                    <h3 class="fw-bold mb-1" id="lowStock">32</h3>
                    <p class="text-muted mb-0 small">Low Stock</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card text-center">
                    <div class="stat-icon icon-red mx-auto">
                        <i class="bi bi-x-circle"></i>
                    </div>
                    <h3 class="fw-bold mb-1" id="outOfStock">15</h3>
                    <p class="text-muted mb-0 small">Out of Stock</p>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="filter-section">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-semibold small">Search Item</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" id="searchInput" placeholder="Name, Code, or Category">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Category</label>
                    <select class="form-select" id="categoryFilter">
                        <option value="">All Categories</option>
                        <option value="medicines">Medicines</option>
                        <option value="equipment">Medical Equipment</option>
                        <option value="supplies">Medical Supplies</option>
                        <option value="surgical">Surgical Instruments</option>
                        <option value="ppe">PPE & Safety</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small">Stock Status</label>
                    <select class="form-select" id="stockFilter">
                        <option value="">All Status</option>
                        <option value="in-stock">In Stock</option>
                        <option value="low-stock">Low Stock</option>
                        <option value="out-of-stock">Out of Stock</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" onclick="applyFilters()">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                </div>
            </div>
        </div>

        <!-- View Toggle and Actions -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="view-toggle">
                <button class="btn btn-sm active" id="cardViewBtn" onclick="switchView('card')">
                    <i class="bi bi-grid-3x3-gap"></i> Card View
                </button>
                <button class="btn btn-sm" id="tableViewBtn" onclick="switchView('table')">
                    <i class="bi bi-table"></i> Table View
                </button>
            </div>
            <span class="text-muted small">Showing <span id="showingCount">10</span> of <span id="filteredCount">245</span> items</span>
        </div>

        <!-- Card View -->
        <div id="cardView">
            <div class="row g-3" id="itemsCardContainer">
                <!-- Items will be populated by JavaScript -->
            </div>
        </div>

        <!-- Table View -->
        <div id="tableView" style="display: none;">
            <div class="table-responsive">
                <table class="table table-hover table-inventory">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Current Stock</th>
                            <th>Min. Stock</th>
                            <th>Unit Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="itemsTableBody">
                        <!-- Items will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Add Item Modal -->
    <div class="modal fade" id="addItemModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Add New Item</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addItemForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Item Code *</label>
                                <input type="text" class="form-control" id="itemCode" required placeholder="e.g., MED-001">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Item Name *</label>
                                <input type="text" class="form-control" id="itemName" required placeholder="e.g., Paracetamol 500mg">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Category *</label>
                                <select class="form-select" id="itemCategory" required>
                                    <option value="">Select Category</option>
                                    <option value="medicines">Medicines</option>
                                    <option value="equipment">Medical Equipment</option>
                                    <option value="supplies">Medical Supplies</option>
                                    <option value="surgical">Surgical Instruments</option>
                                    <option value="ppe">PPE & Safety</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Unit *</label>
                                <input type="text" class="form-control" id="itemUnit" required placeholder="e.g., Tablets, Boxes, Pieces">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Current Stock *</label>
                                <input type="number" class="form-control" id="currentStock" required min="0" placeholder="0">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Minimum Stock *</label>
                                <input type="number" class="form-control" id="minStock" required min="0" placeholder="10">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Unit Price (₱) *</label>
                                <input type="number" class="form-control" id="unitPrice" required min="0" step="0.01" placeholder="0.00">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Supplier</label>
                                <input type="text" class="form-control" id="supplier" placeholder="Supplier name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Expiry Date</label>
                                <input type="date" class="form-control" id="expiryDate">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea class="form-control" id="description" rows="3" placeholder="Item description, usage notes, etc."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveNewItem()">
                        <i class="bi bi-check-lg"></i> Save Item
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Item Modal -->
    <div class="modal fade" id="editItemModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title"><i class="bi bi-pencil"></i> Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="editItemContent">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- Manage Stock Modal -->
    <div class="modal fade" id="manageStockModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="bi bi-box-seam"></i> Manage Stock</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="manageStockContent">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- View Details Modal -->
    <div class="modal fade" id="viewDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title"><i class="bi bi-info-circle"></i> Item Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="viewDetailsContent">
                    <!-- Content will be loaded dynamically -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        // Sample inventory data
        let inventoryItems = [
            { id: 1, code: 'MED-001', name: 'Paracetamol 500mg', category: 'medicines', unit: 'Tablets', currentStock: 500, minStock: 100, unitPrice: 2.50, supplier: 'MedSupply Inc.', expiryDate: '2026-12-31', description: 'Pain reliever and fever reducer' },
            { id: 2, code: 'MED-002', name: 'Amoxicillin 500mg', category: 'medicines', unit: 'Capsules', currentStock: 300, minStock: 100, unitPrice: 5.00, supplier: 'PharmaCorp', expiryDate: '2026-08-15', description: 'Antibiotic for bacterial infections' },
            { id: 3, code: 'EQ-001', name: 'Digital Thermometer', category: 'equipment', unit: 'Pieces', currentStock: 25, minStock: 10, unitPrice: 350.00, supplier: 'MedTech Solutions', expiryDate: null, description: 'Non-contact infrared thermometer' },
            { id: 4, code: 'SUP-001', name: 'Surgical Gloves (M)', category: 'supplies', unit: 'Boxes', currentStock: 45, minStock: 20, unitPrice: 450.00, supplier: 'SafetyFirst Corp', expiryDate: '2027-03-01', description: 'Latex-free surgical gloves, Medium size' },
            { id: 5, code: 'MED-003', name: 'Ibuprofen 400mg', category: 'medicines', unit: 'Tablets', currentStock: 15, minStock: 50, unitPrice: 3.50, supplier: 'MedSupply Inc.', expiryDate: '2026-10-20', description: 'Anti-inflammatory pain reliever' },
            { id: 6, code: 'PPE-001', name: 'Face Masks (Surgical)', category: 'ppe', unit: 'Boxes', currentStock: 0, minStock: 30, unitPrice: 250.00, supplier: 'ProtectAll Ltd', expiryDate: null, description: '3-ply disposable face masks, 50pcs per box' },
            { id: 7, code: 'EQ-002', name: 'Blood Pressure Monitor', category: 'equipment', unit: 'Pieces', currentStock: 8, minStock: 5, unitPrice: 2500.00, supplier: 'MedTech Solutions', expiryDate: null, description: 'Digital BP monitor with large display' },
            { id: 8, code: 'MED-004', name: 'Insulin (Regular)', category: 'medicines', unit: 'Vials', currentStock: 42, minStock: 20, unitPrice: 850.00, supplier: 'DiabetesCare Pharma', expiryDate: '2026-06-30', description: 'Fast-acting insulin for diabetes management' },
            { id: 9, code: 'SUR-001', name: 'Surgical Scissors', category: 'surgical', unit: 'Pieces', currentStock: 12, minStock: 5, unitPrice: 680.00, supplier: 'SurgiPro Equipment', expiryDate: null, description: 'Stainless steel surgical scissors' },
            { id: 10, code: 'SUP-002', name: 'Sterile Gauze Pads', category: 'supplies', unit: 'Boxes', currentStock: 65, minStock: 30, unitPrice: 180.00, supplier: 'WoundCare Supplies', expiryDate: '2027-01-15', description: '4x4 inch sterile gauze pads, 100pcs per box' },
        ];

        function getStockStatus(item) {
            if (item.currentStock === 0) return 'out-of-stock';
            if (item.currentStock <= item.minStock) return 'low-stock';
            return 'in-stock';
        }

        function getStockBadge(status) {
            if (status === 'out-of-stock') return '<span class="stock-badge bg-danger text-white">Out of Stock</span>';
            if (status === 'low-stock') return '<span class="stock-badge bg-warning text-dark">Low Stock</span>';
            return '<span class="stock-badge bg-success text-white">In Stock</span>';
        }

        function getCategoryIcon(category) {
            const icons = {
                'medicines': 'bi-capsule',
                'equipment': 'bi-hdd-rack',
                'supplies': 'bi-bandaid',
                'surgical': 'bi-scissors',
                'ppe': 'bi-shield-check'
            };
            return icons[category] || 'bi-box';
        }

        function getCategoryColor(category) {
            const colors = {
                'medicines': 'primary',
                'equipment': 'success',
                'supplies': 'info',
                'surgical': 'danger',
                'ppe': 'warning'
            };
            return colors[category] || 'secondary';
        }

        function renderCardView() {
            const container = document.getElementById('itemsCardContainer');
            container.innerHTML = '';

            inventoryItems.forEach(item => {
                const status = getStockStatus(item);
                const stockPercentage = (item.currentStock / (item.minStock * 2)) * 100;
                const stockClass = status === 'out-of-stock' ? 'low' : status === 'low-stock' ? 'medium' : 'high';
                const categoryColor = getCategoryColor(item.category);
                const categoryIcon = getCategoryIcon(item.category);

                const card = `
                    <div class="col-md-6 col-lg-4">
                        <div class="item-card ${status}">
                            <div class="d-flex align-items-start mb-3">
                                <div class="item-image me-3">
                                    <i class="bi ${categoryIcon}"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h6 class="fw-bold mb-1">${item.name}</h6>
                                            <p class="text-muted small mb-0">Code: ${item.code}</p>
                                        </div>
                                        ${getStockBadge(status)}
                                    </div>
                                    <span class="badge bg-${categoryColor} category-badge">
                                        <i class="bi ${categoryIcon}"></i> ${item.category.charAt(0).toUpperCase() + item.category.slice(1)}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <small class="text-muted d-block">Current Stock</small>
                                    <strong class="text-${status === 'out-of-stock' ? 'danger' : status === 'low-stock' ? 'warning' : 'success'}">${item.currentStock} ${item.unit}</strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Min. Stock</small>
                                    <strong>${item.minStock} ${item.unit}</strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Unit Price</small>
                                    <strong>₱${item.unitPrice.toFixed(2)}</strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Total Value</small>
                                    <strong>₱${(item.currentStock * item.unitPrice).toLocaleString('en-PH', {minimumFractionDigits: 2})}</strong>
                                </div>
                            </div>

                            <div class="stock-indicator">
                                <div class="stock-fill ${stockClass}" style="width: ${Math.min(stockPercentage, 100)}%"></div>
                            </div>

                            <div class="d-flex justify-content-between mt-3">
                                <button class="btn btn-sm btn-info btn-action" onclick="viewItemDetails(${item.id})">
                                    <i class="bi bi-eye"></i> View
                                </button>
                                <button class="btn btn-sm btn-warning btn-action" onclick="editItem(${item.id})">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-success btn-action" onclick="manageStock(${item.id})">
                                    <i class="bi bi-box-seam"></i> Stock
                                </button>
                                <button class="btn btn-sm btn-danger btn-action" onclick="deleteItem(${item.id})">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += card;
            });
        }

        function renderTableView() {
            const tbody = document.getElementById('itemsTableBody');
            tbody.innerHTML = '';

            inventoryItems.forEach(item => {
                const status = getStockStatus(item);
                const categoryColor = getCategoryColor(item.category);
                const categoryIcon = getCategoryIcon(item.category);

                const row = `
                    <tr>
                        <td>
                            <div class="item-image">
                                <i class="bi ${categoryIcon}"></i>
                            </div>
                        </td>
                        <td><strong>${item.code}</strong></td>
                        <td>${item.name}</td>
                        <td>
                            <span class="badge bg-${categoryColor} category-badge">
                                ${item.category.charAt(0).toUpperCase() + item.category.slice(1)}
                            </span>
                        </td>
                        <td>
                            <strong class="text-${status === 'out-of-stock' ? 'danger' : status === 'low-stock' ? 'warning' : 'success'}">
                                ${item.currentStock} ${item.unit}
                            </strong>
                        </td>
                        <td>${item.minStock} ${item.unit}</td>
                        <td>₱${item.unitPrice.toFixed(2)}</td>
                        <td>${getStockBadge(status)}</td>
                        <td>
                            <button class="btn btn-sm btn-info btn-action" onclick="viewItemDetails(${item.id})" title="View Details">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-warning btn-action" onclick="editItem(${item.id})" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-success btn-action" onclick="manageStock(${item.id})" title="Manage Stock">
                                <i class="bi bi-box-seam"></i>
                            </button>
                            <button class="btn btn-sm btn-danger btn-action" onclick="deleteItem(${item.id})" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });
        }

        function switchView(view) {
            const cardView = document.getElementById('cardView');
            const tableView = document.getElementById('tableView');
            const cardBtn = document.getElementById('cardViewBtn');
            const tableBtn = document.getElementById('tableViewBtn');

            if (view === 'card') {
                cardView.style.display = 'block';
                tableView.style.display = 'none';
                cardBtn.classList.add('active');
                tableBtn.classList.remove('active');
            } else {
                cardView.style.display = 'none';
                tableView.style.display = 'block';
                tableBtn.classList.add('active');
                cardBtn.classList.remove('active');
                renderTableView();
            }
        }

        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const category = document.getElementById('categoryFilter').value;
            const stockStatus = document.getElementById('stockFilter').value;

            let filtered = [...inventoryItems];

            if (searchTerm) {
                filtered = filtered.filter(item => 
                    item.name.toLowerCase().includes(searchTerm) ||
                    item.code.toLowerCase().includes(searchTerm) ||
                    item.category.toLowerCase().includes(searchTerm)
                );
            }

            if (category) {
                filtered = filtered.filter(item => item.category === category);
            }

            if (stockStatus) {
                filtered = filtered.filter(item => getStockStatus(item) === stockStatus);
            }

            inventoryItems = filtered;
            document.getElementById('filteredCount').textContent = filtered.length;
            document.getElementById('showingCount').textContent = Math.min(filtered.length, 10);
            
            renderCardView();
            checkLowStock();
        }

        function viewItemDetails(id) {
            const item = inventoryItems.find(i => i.id === id);
            if (!item) return;

            const status = getStockStatus(item);
            const categoryIcon = getCategoryIcon(item.category);
            const categoryColor = getCategoryColor(item.category);

            const content = `
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="text-center">
                            <div class="item-image mx-auto mb-3" style="width: 120px; height: 120px; font-size: 3rem;">
                                <i class="bi ${categoryIcon}"></i>
                            </div>
                            <h5 class="fw-bold">${item.name}</h5>
                            <p class="text-muted mb-2">Code: ${item.code}</p>
                            ${getStockBadge(status)}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="fw-bold mb-3">Item Information</h6>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <small class="text-muted">Category</small>
                                <p class="mb-0">
                                    <span class="badge bg-${categoryColor} category-badge">
                                        <i class="bi ${categoryIcon}"></i> ${item.category.charAt(0).toUpperCase() + item.category.slice(1)}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">Unit</small>
                                <p class="mb-0 fw-semibold">${item.unit}</p>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">Current Stock</small>
                                <p class="mb-0 fw-semibold text-${status === 'out-of-stock' ? 'danger' : status === 'low-stock' ? 'warning' : 'success'}">${item.currentStock} ${item.unit}</p>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">Minimum Stock</small>
                                <p class="mb-0 fw-semibold">${item.minStock} ${item.unit}</p>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">Unit Price</small>
                                <p class="mb-0 fw-semibold">₱${item.unitPrice.toFixed(2)}</p>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">Total Value</small>
                                <p class="mb-0 fw-semibold text-primary">₱${(item.currentStock * item.unitPrice).toLocaleString('en-PH', {minimumFractionDigits: 2})}</p>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">Supplier</small>
                                <p class="mb-0 fw-semibold">${item.supplier || 'N/A'}</p>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted">Expiry Date</small>
                                <p class="mb-0 fw-semibold">${item.expiryDate ? new Date(item.expiryDate).toLocaleDateString() : 'N/A'}</p>
                            </div>
                            <div class="col-12">
                                <small class="text-muted">Description</small>
                                <p class="mb-0">${item.description || 'No description available'}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('viewDetailsContent').innerHTML = content;
            const modal = new bootstrap.Modal(document.getElementById('viewDetailsModal'));
            modal.show();
        }

        function editItem(id) {
            const item = inventoryItems.find(i => i.id === id);
            if (!item) return;

            const content = `
                <form id="editItemForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Item Code *</label>
                            <input type="text" class="form-control" value="${item.code}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Item Name *</label>
                            <input type="text" class="form-control" value="${item.name}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Category *</label>
                            <select class="form-select" required>
                                <option value="medicines" ${item.category === 'medicines' ? 'selected' : ''}>Medicines</option>
                                <option value="equipment" ${item.category === 'equipment' ? 'selected' : ''}>Medical Equipment</option>
                                <option value="supplies" ${item.category === 'supplies' ? 'selected' : ''}>Medical Supplies</option>
                                <option value="surgical" ${item.category === 'surgical' ? 'selected' : ''}>Surgical Instruments</option>
                                <option value="ppe" ${item.category === 'ppe' ? 'selected' : ''}>PPE & Safety</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Unit *</label>
                            <input type="text" class="form-control" value="${item.unit}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Current Stock *</label>
                            <input type="number" class="form-control" value="${item.currentStock}" required min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Minimum Stock *</label>
                            <input type="number" class="form-control" value="${item.minStock}" required min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Unit Price (₱) *</label>
                            <input type="number" class="form-control" value="${item.unitPrice}" required min="0" step="0.01">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Supplier</label>
                            <input type="text" class="form-control" value="${item.supplier || ''}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Expiry Date</label>
                            <input type="date" class="form-control" value="${item.expiryDate || ''}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" rows="3">${item.description || ''}</textarea>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" onclick="saveEditItem(${item.id})">
                        <i class="bi bi-check-lg"></i> Update Item
                    </button>
                </div>
            `;

            document.getElementById('editItemContent').innerHTML = content;
            const modal = new bootstrap.Modal(document.getElementById('editItemModal'));
            modal.show();
        }

        function manageStock(id) {
            const item = inventoryItems.find(i => i.id === id);
            if (!item) return;

            const content = `
                <div class="text-center mb-4">
                    <h5 class="fw-bold">${item.name}</h5>
                    <p class="text-muted mb-2">Code: ${item.code}</p>
                    <div class="alert alert-info">
                        <strong>Current Stock:</strong> ${item.currentStock} ${item.unit}
                    </div>
                </div>

                <form id="stockForm">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Action *</label>
                        <select class="form-select" id="stockAction" onchange="toggleStockFields()">
                            <option value="">Select Action</option>
                            <option value="add">Add Stock (Restock)</option>
                            <option value="remove">Remove Stock (Usage/Damage)</option>
                            <option value="set">Set Stock (Adjust to Exact Amount)</option>
                        </select>
                    </div>

                    <div id="stockFields" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Quantity *</label>
                            <input type="number" class="form-control" id="stockQuantity" min="1" placeholder="Enter quantity">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Reason</label>
                            <textarea class="form-control" id="stockReason" rows="2" placeholder="e.g., Monthly restock, Expired items removed, Stock audit adjustment"></textarea>
                        </div>

                        <div class="alert alert-warning" id="newStockPreview" style="display: none;">
                            <strong>New Stock Level:</strong> <span id="newStockValue"></span> ${item.unit}
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="saveStockChange(${item.id})" id="saveStockBtn" disabled>
                        <i class="bi bi-check-lg"></i> Update Stock
                    </button>
                </div>
            `;

            document.getElementById('manageStockContent').innerHTML = content;
            const modal = new bootstrap.Modal(document.getElementById('manageStockModal'));
            modal.show();

            // Add event listeners for real-time preview
            setTimeout(() => {
                document.getElementById('stockQuantity')?.addEventListener('input', updateStockPreview);
                document.getElementById('stockAction')?.addEventListener('change', updateStockPreview);
            }, 100);

            function updateStockPreview() {
                const action = document.getElementById('stockAction').value;
                const quantity = parseInt(document.getElementById('stockQuantity').value) || 0;
                const preview = document.getElementById('newStockPreview');
                const value = document.getElementById('newStockValue');
                const saveBtn = document.getElementById('saveStockBtn');

                if (action && quantity > 0) {
                    let newStock = item.currentStock;
                    if (action === 'add') newStock += quantity;
                    else if (action === 'remove') newStock = Math.max(0, newStock - quantity);
                    else if (action === 'set') newStock = quantity;

                    value.textContent = newStock;
                    preview.style.display = 'block';
                    saveBtn.disabled = false;
                } else {
                    preview.style.display = 'none';
                    saveBtn.disabled = true;
                }
            }
        }

        function toggleStockFields() {
            const action = document.getElementById('stockAction').value;
            const fields = document.getElementById('stockFields');
            fields.style.display = action ? 'block' : 'none';
        }

        function saveStockChange(id) {
            const item = inventoryItems.find(i => i.id === id);
            const action = document.getElementById('stockAction').value;
            const quantity = parseInt(document.getElementById('stockQuantity').value) || 0;
            const reason = document.getElementById('stockReason').value;

            if (action === 'add') {
                item.currentStock += quantity;
            } else if (action === 'remove') {
                item.currentStock = Math.max(0, item.currentStock - quantity);
            } else if (action === 'set') {
                item.currentStock = quantity;
            }

            showAlert('success', `Stock updated successfully! New stock level: ${item.currentStock} ${item.unit}`);
            bootstrap.Modal.getInstance(document.getElementById('manageStockModal')).hide();
            renderCardView();
            updateStats();
            checkLowStock();
        }

        function saveEditItem(id) {
            showAlert('success', 'Item updated successfully!');
            bootstrap.Modal.getInstance(document.getElementById('editItemModal')).hide();
            renderCardView();
        }

        function saveNewItem() {
            const code = document.getElementById('itemCode').value;
            const name = document.getElementById('itemName').value;
            const category = document.getElementById('itemCategory').value;
            const unit = document.getElementById('itemUnit').value;
            const currentStock = parseInt(document.getElementById('currentStock').value);
            const minStock = parseInt(document.getElementById('minStock').value);
            const unitPrice = parseFloat(document.getElementById('unitPrice').value);
            const supplier = document.getElementById('supplier').value;
            const expiryDate = document.getElementById('expiryDate').value;
            const description = document.getElementById('description').value;

            if (!code || !name || !category || !unit || currentStock < 0 || minStock < 0 || unitPrice < 0) {
                showAlert('danger', 'Please fill in all required fields correctly!');
                return;
            }

            const newItem = {
                id: inventoryItems.length + 1,
                code, name, category, unit, currentStock, minStock, unitPrice,
                supplier, expiryDate: expiryDate || null, description
            };

            inventoryItems.push(newItem);
            showAlert('success', `Item "${name}" added successfully!`);
            bootstrap.Modal.getInstance(document.getElementById('addItemModal')).hide();
            document.getElementById('addItemForm').reset();
            renderCardView();
            updateStats();
            checkLowStock();
        }

        function deleteItem(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                inventoryItems = inventoryItems.filter(i => i.id !== id);
                showAlert('success', 'Item deleted successfully!');
                renderCardView();
                updateStats();
            }
        }

        function showAlert(type, message) {
            const alertContainer = document.getElementById('alertContainer');
            const alert = `
                <div class="alert alert-${type} alert-dismissible fade show alert-custom" role="alert">
                    <i class="bi bi-${type === 'success' ? 'check-circle' : type === 'danger' ? 'x-circle' : 'info-circle'}"></i>
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            alertContainer.innerHTML = alert;
            setTimeout(() => alertContainer.innerHTML = '', 5000);
        }

        function updateStats() {
            const total = inventoryItems.length;
            const inStock = inventoryItems.filter(i => getStockStatus(i) === 'in-stock').length;
            const lowStock = inventoryItems.filter(i => getStockStatus(i) === 'low-stock').length;
            const outOfStock = inventoryItems.filter(i => getStockStatus(i) === 'out-of-stock').length;

            document.getElementById('totalItems').textContent = total;
            document.getElementById('inStock').textContent = inStock;
            document.getElementById('lowStock').textContent = lowStock;
            document.getElementById('outOfStock').textContent = outOfStock;
        }

        function checkLowStock() {
            const lowStockItems = inventoryItems.filter(i => getStockStatus(i) === 'low-stock');
            const outOfStockItems = inventoryItems.filter(i => getStockStatus(i) === 'out-of-stock');

            if (outOfStockItems.length > 0) {
                const itemNames = outOfStockItems.map(i => i.name).join(', ');
                showAlert('danger', `<strong>Out of Stock Alert:</strong> ${outOfStockItems.length} item(s) are out of stock: ${itemNames}`);
            } else if (lowStockItems.length > 0) {
                const itemNames = lowStockItems.slice(0, 3).map(i => i.name).join(', ');
                showAlert('warning', `<strong>Low Stock Warning:</strong> ${lowStockItems.length} item(s) are running low: ${itemNames}${lowStockItems.length > 3 ? ' and more...' : ''}`);
            }
        }

        function downloadInventoryReport() {
            alert('Exporting inventory report... (This would generate an Excel/PDF file)');
        }

        // Search on Enter key
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                applyFilters();
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            renderCardView();
            updateStats();
            checkLowStock();
        });
    </script>

</body>

</html>
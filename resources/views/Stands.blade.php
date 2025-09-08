<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booth Management | IRYVENT</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #7d5fff;
            --primary-light: #a78bfa;
            --secondary: #6c757d;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --dark: #343a40;
            --light: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: #f5f7fb;
        }
        
        /* Sidebar */
        .sidebar {
            background-color: var(--dark);
            color: white;
            height: 100vh;
            position: fixed;
        }
        
        .sidebar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .sidebar-link {
            color: rgba(255,255,255,0.7);
            transition: all 0.3s;
        }
        
        .sidebar-link:hover, .sidebar-link.active {
            color: white;
            background-color: rgba(255,255,255,0.1);
        }
        
        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        
        /* Booth Cards */
        .booth-card {
            border: none;
            border-radius: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .booth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        
        .booth-img {
            height: 180px;
            object-fit: cover;
        }
        
        .booth-status {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        /* Status Badges */
        .badge-available {
            background-color: var(--success);
        }
        
        .badge-reserved {
            background-color: var(--warning);
            color: var(--dark);
        }
        
        .badge-paid {
            background-color: var(--primary);
        }
        
        /* Floor Plan Container */
        .floor-plan {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            position: relative;
            min-height: 500px;
        }
        
        .booth-spot {
            position: absolute;
            width: 80px;
            height: 80px;
            border: 2px solid var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .booth-spot:hover {
            background-color: rgba(125, 95, 255, 0.1);
        }
        
        .booth-spot.reserved {
            background-color: rgba(255, 193, 7, 0.2);
            border-color: var(--warning);
        }
        
        .booth-spot.paid {
            background-color: rgba(125, 95, 255, 0.2);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar p-3" style="width: 250px;">
        <div class="sidebar-brand d-flex align-items-center mb-4">
            <i class="bi bi-ticket-perforated fs-4 me-2"></i>
            <span>IRYVENT</span>
        </div>
        
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link sidebar-link mb-2 rounded" href="organizer_dashboard.html">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-link mb-2 rounded" href="My_Events.html">
                    <i class="bi bi-calendar-event me-2"></i> My Events
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-link mb-2 rounded" href="Tickets.html">
                    <i class="bi bi-ticket-detailed me-2"></i> Tickets
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-link active mb-2 rounded" href="Booths.Html">
                    <i class="bi bi-shop me-2"></i> Booths
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-link mb-2 rounded" href="Analytics.html">
                    <i class="bi bi-graph-up me-2"></i> Analytics
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Booth Management</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booths</li>
                    </ol>
                </nav>
            </div>
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBoothModal">
                    <i class="bi bi-plus-circle me-2"></i> Add Booth Type
                </button>
            </div>
        </div>
        
        <!-- Filter Bar -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <label for="eventFilter" class="form-label">Event</label>
                        <select class="form-select" id="eventFilter">
                            <option selected>All Events</option>
                            <option>Afro Vibes Festival</option>
                            <option>Tech Summit Africa</option>
                            <option>Art Exhibition</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="boothStatus" class="form-label">Status</label>
                        <select class="form-select" id="boothStatus">
                            <option selected>All Statuses</option>
                            <option>Available</option>
                            <option>Reserved</option>
                            <option>Paid</option>
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button class="btn btn-primary w-100">
                            <i class="bi bi-funnel me-2"></i> Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Total Booths</h6>
                                <h2 class="fw-bold">24</h2>
                            </div>
                            <i class="bi bi-shop fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Available</h6>
                                <h2 class="fw-bold">12</h2>
                                <small>50% of total</small>
                            </div>
                            <i class="bi bi-check-circle fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Revenue Generated</h6>
                                <h2 class="fw-bold">1,800,000 XAF</h2>
                            </div>
                            <i class="bi bi-cash-coin fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Booth Types Section -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold mb-0">Booth Types</h5>
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addBoothModal">
                        <i class="bi bi-plus-lg me-2"></i> Add New Type
                    </button>
                </div>
                
                <div class="row g-4">
                    <!-- Standard Booth -->
                    <div class="col-md-4">
                        <div class="booth-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold">Standard Booth</h5>
                                    <span class="badge bg-primary">Active</span>
                                </div>
                                <p class="card-text text-muted">
                                    <i class="bi bi-tag me-2"></i> Price: 50,000 XAF<br>
                                    <i class="bi bi-grid me-2"></i> Size: 3m x 2m<br>
                                    <i class="bi bi-shop me-2"></i> Available: 8/12
                                </p>
                                <div class="mt-4">
                                    <h6 class="fw-bold">Includes:</h6>
                                    <ul class="list-unstyled text-muted">
                                        <li><i class="bi bi-check-circle text-success me-2"></i> Basic table</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> 2 chairs</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> Booth sign</li>
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn btn-sm btn-outline-secondary me-2">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Premium Booth -->
                    <div class="col-md-4">
                        <div class="booth-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold">Premium Booth</h5>
                                    <span class="badge bg-success">Active</span>
                                </div>
                                <p class="card-text text-muted">
                                    <i class="bi bi-tag me-2"></i> Price: 100,000 XAF<br>
                                    <i class="bi bi-grid me-2"></i> Size: 4m x 3m<br>
                                    <i class="bi bi-shop me-2"></i> Available: 3/6
                                </p>
                                <div class="mt-4">
                                    <h6 class="fw-bold">Includes:</h6>
                                    <ul class="list-unstyled text-muted">
                                        <li><i class="bi bi-check-circle text-success me-2"></i> 4 tables</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> 8 chairs</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> Backdrop</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> Electricity</li>
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn btn-sm btn-outline-secondary me-2">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sponsor Booth -->
                    <div class="col-md-4">
                        <div class="booth-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold">Vip Booth</h5>
                                    <span class="badge bg-warning text-dark">Limited</span>
                                </div>
                                <p class="card-text text-muted">
                                    <i class="bi bi-tag me-2"></i> Price: 75,000 XAF<br>
                                    <i class="bi bi-grid me-2"></i> Size: 3m x 3m<br>
                                    <i class="bi bi-shop me-2"></i> Available: 1/3
                                </p>
                                <div class="mt-4">
                                    <h6 class="fw-bold">Includes:</h6>
                                    <ul class="list-unstyled text-muted">
                                        <li><i class="bi bi-check-circle text-success me-2"></i>3 tables </li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> 5 chairs</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> Electricity</li>
                                        
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button class="btn btn-sm btn-outline-secondary me-2">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Floor Plan Section -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold mb-0"></h5>
                    <div>
                        <button class="btn btn-outline-secondary me-2">
                           
                        </button>
                        <button class="btn btn-primary">
                           
                        </button>
                    </div>
                </div>
                
                
            </div>
        </div>
        
        <!-- Reservations Table -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold mb-0">Booth Reservations</h5>
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-plus-lg me-2"></i> New Reservation
                    </button>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Booth ID</th>
                                <th>Type</th>
                                <th>Exhibitor</th>
                                <th>Event</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>P01</td>
                                <td><span class="badge bg-primary">Premium</span></td>
                                <td>MTN Cameroon</td>
                                <td>Tech Summit Africa</td>
                                <td>Nov 22, 2025</td>
                                <td><span class="badge bg-success">Paid</span></td>
                                <td>150,000 XAF</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-receipt"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>S02</td>
                                <td><span class="badge bg-secondary">Standard</span></td>
                                <td>Orange Cameroun</td>
                                <td>Afro Vibes Festival</td>
                                <td>Oct 15, 2025</td>
                                <td><span class="badge bg-warning text-dark">Available</span></td>
                                <td>50,000 XAF</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-credit-card"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>V01</td>
                                <td><span class="badge bg-danger">Vip</span></td>
                                <td>MTN</td>
                                <td>Tech Summit Africa</td>
                                <td>Nov 22, 2025</td>
                                <td><span class="badge bg-success">Reserved</span></td>
                                <td>75,000 XAF</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-receipt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Booth Modal -->
    <div class="modal fade" id="addBoothModal" tabindex="-1" aria-labelledby="addBoothModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBoothModalLabel">Add New Booth Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="boothName" class="form-label">Booth Name</label>
                            <input type="text" class="form-control" id="boothName" placeholder="e.g., Premium Booth">
                        </div>
                        <div class="mb-3">
                            <label for="boothPrice" class="form-label">Price (XAF)</label>
                            <input type="number" class="form-control" id="boothPrice" placeholder="e.g., 150000">
                        </div>
                        <div class="mb-3">
                            <label for="boothSize" class="form-label">Size</label>
                            <input type="text" class="form-control" id="boothSize" placeholder="e.g., 4m x 3m">
                        </div>
                        <div class="mb-3">
                            <label for="boothQuantity" class="form-label">Quantity Available</label>
                            <input type="number" class="form-control" id="boothQuantity" placeholder="e.g., 10">
                        </div>
                        <div class="mb-3">
                            <label for="boothDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="boothDescription" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Includes (check all that apply)</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeTable">
                                <label class="form-check-label" for="includeTable">Table(s)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeChairs">
                                <label class="form-check-label" for="includeChairs">Chair(s)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="includeElectricity">
                                <label class="form-check-label" for="includeElectricity">Electricity</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Booth Type</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
</body>
</html>
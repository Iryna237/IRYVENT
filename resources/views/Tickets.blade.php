@extends('layouts.layout')
@section('content')
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
            margin-left: 130px;
            padding: 20px;
        }
        
        /* Ticket Cards */
        .ticket-card {
            border: none;
            border-radius: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .ticket-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        
        .ticket-type-badge {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        .ticket-qr {
            width: 80px;
            height: 80px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        
        /* Status Badges */
        .badge-valid {
            background-color: var(--success);
        }
        
        .badge-used {
            background-color: var(--secondary);
        }
        
        .badge-refunded {
            background-color: var(--danger);
        }
        
        /* Action Buttons */
        .btn-action {
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        /* Table Styling */
        .tickets-table {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
    </style>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Ticket Management</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tickets</li>
                    </ol>
                </nav>
            </div>
            <div>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i> Add Ticket Type
                </button>
            </div>
        </div>
        
        <!-- Filter Bar -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label for="eventFilter" class="form-label">Event</label>
                        <select class="form-select" id="eventFilter">
                            <option selected>All Events</option>
                            <option>Afro Vibes Festival</option>
                            <option>What About You</option>
                            <option>Contemporary Art Exhibition</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="ticketType" class="form-label">Ticket Type</label>
                        <select class="form-select" id="ticketType">
                            <option selected>All Types</option>
                            <option>VIP</option>
                            <option>Standard</option>
                            <option>Premium</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="ticketStatus" class="form-label">Status</label>
                        <select class="form-select" id="ticketStatus">
                            <option selected>All Statuses</option>
                            <option>Valid</option>
                            <option>Used</option>
                            <option>Valid</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
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
                <div class="ticket-card card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Total Tickets Sold</h6>
                                <h2 class="fw-bold">1,240</h2>
                            </div>
                            <i class="bi bi-ticket-detailed fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="ticket-card card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Valid Tickets</h6>
                                <h2 class="fw-bold">980</h2>
                                <small>79% of total</small>
                            </div>
                            <i class="bi bi-check-circle fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="ticket-card card bg-secondary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Revenue Generated</h6>
                                <h2 class="fw-bold">2,480,000 XAF</h2>
                            </div>
                            <i class="bi bi-cash-coin fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tickets Table -->
        <div class="tickets-table card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold mb-0">Recent Ticket Sales</h5>
                    <div>
                        <button class="btn btn-outline-secondary me-2">
                            <i class="bi bi-download me-2"></i> Export
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-printer me-2"></i> Print
                        </button>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Event</th>
                                <th>Type</th>
                                <th>Buyer</th>
                                <th>Purchase Date</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>QR Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#TKT-78945</td>
                                <td>Afro Vibes Festival</td>
                                <td><span class="badge bg-primary">VIP</span></td>
                                <td>Jean Dupont</td>
                                <td>Oct 10, 2025</td>
                                <td>15,000 XAF</td>
                                <td><span class="badge badge-valid">Valid</span></td>
                                <td>
                                    <div class="ticket-qr">
                                        <i class="bi bi-qr-code fs-4"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-action btn-outline-primary me-1" title="View">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-action btn-outline-secondary me-1" title="Resend">
                                            <i class="bi bi-envelope"></i>
                                        </button>
                                        <button class="btn btn-action btn-outline-danger" title="Refund">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#TKT-78946</td>
                                <td>Tech Summit Africa</td>
                                <td><span class="badge bg-warning text-dark">Premium</span></td>
                                <td>Marie Ngo</td>
                                <td>Oct 12, 2025</td>
                                <td>25,000 XAF</td>
                                <td><span class="badge badge-valid">Valid</span></td>
                                <td>
                                    <div class="ticket-qr">
                                        <i class="bi bi-qr-code fs-4"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-action btn-outline-primary me-1">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-action btn-outline-secondary me-1">
                                            <i class="bi bi-envelope"></i>
                                        </button>
                                        <button class="btn btn-action btn-outline-danger">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#TKT-78947</td>
                                <td>Contemporary Art Exhibition</td>
                                <td><span class="badge bg-secondary">Standard</span></td>
                                <td>Paul Mbakwe</td>
                                <td>Oct 15, 2025</td>
                                <td>5,000 XAF</td>
                                <td><span class="badge badge-used">Used</span></td>
                                <td>
                                    <div class="ticket-qr">
                                        <i class="bi bi-qr-code fs-4"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-action btn-outline-primary me-1">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-action btn-outline-secondary me-1">
                                            <i class="bi bi-envelope"></i>
                                        </button>
                                        <button class="btn btn-action btn-outline-secondary">
                                            <i class="bi bi-printer"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#TKT-78948</td>
                                <td>Afro Vibes Festival</td>
                                <td><span class="badge bg-primary">VIP</span></td>
                                <td>Sarah Johnson</td>
                                <td>Oct 16, 2025</td>
                                <td>15,000 XAF</td>
                                <td><span class="badge badge-refunded">V</span>Valid</td>
                                <td>
                                    <div class="ticket-qr">
                                        <i class="bi bi-qr-code fs-4 text-muted"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-action btn-outline-primary me-1">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-action btn-outline-secondary">
                                            <i class="bi bi-printer"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <!-- Ticket Types Section -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold mb-0">Ticket Types</h5>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i> Add New Type
                    </button>
                </div>
                
                <div class="row g-4">
                    <!-- VIP Ticket -->
                    <div class="col-md-4">
                        <div class="ticket-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold">VIP Ticket</h5>
                                    <span class="badge bg-primary">Active</span>
                                </div>
                                <p class="card-text text-muted">
                                    <i class="bi bi-tag me-2"></i> Price: 10,000 XAF<br>
                                    <i class="bi bi-ticket-detailed me-2"></i> Sold: 420<br>
                                    <i class="bi bi-cash-coin me-2"></i> Revenue: 4,200,000 XAF
                                </p>
                                <div class="mt-4">
                                    <h6 class="fw-bold">Benefits:</h6>
                                    <ul class="list-unstyled text-muted">
                                        <li><i class="bi bi-check-circle text-success me-2"></i> Front row access</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> VIP lounge</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> Free drinks</li>
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
                    
                    <!-- Standard Ticket -->
                    <div class="col-md-4">
                        <div class="ticket-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold">Standard Ticket</h5>
                                    <span class="badge bg-success">Active</span>
                                </div>
                                <p class="card-text text-muted">
                                    <i class="bi bi-tag me-2"></i> Price: 5,000 XAF<br>
                                    <i class="bi bi-ticket-detailed me-2"></i> Sold: 720<br>
                                    <i class="bi bi-cash-coin me-2"></i> Revenue: 3,600,000 XAF
                                </p>
                                <div class="mt-4">
                                    <h6 class="fw-bold">Benefits:</h6>
                                    <ul class="list-unstyled text-muted">
                                        <li><i class="bi bi-check-circle text-success me-2"></i> General admission</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> Standard seating</li>
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
                    
                    <!-- Early Bird Ticket -->
                    <div class="col-md-4">
                        <div class="ticket-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title fw-bold">Premium</5>
                                    <span class="badge bg-secondary">Active</span>
                                </div>
                                <p class="card-text text-muted">
                                    <i class="bi bi-tag me-2"></i> Price: 15,000 XAF<br>
                                    <i class="bi bi-ticket-detailed me-2"></i> Sold: 100<br>
                                    <i class="bi bi-cash-coin me-2"></i> Revenue: 530,000 XAF
                                </p>
                                <div class="mt-4">
                                    <h6 class="fw-bold">Benefits:</h6>
                                    <ul class="list-unstyled text-muted">
                                        <li><i class="bi bi-check-circle text-success me-2"></i> Limited time offer</li>
                                        <li><i class="bi bi-check-circle text-success me-2"></i> General admission</li>
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
    </div>

@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Management | EventTick</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        :root {
            --primary: #0d6efd;
            --secondary: #6c757d;
            --success: #198754;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        #sidebar {
            min-height: 100vh;
            background-color: var(--dark);
            color: white;
            transition: all 0.3s;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        
        #sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            margin: 5px 10px;
        }
        
        #sidebar .nav-link:hover,
        #sidebar .nav-link.active {
            color: #fff;
            background-color: var(--primary);
        }
        
        .sidebar-header { 
            font-size: 1.2rem; 
            background-color: rgba(0, 0, 0, 0.2);
        }
        
        .content-area { 
            margin-left: 250px;
            padding: 20px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid #eaeaea;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0 !important;
        }
        
        .stats-card {
            border-left: 4px solid var(--primary);
            transition: transform 0.2s;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
        }
        
        .stats-card.success { border-left-color: var(--success); }
        .stats-card.warning { border-left-color: var(--warning); }
        .stats-card.danger { border-left-color: var(--danger); }
        
        .filter-section {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
        }
        
        .transaction-table {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .action-btn {
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
        }
        
        @media (max-width: 768px) {
            #sidebar { 
                margin-left: -250px;
                position: fixed;
                z-index: 1000;
                width: 250px;
                height: 100%;
            }
            
            .content-area { 
                margin-left: 0;
                width: 100%;
            }
            
            #sidebar.active { 
                margin-left: 0; 
            }
            
            .mobile-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            
            .mobile-overlay.active {
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Mobile Overlay -->
        <div class="mobile-overlay" id="mobileOverlay" onclick="toggleSidebar()"></div>

        <!-- Sidebar Navigation -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse position-fixed">
            <div class="position-sticky pt-3">
                <h1 class="sidebar-header text-center p-3 fs-4">
                    <i class="bi bi-ticket-perforated me-2"></i>EventTick
                </h1>
                <ul class="nav flex-column mb-auto mt-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-speedometer2 me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-people me-2"></i>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-calendar-event me-2"></i>
                            Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-building me-2"></i>
                            Organizations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="bi bi-credit-card me-2"></i>
                            Transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-gear me-2"></i>
                            Settings
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a href="#" class="nav-link">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-area">
            <!-- Top Bar -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-outline-secondary d-md-none me-2" onclick="toggleSidebar()">
                        <i class="bi bi-list"></i>
                    </button>
                    <h1 class="h2 mb-0">Transaction Management</h1>
                </div>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-download me-1"></i> Export
                        </button>
                        <button type="button" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> New Transaction
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="row my-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted fw-normal">Total Transactions</h6>
                                    <h3 class="mb-0">2,543</h3>
                                    <p class="mb-0 mt-2 text-success"><small><i class="bi bi-arrow-up me-1"></i> 12.5% since last month</small></p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="bi bi-credit-card text-primary fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card success mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted fw-normal">Completed</h6>
                                    <h3 class="mb-0">1,897</h3>
                                    <p class="mb-0 mt-2 text-success"><small><i class="bi bi-check-circle me-1"></i> 74.6% success rate</small></p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="bi bi-check-circle text-success fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card warning mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted fw-normal">Pending</h6>
                                    <h3 class="mb-0">327</h3>
                                    <p class="mb-0 mt-2 text-warning"><small><i class="bi bi-clock me-1"></i> 12.9% pending</small></p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="bi bi-clock text-warning fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card stats-card danger mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted fw-normal">Failed</h6>
                                    <h3 class="mb-0">319</h3>
                                    <p class="mb-0 mt-2 text-danger"><small><i class="bi bi-x-circle me-1"></i> 12.5% failure rate</small></p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="bi bi-x-circle text-danger fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters Section -->
            <div class="card filter-section">
                <div class="card-body">
                    <h5 class="card-title mb-4">Filter Transactions</h5>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="statusFilter" class="form-label">Status</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Statuses</option>
                                    <option value="completed">Completed</option>
                                    <option value="pending">Pending</option>
                                    <option value="failed">Failed</option>
                                    <option value="refunded">Refunded</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="dateFilter" class="form-label">Date Range</label>
                                <select class="form-select" id="dateFilter">
                                    <option value="">All Dates</option>
                                    <option value="today">Today</option>
                                    <option value="week">This Week</option>
                                    <option value="month">This Month</option>
                                    <option value="quarter">This Quarter</option>
                                    <option value="custom">Custom Range</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="eventFilter" class="form-label">Event</label>
                                <select class="form-select" id="eventFilter">
                                    <option value="">All Events</option>
                                    <option value="concert">Rock Concert</option>
                                    <option value="conference">Tech Conference</option>
                                    <option value="festival">Food Festival</option>
                                    <option value="expo">Business Expo</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="searchInput" class="form-label">Search</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="searchInput" placeholder="Transaction ID, Customer...">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                                <button type="submit" class="btn btn-primary">Apply Filters</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Transactions Table -->
            <div class="card transaction-table">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Transactions</h5>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-sliders me-1"></i> Options
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Export as CSV</a></li>
                            <li><a class="dropdown-item" href="#">Export as Excel</a></li>
                            <li><a class="dropdown-item" href="#">Print</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="transactionsTable">
                            <thead>
                                <tr>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Event</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>TXN-7890</code></td>
                                    <td>Rock Concert</td>
                                    <td>user@email.com</td>
                                    <td>12/10/2023</td>
                                    <td>€45.00</td>
                                    <td><span class="badge bg-success status-badge">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary action-btn" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary action-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><code>TXN-7889</code></td>
                                    <td>Tech Conference</td>
                                    <td>another@email.com</td>
                                    <td>11/10/2023</td>
                                    <td>€89.50</td>
                                    <td><span class="badge bg-success status-badge">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary action-btn" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary action-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><code>TXN-7888</code></td>
                                    <td>Food Festival</td>
                                    <td>customer@email.com</td>
                                    <td>11/10/2023</td>
                                    <td>€25.00</td>
                                    <td><span class="badge bg-warning status-badge">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary action-btn" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary action-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><code>TXN-7887</code></td>
                                    <td>Business Expo</td>
                                    <td>corporate@email.com</td>
                                    <td>10/10/2023</td>
                                    <td>€120.00</td>
                                    <td><span class="badge bg-danger status-badge">Failed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary action-btn" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary action-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><code>TXN-7886</code></td>
                                    <td>Rock Concert</td>
                                    <td>fan@email.com</td>
                                    <td>10/10/2023</td>
                                    <td>€45.00</td>
                                    <td><span class="badge bg-success status-badge">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary action-btn" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary action-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><code>TXN-7885</code></td>
                                    <td>Tech Conference</td>
                                    <td>developer@email.com</td>
                                    <td>09/10/2023</td>
                                    <td>€89.50</td>
                                    <td><span class="badge bg-secondary status-badge">Refunded</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary action-btn" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary action-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><code>TXN-7884</code></td>
                                    <td>Food Festival</td>
                                    <td>foodie@email.com</td>
                                    <td>09/10/2023</td>
                                    <td>€25.00</td>
                                    <td><span class="badge bg-success status-badge">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary action-btn" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary action-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><code>TXN-7883</code></td>
                                    <td>Business Expo</td>
                                    <td>manager@email.com</td>
                                    <td>08/10/2023</td>
                                    <td>€120.00</td>
                                    <td><span class="badge bg-success status-badge">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary action-btn" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary action-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Transaction pagination">
                        <ul class="pagination justify-content-center mt-4">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Previous</a>
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

            <footer class="pt-3 mt-4 text-muted border-top text-center">
                © 2023 EventTick • Admin Dashboard
            </footer>
        </main>
    </div>
</div>

<!-- Bootstrap & Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<!-- jQuery and DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Toggle sidebar on mobile
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobileOverlay');
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    }
    
    // Initialize DataTable
    $(document).ready(function() {
        $('#transactionsTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50],
            "language": {
                "search": "Filter:",
                "lengthMenu": "Show MENU entries",
                "info": "Showing START to END of TOTAL transactions",
                "infoEmpty": "Showing 0 to 0 of 0 transactions",
                "paginate": {
                    "previous": "<i class='bi bi-chevron-left'></i>",
                    "next": "<i class='bi bi-chevron-right'></i>"
                }
            }
        });
    });
</script>
</body>
</html>
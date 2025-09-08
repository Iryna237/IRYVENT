<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizations - Event Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #858796;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --light: #f8f9fc;
            --dark: #5a5c69;
        }
        
        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        #wrapper {
            display: flex;
        }
        
        #content-wrapper {
            width: 100%;
            overflow-x: hidden;
        }
        
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary) 0%, #224abe 100%);
            color: white;
        }
        
        .sidebar .nav-item {
            margin-bottom: 5px;
        }
        
        .sidebar .nav-item .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 1rem;
        }
        
        .sidebar .nav-item .nav-link:hover {
            color: white;
        }
        
        .sidebar .nav-item .nav-link.active {
            color: white;
            font-weight: bold;
        }
        
        .sidebar .nav-item .nav-link i {
            margin-right: 10px;
        }
        
        .topbar {
            height: 70px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            background-color: white;
        }
        
        .content-header {
            padding: 15px 30px;
            background-color: white;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .main-content {
            padding: 30px;
        }
        
        .card-shadow {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            border: 1px solid #e3e6f0;
            border-radius: 0.35rem;
        }
        
        .org-card {
            transition: transform 0.2s;
        }
        
        .org-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
        }
        
        .stats-icon {
            font-size: 1.5rem;
            opacity: 0.7;
        }
        
        .org-status {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: fixed;
                z-index: 1000;
                display: none;
            }
            
            .sidebar.show {
                display: block;
            }
            
            .main-content {
                padding: 15px;
            }
        }
        
        .action-buttons .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="text-center p-4">
                <h4>Event Management</h4>
                <p class="text-white-50 small">Admin Panel</p>
            </div>
            <hr class="my-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.html">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="organization.html">
                        <i class="bi bi-building"></i>
                        Organizations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="events.html">
                        <i class="bi bi-calendar-event"></i>
                        Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.html">
                        <i class="bi bi-people"></i>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transactions.html">
                        <i class="bi bi-credit-card"></i>
                        Transactions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="settings.html">
                        <i class="bi bi-gear"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link" href="login.html">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Top Bar -->
            <nav class="topbar navbar navbar-expand navbar-light mb-4 static-top shadow">
                <div class="container-fluid">
                    <button id="sidebarToggle" class="btn btn-link d-md-none">
                        <i class="bi bi-list"></i>
                    </button>
                    
                    <form class="d-none d-sm-inline-block form-inline ms-auto me-auto my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search organizations..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell-fill"></i>
                                <span class="badge bg-danger badge-counter">3+</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-envelope-fill"></i>
                                <span class="badge bg-danger badge-counter">7</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="d-none d-lg-inline text-gray-600 small">Admin User</span>
                                <img class="img-profile rounded-circle ms-2" src="https://via.placeholder.com/40" width="32" height="32">
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Organizations</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
                                <li class="breadcrumb-item active">Organizations</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-content">
                <div class="container-fluid">
                    <!-- Stats Row -->
                    <div class="row mb-4">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card card-shadow border-left-primary h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Organizations</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-building stats-icon text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card card-shadow border-left-success h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Active Organizations</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">11</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-check-circle stats-icon text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card card-shadow border-left-warning h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Approval</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-clock-history stats-icon text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card card-shadow border-left-info h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Events This Month</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">42</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-calendar-event stats-icon text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button class="btn btn-outline-primary">
                                        <i class="bi bi-filter me-1"></i> Filter
                                    </button>
                                    <div class="btn-group ms-2">
                                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="bi bi-sort-down me-1"></i> Sort By
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Dream fest</a></li>
                                            <li><a class="dropdown-item" href="#">living together Festival</a></li>
                                            <li><a class="dropdown-item" href="#">Most Recent</a></li>
                                            <li><a class="dropdown-item" href="#">Most Events</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrganizationModal">
                                    <i class="bi bi-plus-circle me-1"></i> Add New Organization
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Organizations Grid -->
                    <div class="row">
                        <!-- Organization Card 1 -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card org-card card-shadow h-100">
                                <span class="org-status">
                                    <span class="badge bg-success">Active</span>
                                </span>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="download (1).jpg" class="rectangle"width="110%" alt="Organization logo">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0"></h5>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                    <p class="card-text">Show live of Tenor </p>
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">Canal olympia Douala</div>
                                            <small class="text-muted">Events</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">2000</div>
                                            <small class="text-muted">Tickets</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">8 250 000XAF</div>
                                            <small class="text-muted">Revenue</small>
                                        </div>
                                    </div>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Joined: Sept 12, 2025</small>
                                </div>
                            </div>
                        </div>

                        <!-- Organization Card 2 -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card org-card card-shadow h-100">
                                <span class="org-status">
                                    <span class="badge bg-success">Active</span>
                                </span>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="https://via.placeholder.com/60" class="rounded-circle" alt="Organization logo">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Tech Solutions Ltd.</h5>
                                            <p class="text-muted mb-0">Technology</p>
                                        </div>
                                    </div>
                                    <p class="card-text">Provider of tech conferences and developer workshops.</p>
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">8</div>
                                            <small class="text-muted">Events</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">3.1K</div>
                                            <small class="text-muted">Tickets</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">$68.7K</div>
                                            <small class="text-muted">Revenue</small>
                                        </div>
                                    </div>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Joined: May 3, 2022</small>
                                </div>
                            </div>
                        </div>

                        <!-- Organization Card 3 -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card org-card card-shadow h-100">
                                <span class="org-status">
                                    <span class="badge bg-warning text-dark">Pending</span>
                                </span>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="https://via.placeholder.com/60" class="rounded-circle" alt="Organization logo">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Food Festival Co.</h5>
                                            <p class="text-muted mb-0">Food & Beverage</p>
                                        </div>
                                    </div>
                                    <p class="card-text">Organizer of food festivals and culinary events.</p>
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">0</div>
                                            <small class="text-muted">Events</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">0</div>
                                            <small class="text-muted">Tickets</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">$0</div>
                                            <small class="text-muted">Revenue</small>
                                        </div>
                                    </div>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary">Review</button>
                                        <button class="btn btn-sm btn-outline-success">Approve</button>
                                        <button class="btn btn-sm btn-outline-danger">Reject</button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Applied: October 12, 2023</small>
                                </div>
                            </div>
                        </div>

                        <!-- Organization Card 4 -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card org-card card-shadow h-100">
                                <span class="org-status">
                                    <span class="badge bg-success">Active</span>
                                </span>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="https://via.placeholder.com/60" class="rounded-circle" alt="Organization logo">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Art Exhibitions LLC</h5>
                                            <p class="text-muted mb-0">Arts & Culture</p>
                                        </div>
                                    </div>
                                    <p class="card-text">Curator of art exhibitions and cultural events nationwide.</p>
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">6</div>
                                            <small class="text-muted">Events</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">2.8K</div>
                                            <small class="text-muted">Tickets</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">$31.2K</div>
                                            <small class="text-muted">Revenue</small>
                                        </div>
                                    </div>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Joined: January 28, 2022</small>
                                </div>
                            </div>
                        </div>

                        <!-- Organization Card 5 -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card org-card card-shadow h-100">
                                <span class="org-status">
                                    <span class="badge bg-secondary">Inactive</span>
                                </span>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="https://via.placeholder.com/60" class="rounded-circle" alt="Organization logo">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Sports Events Group</h5>
                                            <p class="text-muted mb-0">Sports</p>
                                        </div>
                                    </div>
                                    <p class="card-text">Organizer of sporting events and tournaments.</p>
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">4</div>
                                            <small class="text-muted">Events</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">1.5K</div>
                                            <small class="text-muted">Tickets</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">$18.9K</div>
                                            <small class="text-muted">Revenue</small>
                                        </div>
                                    </div>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-success">Activate</button>
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last activity: June 5, 2023</small>
                                </div>
                            </div>
                        </div>

                        <!-- Organization Card 6 -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card org-card card-shadow h-100">
                                <span class="org-status">
                                    <span class="badge bg-warning text-dark">Pending</span>
                                </span>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="https://via.placeholder.com/60" class="rounded-circle" alt="Organization logo">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title mb-0">Wellness Workshops</h5>
                                            <p class="text-muted mb-0">Health & Wellness</p>
                                        </div>
                                    </div>
                                    <p class="card-text">Provider of wellness retreats and mindfulness workshops.</p>
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">0</div>
                                            <small class="text-muted">Events</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">0</div>
                                            <small class="text-muted">Tickets</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">$0</div>
                                            <small class="text-muted">Revenue</small>
                                        </div>
                                    </div>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary">Review</button>
                                        <button class="btn btn-sm btn-outline-success">Approve</button>
                                        <button class="btn btn-sm btn-outline-danger">Reject</button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Applied: October 15, 2023</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <nav aria-label="Organizations pagination">
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
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-auto">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Event Management System 2023</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Add Organization Modal -->
    <div class="modal fade" id="addOrganizationModal" tabindex="-1" aria-labelledby="addOrganizationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrganizationModalLabel">Add New Organization</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="orgName" class="form-label">Organization Name</label>
                                    <input type="text" class="form-control" id="orgName" placeholder="Enter organization name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="orgCategory" class="form-label">Category</label>
                                    <select class="form-select" id="orgCategory">
                                        <option selected>Select a category</option>
                                        <option value="entertainment">Entertainment</option>
                                        <option value="technology">Technology</option>
                                        <option value="sports">Sports</option>
                                        <option value="arts">Arts & Culture</option>
                                        <option value="food">Food & Beverage</option>
                                        <option value="health">Health & Wellness</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactName" class="form-label">Contact Name</label>
                                    <input type="text" class="form-control" id="contactName" placeholder="Enter contact name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactEmail" class="form-label">Contact Email</label>
                                    <input type="email" class="form-control" id="contactEmail" placeholder="Enter contact email">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactPhone" class="form-label">Contact Phone</label>
                                    <input type="tel" class="form-control" id="contactPhone" placeholder="Enter contact phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="orgStatus" class="form-label">Status</label>
                                    <select class="form-select" id="orgStatus">
                                        <option value="active" selected>Active</option>
                                        <option value="pending">Pending</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="orgDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="orgDescription" rows="3" placeholder="Enter organization description"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="orgLogo" class="form-label">Organization Logo</label>
                            <input class="form-control" type="file" id="orgLogo">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Organization</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Simple filtering functionality for demonstration
        document.querySelectorAll('.org-card').forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.action-buttons')) {
                    // For demonstration, just show an alert
                    const orgName = this.querySelector('.card-title').textContent;
                    alert(`View details for: ${orgName}`);
                }
            });
        });
    </script>
</body>
</html>
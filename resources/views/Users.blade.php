<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Event Management System</title>
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
        
        .user-card {
            transition: transform 0.2s;
        }
        
        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
        }
        
        .stats-icon {
            font-size: 1.5rem;
            opacity: 0.7;
        }
        
        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .user-status {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        .user-role-badge {
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
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
        
        .table-responsive {
            border-radius: 0.35rem;
        }
        
        .user-activity-chart {
            height: 250px;
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
                    <a class="nav-link" href="organizations.html">
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
                    <a class="nav-link active" href="Users.html">
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
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search users..." aria-label="Search" aria-describedby="basic-addon2">
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
                            <h1 class="m-0 text-dark">Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
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
                                                Total Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,543</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-people stats-icon text-gray-300"></i>
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
                                                Active Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2,128</div>
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
                                                New Users (30 days)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">184</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-person-plus stats-icon text-gray-300"></i>
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
                                                Avg. Events per User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">3.2</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-ticket-perforated stats-icon text-gray-300"></i>
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
                                            <li><a class="dropdown-item" href="#">Name (A-Z)</a></li>
                                            <li><a class="dropdown-item" href="#">Name (Z-A)</a></li>
                                            <li><a class="dropdown-item" href="#">Newest</a></li>
                                            <li><a class="dropdown-item" href="#">Most Active</a></li>
                                            <li><a class="dropdown-item" href="#">Most Events</a></li>
                                        </ul>
                                    </div>
                                    <div class="btn-group ms-2">
                                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="bi bi-person-badge me-1"></i> Role
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">All Roles</a></li>
                                            <li><a class="dropdown-item" href="#">Admin</a></li>
                                            <li><a class="dropdown-item" href="#">Organizer</a></li>
                                            <li><a class="dropdown-item" href="#">Customer</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <i class="bi bi-plus-circle me-1"></i> Add New User
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                                    <div>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-download me-1"></i> Export
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="usersTable" width="100%" cellspacing="0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>User</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Events</th>
                                                    <th>Status</th>
                                                    <th>Joined</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://via.placeholder.com/40" class="user-avatar me-3" alt="User avatar">
                                                            <div>
                                                                <div class="fw-bold">John Smith</div>
                                                                <div class="text-muted small">@johnsmith</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>john.smith@example.com</td>
                                                    <td><span class="badge bg-primary user-role-badge">Admin</span></td>
                                                    <td>12</td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                    <td>Jan 15, 2022</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://via.placeholder.com/40" class="user-avatar me-3" alt="User avatar">
                                                            <div>
                                                                <div class="fw-bold">Sarah Johnson</div>
                                                                <div class="text-muted small">@sarahj</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>sarah.j@example.com</td>
                                                    <td><span class="badge bg-info user-role-badge">Organizer</span></td>
                                                    <td>8</td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                    <td>Mar 22, 2022</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://via.placeholder.com/40" class="user-avatar me-3" alt="User avatar">
                                                            <div>
                                                                <div class="fw-bold">Michael Brown</div>
                                                                <div class="text-muted small">@michaelb</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>m.brown@example.com</td>
                                                    <td><span class="badge bg-success user-role-badge">Customer</span></td>
                                                    <td>5</td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                    <td>Apr 10, 2022</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://via.placeholder.com/40" class="user-avatar me-3" alt="User avatar">
                                                            <div>
                                                                <div class="fw-bold">Emily Wilson</div>
                                                                <div class="text-muted small">@emilyw</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>emily.wilson@example.com</td>
                                                    <td><span class="badge bg-info user-role-badge">Organizer</span></td>
                                                    <td>6</td>
                                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                                    <td>May 5, 2023</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                                            <button class="btn btn-sm btn-outline-success"><i class="bi bi-check"></i></button>
                                                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://via.placeholder.com/40" class="user-avatar me-3" alt="User avatar">
                                                            <div>
                                                                <div class="fw-bold">David Lee</div>
                                                                <div class="text-muted small">@davidl</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>d.lee@example.com</td>
                                                    <td><span class="badge bg-success user-role-badge">Customer</span></td>
                                                    <td>3</td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                    <td>Jun 18, 2022</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                                            <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="https://via.placeholder.com/40" class="user-avatar me-3" alt="User avatar">
                                                            <div>
                                                                <div class="fw-bold">Jennifer Davis</div>
                                                                <div class="text-muted small">@jenniferd</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>j.davis@example.com</td>
                                                    <td><span class="badge bg-success user-role-badge">Customer</span></td>
                                                    <td>7</td>
                                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                                    <td>Jul 30, 2022</td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i></button>
                                                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                                                            <button class="btn btn-sm btn-outline-success"><i class="bi bi-arrow-repeat"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <!-- Pagination -->
                                    <nav aria-label="Users pagination" class="mt-4">
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

                    <!-- User Activity Section -->
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">User Registration Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical text-gray-400"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="user-activity-chart">
                                        <div class="p-3 bg-light rounded text-center">
                                            <p class="text-muted mb-0">
                                                <i class="bi bi-bar-chart-line me-1"></i>
                                                User registration chart would be displayed here
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">User Roles Distribution</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <div class="p-3 bg-light rounded text-center">
                                            <p class="text-muted mb-0">
                                                <i class="bi bi-pie-chart me-1"></i>
                                                User roles chart would be displayed here
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="me-2">
                                            <i class="bi bi-circle-fill text-primary"></i> Customers
                                        </span>
                                        <span class="me-2">
                                            <i class="bi bi-circle-fill text-info"></i> Organizers
                                        </span>
                                        <span class="me-2">
                                            <i class="bi bi-circle-fill text-success"></i> Admins
                                        </span>
                                    </div>
                                </div>
                            </div>
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

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userFirstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="userFirstName" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userLastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="userLastName" placeholder="Enter last name">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userEmail" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="userEmail" placeholder="Enter email address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userUsername" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="userUsername" placeholder="Enter username">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="userPassword" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userRole" class="form-label">Role</label>
                                    <select class="form-select" id="userRole">
                                        <option selected>Select a role</option>
                                        <option value="admin">Administrator</option>
                                        <option value="organizer">Organizer</option>
                                        <option value="customer">Customer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userStatus" class="form-label">Status</label>
                                    <select class="form-select" id="userStatus">
                                        <option value="active" selected>Active</option>
                                        <option value="pending">Pending</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="userAvatar" class="form-label">Profile Picture</label>
                                    <input class="form-control" type="file" id="userAvatar">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="userBio" class="form-label">Bio</label>
                            <textarea class="form-control" id="userBio" rows="2" placeholder="Enter user bio"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add User</button>
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

        // Simple functionality for demonstration
        document.querySelectorAll('#usersTable tbody tr').forEach(row => {
            row.addEventListener('click', function(e) {
                if (!e.target.closest('.action-buttons')) {
                    // For demonstration, just show an alert
                    const userName = this.querySelector('.fw-bold').textContent;
                    alert(`View details for: ${userName}`);
                }
            });
        });
    </script>
</body>
</html>
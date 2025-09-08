<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Event Management System</title>
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
        
        .card-dashboard {
            border-left: 5px solid;
            border-radius: 8px;
        }
        
        .card-dashboard .card-body {
            padding: 1.5rem;
        }
        
        .card-dashboard .h5 {
            font-size: 1.2rem;
            color: var(--dark);
        }
        
        .card-dashboard .text-xs {
            font-size: 0.9rem;
        }
        
        .bg-gradient-primary {
            background: linear-gradient(180deg, var(--primary) 10%, #224abe 100%);
        }
        
        .bg-gradient-success {
            background: linear-gradient(180deg, var(--success) 10%, #13855c 100%);
        }
        
        .bg-gradient-info {
            background: linear-gradient(180deg, var(--info) 10%, #2a96a5 100%);
        }
        
        .bg-gradient-warning {
            background: linear-gradient(180deg, var(--warning) 10%, #dda20a 100%);
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
        }
        
        .chart-area {
            position: relative;
            height: 250px;
            width: 100%;
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
    </style>
</head>
@php 
    $role = auth()->user()->role;  
    $name = auth()->user()->name;
    $email = auth()->user()->email;
@endphp
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="text-center p-4">
                <h4>Event Management</h4>
                <p class="text-white-50 small"></p>
            </div>
            <hr class="my-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.html">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="organization.html">
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
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                                <span class="d-none d-lg-inline text-gray-600 small">{{ $name }}</span>
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
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-content">
                <div class="container-fluid">
                    <!-- Stats Row -->
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card card-dashboard border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Events</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">24</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-calendar-event fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card card-dashboard border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Revenue</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">3 200 800XAF</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-currency-XAF fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card card-dashboard border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Organizations</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-building fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card card-dashboard border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">06</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-chat-left-text fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Row -->
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Overview</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="revenueChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Event Categories</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="categoryChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="me-2">
                                            <i class="bi bi-circle-fill text-primary"></i> Concerts
                                        </span>
                                        <span class="me-2">
                                            <i class="bi bi-circle-fill text-success"></i> Conferences
                                        </span>
                                        <span class="me-2">
                                            <i class="bi bi-circle-fill text-info"></i> Workshops
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Recent Activity</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Event Name</th>
                                                    <th>Organizer</th>
                                                    <th>Date</th>
                                                    <th>Tickets Sold</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>FESTIBIKUTSI</td>
                                                    <td>Music Events Inc.</td>
                                                    <td>2025-07-15</td>
                                                    <td>1,245</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">View</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>AI Conference 2025</td>
                                                    <td>Tech Solutions Ltd.</td>
                                                    <td>2025-09-08</td>
                                                    <td>856</td>
                                                    <td><span class="badge bg-warning">Ongoing</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">View</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cameroon fashion week</td>
                                                    <td>JOBAJO</td>
                                                    <td>2026-02-12</td>
                                                    <td>524</td>
                                                    <td><span class="badge bg-info">Upcoming</span></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-primary">View</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                        <span>Copyright &copy; IRYVENT 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        // Revenue chart
        var ctx = document.getElementById('revenueChart').getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue in XAF',
                    data: [5000, 7500, 6500, 12000, 9500, 18000, 15000, 21000, 18500, 24000, 19500, 28000],
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    pointRadius: 3,
                    pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                    pointBorderColor: 'rgba(78, 115, 223, 1)',
                    pointHoverRadius: 10,
                    pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                    pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + 'XAF';
                            }
                        }
                    }
                }
            }
        });

        // Category chart
        var ctx2 = document.getElementById('categoryChart').getContext('2d');
        var categoryChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Concerts', 'Conferences', 'Workshops', 'Festivals', 'Others'],
                datasets: [{
                    data: [35, 25, 15, 15, 10],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#858796'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#60616f'],
                    hoverBorderColor: 'rgba(234, 236, 244, 1)',
                }]
            },
            options: {
                maintainAspectRatio: false,
                cutout: '50%',
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>
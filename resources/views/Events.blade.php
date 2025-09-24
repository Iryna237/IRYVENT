<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Event Management System</title>
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
        
        .event-card {
            transition: transform 0.2s;
            height: 100%;
        }
        
        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
        }
        
        .stats-icon {
            font-size: 1.5rem;
            opacity: 0.7;
        }
        
        .event-status {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        .event-image {
            height: 180px;
            object-fit: cover;
            width: 100%;
        }
        
        .calendar-date {
            width: 70px;
            height: 70px;
            background: var(--primary);
            color: white;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
        }
        
        .calendar-month {
            font-size: 0.8rem;
            text-transform: uppercase;
            background: rgba(0,0,0,0.2);
            width: 100%;
            text-align: center;
            padding: 2px 0;
        }
        
        .calendar-day {
            font-size: 1.5rem;
            font-weight: bold;
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
        
        .event-category {
            font-size: 0.85rem;
            color: var(--secondary);
        }
        
        .ticket-progress {
            height: 8px;
            border-radius: 4px;
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
                    <a class="nav-link" href="organization.html">
                        <i class="bi bi-building"></i>
                        Organizations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Events.html">
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
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search events..." aria-label="Search" aria-describedby="basic-addon2">
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

            
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Events</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
                                <li class="breadcrumb-item active">Events</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-content">
                <div class="container-fluid">
                    
                    <div class="row mb-4">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card card-shadow border-left-primary h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col me-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Events</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-calendar-event stats-icon text-gray-300"></i>
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
                                                Upcoming Events</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-arrow-up-circle stats-icon text-gray-300"></i>
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
                                                Tickets Sold</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">48</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-ticket-perforated stats-icon text-gray-300"></i>
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
                                                Total Revenue</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">124,850</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-currency-dollar stats-icon text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
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
                                            <li><a class="dropdown-item" href="#">Date (Newest)</a></li>
                                            <li><a class="dropdown-item" href="#">Date (Oldest)</a></li>
                                            <li><a class="dropdown-item" href="#">Most Popular</a></li>
                                            <li><a class="dropdown-item" href="#">A-Z</a></li>
                                            <li><a class="dropdown-item" href="#">Revenue</a></li>
                                        </ul>
                                    </div>
                                    <div class="btn-group ms-2">
                                        <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                            <i class="bi bi-calendar me-1"></i> Date Range
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Week</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                            <li><a class="dropdown-item" href="#">Custom Range</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                                    <i class="bi bi-plus-circle me-1"></i> Create New Event
                                </button>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card event-card card-shadow h-100">
                                <span class="event-status">
                                    <span class="badge bg-success">Active</span>
                                </span>
                                <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="event-image" alt="Summer Music Festival">
                                <div class="card-body">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="calendar-date">
                                            <div class="calendar-month">Jul</div>
                                            <div class="calendar-day">15</div>
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-0">fashion street Festival</h5>
                                            <p class="event-category mb-0">fashion</p>
                                            <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> Bafoussam, party house</small>
                                        </div>
                                    </div>
                                    <p class="card-text">Annual fashion festival featuring top artists and designers across multiple genres with creativity and activities.</p>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                        <small>Tickets Sold: 645</small>
                                            <small>50%</small>
                                        </div>
                                        <div class="progress ticket-progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">3500XAF</div>
                                            <small class="text-muted">Price</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">1000</div>
                                            <small class="text-muted">Capacity</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">2 257 500XAF</div>
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
                                    <small class="text-muted">Organizer: Imane Ayissi. Cameroon</small>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card event-card card-shadow h-100">
                                <span class="event-status">
                                    <span class="badge bg-info">Upcoming</span>
                                </span>
                                <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="event-image" alt="Tech Conference">
                                <div class="card-body">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="calendar-date">
                                            <div class="calendar-month">Aug</div>
                                            <div class="calendar-day">22</div>
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-0">Tech Conference 2026</h5>
                                            <p class="event-category mb-0">Technology • Business</p>
                                            <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> Convention Center, Bafoussam</small>
                                        </div>
                                    </div>
                                    <p class="card-text">Leading technology conference showcasing innovations in AI with expert speakers.</p>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <small>Tickets Sold: 856</small>
                                            <small>51%</small>
                                        </div>
                                        <div class="progress ticket-progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 71%" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">5000XAF</div>
                                            <small class="text-muted">Price</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">1200K</div>
                                            <small class="text-muted">Capacity</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">4 280 000XAF</div>
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
                                    <small class="text-muted">Organizer: Tech Solutions Ltd.</small>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card event-card card-shadow h-100">
                                <span class="event-status">
                                    <span class="badge bg-warning text-dark">Draft</span>
                                </span>
                                <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="event-image" alt="Food & Wine Expo">
                                <div class="card-body">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="calendar-date">
                                            <div class="calendar-month">Sep</div>
                                            <div class="calendar-day">10</div>
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-0">Food & Wine Expo</h5>
                                            <p class="event-category mb-0">Food & Drink • tasting</p>
                                            <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> Downtown Expo Hall, Douala</small>
                                        </div>
                                    </div>
                                    <p class="card-text">Exclusive culinary event featuring gourmet food, fine wines, and cooking demonstrations by renowned chefs.</p>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <small>Tickets Sold: 552</small>
                                            <small>69%</small>
                                        </div>
                                        <div class="progress ticket-progress">
                                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">3000</div>
                                            <small class="text-muted">Price</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">800</div>
                                            <small class="text-muted">Capacity</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">2 400 000XAF</div>
                                            <small class="text-muted">Revenue</small>
                                        </div>
                                    </div>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-success">Publish</button>
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Organizer: Gourmet Experiences. Yaoundé</small>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card event-card card-shadow h-100">
                                <span class="event-status">
                                    <span class="badge bg-success">Active</span>
                                </span>
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="event-image" alt="Art Exhibition">
                                <div class="card-body">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="calendar-date">
                                            <div class="calendar-month">Oct</div>
                                            <div class="calendar-day">05</div>
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-0">Modern Art Exhibition</h5>
                                            <p class="event-category mb-0">Art • Culture</p>
                                            <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> City Art Gallery, Yaoundé</small>
                                        </div>
                                    </div>
                                    <p class="card-text">Showcase of contemporary art from emerging and established artists, with interactive installations and live performances.</p>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <small>Tickets Sold: 428</small>
                                            <small>85%</small>
                                        </div>
                                        <div class="progress ticket-progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">5000</div>
                                            <small class="text-muted">Price</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">500</div>
                                            <small class="text-muted">Capacity</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">2 500 000XAF</div>
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
                                    <small class="text-muted">Organizer: Art Exhibitions LLC</small>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card event-card card-shadow h-100">
                                <span class="event-status">
                                    <span class="badge bg-secondary">Ended</span>
                                </span>
                                <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="event-image" alt="Marathon Race">
                                <div class="card-body">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="calendar-date">
                                            <div class="calendar-month">Jun</div>
                                            <div class="calendar-day">12</div>
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-0">City Marathon 2025</h5>
                                            <p class="event-category mb-0">Sports • Fitness</p>
                                            <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> Downtown Streets, Seattle</small>
                                        </div>
                                    </div>
                                    <p class="card-text">Annual city marathon with multiple race categories, featuring professional athletes and amateur runners alike.</p>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <small>Tickets Sold: 1,500/1,500</small>
                                            <small>100%</small>
                                        </div>
                                        <div class="progress ticket-progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">6000</div>
                                            <small class="text-muted">Price</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">1 500</div>
                                            <small class="text-muted">Capacity</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">2 800 000XAF</div>
                                            <small class="text-muted">Revenue</small>
                                        </div>
                                    </div>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                                        <button class="btn btn-sm btn-outline-info">Repeat</button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Organizer: Sports Events Group</small>
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card event-card card-shadow h-100">
                                <span class="event-status">
                                    <span class="badge bg-info">Upcoming</span>
                                </span>
                                <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="event-image" alt="Wellness Retreat">
                                <div class="card-body">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="calendar-date">
                                            <div class="calendar-month">Nov</div>
                                            <div class="calendar-day">18</div>
                                        </div>
                                        <div>
                                            <h5 class="card-title mb-0">Wellness Retreat</h5>
                                            <p class="event-category mb-0">Health • Workshop</p>
                                            <small class="text-muted"><i class="bi bi-geo-alt me-1"></i> Mountain Resort, Limbe</small>
                                        </div>
                                    </div>
                                    <p class="card-text">Weekend retreat focused on mindfulness, yoga, meditation, and healthy living with expert instructors.</p>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <small>Tickets Sold: 42/100</small>
                                            <small>42%</small>
                                        </div>
                                        <div class="progress ticket-progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row text-center mb-3">
                                        <div class="col-4">
                                            <div class="h6 mb-0">10 000XAF</div>
                                            <small class="text-muted">Price</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">100</div>
                                            <small class="text-muted">Capacity</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="h6 mb-0">1 000 000XAF</div>
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
                                    <small class="text-muted">Organizer: Wellness Workshops</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row mt-4">
                        <div class="col-12">
                            <nav aria-label="Events pagination">
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

           
            <footer class="sticky-footer bg-white mt-auto">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; IRYVENT 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Create New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="eventName" class="form-label">Event Name</label>
                                    <input type="text" class="form-control" id="eventName" placeholder="Enter event name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="eventCategory" class="form-label">Category</label>
                                    <select class="form-select" id="eventCategory">
                                        <option selected>Select a category</option>
                                        <option value="music">Music</option>
                                        <option value="technology">Technology</option>
                                        <option value="sports">Sports</option>
                                        <option value="arts">Arts & Culture</option>
                                        <option value="food">Food & Drink</option>
                                        <option value="health">Health & Wellness</option>
                                        <option value="business">Business</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="eventDate" class="form-label">Event Date</label>
                                    <input type="date" class="form-control" id="eventDate">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="eventTime" class="form-label">Event Time</label>
                                    <input type="time" class="form-control" id="eventTime">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="eventLocation" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="eventLocation" placeholder="Enter event location">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="eventCapacity" class="form-label">Capacity</label>
                                    <input type="number" class="form-control" id="eventCapacity" placeholder="Max attendees">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ticketPrice" class="form-label">Ticket Price (XAF)</label>
                                    <input type="number" class="form-control" id="ticketPrice" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="eventOrganizer" class="form-label">Organizer</label>
                                    <select class="form-select" id="eventOrganizer">
                                        <option selected>Select organizer</option>
                                        <option value="1">Music Events Inc.</option>
                                        <option value="2">Tech Solutions Ltd.</option>
                                        <option value="3">Gourmet Experiences</option>
                                        <option value="4">Art Exhibitions LLC</option>
                                        <option value="5">Sports Events Group</option>
                                        <option value="6">Wellness Workshops</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="eventDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="eventDescription" rows="3" placeholder="Enter event description"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="eventImage" class="form-label">Event Image</label>
                            <input class="form-control" type="file" id="eventImage">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Create Event</button>
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
        document.querySelectorAll('.event-card').forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('.action-buttons')) {
                    // For demonstration, just show an alert
                    const eventName = this.querySelector('.card-title').textContent;
                    alert(`View details for: ${eventName}`);
                }
            });
        });
    </script>
</body>
</html>
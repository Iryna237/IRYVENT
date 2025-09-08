
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Events | IRYVENT</title>
    <!-- Bootstrap 5 CSS -->
     <link href="assets/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="assets/bootstrap.min.css">
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
        
        /* Event Cards */
        .event-card {
            border: none;
            border-radius: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        
        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        
        .event-img {
            height: 180px;
            object-fit: cover;
        }
        
        .event-status {
            position: absolute;
            top: 15px;
            right: 15px;
        }
        
        /* Badges */
        .badge-active {
            background-color: var(--success);
        }
        
        .badge-upcoming {
            background-color: var(--warning);
            color: var(--dark);
        }
        
        .badge-ended {
            background-color: var(--secondary);
        }
        
        .badge-cancelled {
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
                <a class="nav-link sidebar-link active mb-2 rounded" href="My_Events.html">
                    <i class="bi bi-calendar-event me-2"></i> My Events
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-link mb-2 rounded" href="Tickets.html">
                    <i class="bi bi-ticket-detailed me-2"></i> Tickets
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-link mb-2 rounded" href="Booths.Html">
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
            <h2 class="fw-bold">My Events</h2>
            <div>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i> Create New Event
                </button>
            </div>
        </div>
        
        <!-- Filter Bar -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <label for="searchEvent" class="form-label">Search</label>
                        <input type="text" class="form-control" id="searchEvent" placeholder="Event name, location...">
                    </div>
                    <div class="col-md-3">
                        <label for="eventStatus" class="form-label">Status</label>
                        <select class="form-select" id="eventStatus">
                            <option value="all">All Statuses</option>
                            <option value="active">Active</option>
                            <option value="upcoming">Upcoming</option>
                            <option value="ended">Ended</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="eventDate" class="form-label">Date Range</label>
                        <select class="form-select" id="eventDate">
                            <option value="all">All Dates</option>
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month">This Month</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-outline-secondary w-100">
                            <i class="bi bi-funnel"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Events Grid -->
        <div class="row g-4">
            <!-- Event 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card card h-100">
                    <div class="position-relative">
                        <img src="images (1).jpg" class="card-img-top event-img" alt="Event">
                        <span class="event-status badge badge-active">Active</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Dream Fest</h5>
                        <p class="card-text text-muted">
                            <i class="bi bi-geo-alt"></i> Yaoundé, Cameroon<br>
                            <i class="bi bi-calendar"></i> Oct 15, 2025 - Oct 17, 2025
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold">420</span> <small class="text-muted">tickets sold</small><br>
                                <span class="fw-bold">840,000 XAF</span> <small class="text-muted">revenue</small>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-action btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-action btn-outline-secondary me-1">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-action btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Event 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card card h-100">
                    <div class="position-relative">
                        <img src="download (3).jpg" class="card-img-top event-img" alt="Event">
                        <span class="event-status badge badge-active">Active</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Summer vibes</h5>
                        <p class="card-text text-muted">
                            <i class="bi bi-geo-alt"></i> Douala, Cameroon<br>
                            <i class="bi bi-calendar"></i> Nov 22, 2025 - Nov 24, 2025
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold">310</span> <small class="text-muted">tickets sold</small><br>
                                <span class="fw-bold">1,550,000 XAF</span> <small class="text-muted">revenue</small>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-action btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-action btn-outline-secondary me-1">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-action btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Event 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card card h-100">
                    <div class="position-relative">
                        <img src="download (1).jpg" class="card-img-top event-img" alt="Event">
                        <span class="event-status badge badge-upcoming">Upcoming</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Living Together Festival</h5>
                        <p class="card-text text-muted">
                            <i class="bi bi-geo-alt"></i> Yaoundé, Cameroon<br>
                            <i class="bi bi-calendar"></i> Dec 10, 2025 - Dec 15, 2025
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold">90</span> <small class="text-muted">tickets sold</small><br>
                                <span class="fw-bold">270,000 XAF</span> <small class="text-muted">revenue</small>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-action btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-action btn-outline-secondary me-1">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-action btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Event 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" class="card-img-top event-img" alt="Event">
                        <span class="event-status badge badge-ended">Ended</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Startup Workshop</h5>
                        <p class="card-text text-muted">
                            <i class="bi bi-geo-alt"></i> Douala, Cameroon<br>
                            <i class="bi bi-calendar"></i> Sep 5, 2025 - Sep 6, 2025
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold">75</span> <small class="text-muted">tickets sold</small><br>
                                <span class="fw-bold">375,000 XAF</span> <small class="text-muted">revenue</small>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-action btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-action btn-outline-secondary me-1">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-action btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Event 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top event-img" alt="Event">
                        <span class="event-status badge badge-ended">Ended</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Music Night Live</h5>
                        <p class="card-text text-muted">
                            <i class="bi bi-geo-alt"></i> Bafoussam, Cameroon<br>
                            <i class="bi bi-calendar"></i> Aug 20, 2023
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold">210</span> <small class="text-muted">tickets sold</small><br>
                                <span class="fw-bold">420,000 XAF</span> <small class="text-muted">revenue</small>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-action btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-action btn-outline-secondary me-1">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-action btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Create New Event Card -->
            <div class="col-lg-4 col-md-6">
                <div class="event-card card h-100 border-2 border-dashed">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <div class="bg-primary bg-opacity-10 p-4 rounded-circle mb-3">
                            <i class="bi bi-plus-lg fs-1 text-primary"></i>
                        </div>
                        <h5 class="card-title">Create New Event</h5>
                        <p class="card-text text-muted">Start selling tickets for your next event</p>
                        <button class="btn btn-primary mt-2">
                            <i class="bi bi-plus-circle me-2"></i> Create Event
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <nav class="mt-5">
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
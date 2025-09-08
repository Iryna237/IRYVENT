<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Dashboard | IRYVENT</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary: #7d5fff;
            --primary-light: #a78bfa;
            --secondary: #6c757d;
            --success: #28a745;
            --warning: #ffc107;
            --info: #17a2b8;
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
            transition: all 0.3s;
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
            transition: all 0.3s;
        }
        
        /* Stat Cards */
        .stat-card {
            border: none;
            border-radius: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        
        /* Custom background light */
        .bg-primary-light { background-color: var(--primary-light); }
        .bg-success-light { background-color: rgba(40,167,69,0.1); }
        .bg-warning-light { background-color: rgba(255,193,7,0.1); }
        .bg-info-light    { background-color: rgba(23,162,184,0.1); }
        
        /* Recent Events Table */
        .event-table {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        /* Quick Actions */
        .quick-action {
            border: 1px dashed var(--secondary);
            border-radius: 10px;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .quick-action:hover {
            background-color: rgba(125, 95, 255, 0.1);
            border-color: var(--primary);
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
                <a class="nav-link sidebar-link active mb-2 rounded" href="#">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item"><a class="nav-link sidebar-link mb-2 rounded" href="#"><i class="bi bi-calendar-event me-2"></i> My Events</a></li>
            <li class="nav-item"><a class="nav-link sidebar-link mb-2 rounded" href="#"><i class="bi bi-ticket-detailed me-2"></i> Tickets</a></li>
            <li class="nav-item"><a class="nav-link sidebar-link mb-2 rounded" href="#"><i class="bi bi-shop me-2"></i> Booths</a></li>
            <li class="nav-item"><a class="nav-link sidebar-link mb-2 rounded" href="#"><i class="bi bi-graph-up me-2"></i> Analytics</a></li>
            <li class="nav-item"><a class="nav-link sidebar-link mb-2 rounded" href="#"><i class="bi bi-wallet2 me-2"></i> Earnings</a></li>
            <li class="nav-item"><a class="nav-link sidebar-link mb-2 rounded" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Organizer Dashboard</h2>
            <button class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i> Create Event</button>
        </div>
        
        <!-- Stats Row -->
        <div class="row g-4 mb-4">
            <div class="col-md-6 col-lg-3">
                <div class="stat-card p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted">Total Events</h6>
                            <h3 class="fw-bold">8</h3>
                        </div>
                        <div class="bg-primary-light p-2 rounded">
                            <i class="bi bi-calendar-check text-primary fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-3"><span class="text-success"><i class="bi bi-arrow-up"></i> 12%</span><span class="text-muted ms-2">vs last month</span></div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="stat-card p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted">Tickets Sold</h6>
                            <h3 class="fw-bold">1,240</h3>
                        </div>
                        <div class="bg-success-light p-2 rounded">
                            <i class="bi bi-ticket-detailed text-success fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-3"><span class="text-success"><i class="bi bi-arrow-up"></i> 24%</span><span class="text-muted ms-2">vs last month</span></div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="stat-card p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted">Total Revenue</h6>
                            <h3 class="fw-bold">2,480,000 XAF</h3>
                        </div>
                        <div class="bg-warning-light p-2 rounded">
                            <i class="bi bi-currency-exchange text-warning fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-3"><span class="text-success"><i class="bi bi-arrow-up"></i> 18%</span><span class="text-muted ms-2">vs last month</span></div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="stat-card p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted">Net Earnings</h6>
                            <h3 class="fw-bold">2,455,200 XAF</h3>
                            <small class="text-muted">(After 1% commission)</small>
                        </div>
                        <div class="bg-info-light p-2 rounded">
                            <i class="bi bi-wallet2 text-info fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Charts Row -->
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="p-4 bg-white rounded">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold">Ticket Sales Overview</h5>
                        <select class="form-select form-select-sm" style="width: 150px;">
                            <option>Last 7 Days</option>
                            <option selected>Last 30 Days</option>
                            <option>Last 90 Days</option>
                        </select>
                    </div>
                    <canvas id="salesChart" height="300"></canvas>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="p-4 bg-white rounded">
                    <h5 class="fw-bold mb-3">Event Types Distribution</h5>
                    <canvas id="eventTypeChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Dashboard Charts -->
    <script>
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Tickets Sold',
                    data: [120, 190, 170, 220, 300, 280, 400],
                    borderColor: '#7d5fff',
                    backgroundColor: 'rgba(125, 95, 255, 0.1)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
        });
        
        const eventTypeCtx = document.getElementById('eventTypeChart').getContext('2d');
        new Chart(eventTypeCtx, {
            type: 'doughnut',
            data: {
                labels: ['Concerts', 'Conferences', 'Exhibitions', 'Workshops'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: ['#7d5fff','#28a745','#ffc107','#17a2b8'],
                    borderWidth: 0
                }]
            },
            options: { responsive: true, plugins: { legend: { position: 'bottom' } }, cutout: '70%' }
        });
    </script>
</body>
</html>

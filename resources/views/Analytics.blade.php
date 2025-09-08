<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Analytics | IRYVENT</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        
        /* Stat Cards */
        .stat-card {
            border: none;
            border-radius: 10px;
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.1);
        }
        
        /* Chart Containers */
        .chart-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        /* Timeframe Selector */
        .timeframe-selector .btn {
            border-radius: 20px;
            margin: 0 5px;
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
                <a class="nav-link sidebar-link mb-2 rounded" href="Booths.Html">
                    <i class="bi bi-shop me-2"></i> Booths
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link sidebar-link active mb-2 rounded" href="Analytics.html">
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
                <h2 class="fw-bold mb-0">Event Analytics</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                    </ol>
                </nav>
            </div>
            <div class="timeframe-selector">
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="timeframe" id="week" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="week">7 Days</label>
                    
                    <input type="radio" class="btn-check" name="timeframe" id="month" autocomplete="off">
                    <label class="btn btn-outline-primary" for="month">30 Days</label>
                    
                    <input type="radio" class="btn-check" name="timeframe" id="quarter" autocomplete="off">
                    <label class="btn btn-outline-primary" for="quarter">90 Days</label>
                    
                    <input type="radio" class="btn-check" name="timeframe" id="custom" autocomplete="off">
                    <label class="btn btn-outline-primary" for="custom">
                        <i class="bi bi-calendar-range me-1"></i> Custom
                    </label>
                </div>
            </div>
        </div>
        
        <!-- Stats Row -->
        <div class="row g-4 mb-4">
            <!-- Total Revenue -->
            <div class="col-md-6 col-lg-3">
                <div class="stat-card card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Total Revenue</h6>
                                <h2 class="fw-bold">5 200 000 XAF</h2>
                                <small>From tickets & booths</small>
                            </div>
                            <i class="bi bi-cash-coin fs-1 opacity-50"></i>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-white text-primary">
                                <i class="bi bi-arrow-up"></i> 12.5% vs last period
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tickets Sold -->
            <div class="col-md-6 col-lg-3">
                <div class="stat-card card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Tickets Sold</h6>
                                <h2 class="fw-bold">1,125</h2>
                                <small>Across all events</small>
                            </div>
                            <i class="bi bi-ticket-detailed fs-1 opacity-50"></i>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-white text-success">
                                <i class="bi bi-arrow-up"></i> 8.3% vs last period
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Booths Booked -->
            <div class="col-md-6 col-lg-3">
                <div class="stat-card card bg-warning text-dark">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">stand Booked</h6>
                                <h2 class="fw-bold">18</h2>
                                <small>Exhibitors & sponsors</small>
                            </div>
                            <i class="bi bi-shop fs-1 opacity-50"></i>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-white text-warning">
                                <i class="bi bi-arrow-up"></i> 20% vs last period
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Avg. Ticket Price -->
            <div class="col-md-6 col-lg-3">
                <div class="stat-card card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title">Avg. Ticket Price</h6>
                                <h2 class="fw-bold">2,000 XAF</h2>
                                <small>Across all types</small>
                            </div>
                            <i class="bi bi-tag fs-1 opacity-50"></i>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-white text-info">
                                <i class="bi bi-arrow-down"></i> 5% vs last period
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Charts Row -->
        <div class="row g-4 mb-4">
            <!-- Sales Trend -->
            <div class="col-lg-8">
                <div class="chart-container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold">Sales Performance Trend</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="salesDropdown" data-bs-toggle="dropdown">
                                <i class="bi bi-filter"></i> By Event
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">All Events</a></li>
                                <li><a class="dropdown-item" href="#">Afro Vibes Festival</a></li>
                                <li><a class="dropdown-item" href="#">Tech Summit Africa</a></li>
                            </ul>
                        </div>
                    </div>
                    <canvas id="salesTrendChart" height="250"></canvas>
                </div>
            </div>
            
            <!-- Revenue Distribution -->
            <div class="col-lg-4">
                <div class="chart-container">
                    <h5 class="fw-bold mb-3">Revenue Distribution</h5>
                    <canvas id="revenueDistributionChart" height="250"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Secondary Charts Row -->
        <div class="row g-4">
            <!-- Ticket Types -->
            <div class="col-lg-5">
                <div class="chart-container">
                    <h5 class="fw-bold mb-3">Ticket Type Performance</h5>
                    <canvas id="ticketTypeChart" height="250"></canvas>
                </div>
            </div>
            
            <!-- Booth Types -->
            <div class="col-lg-7">
                <div class="chart-container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold">stand Type Performance</h5>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="revenueToggle">
                            <label class="form-check-label" for="revenueToggle">Show Revenue</label>
                        </div>
                    </div>
                    <canvas id="standTypeChart" height="250"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Attendee Demographics -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="chart-container">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold">Attendee Demographics</h5>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-outline-primary active">Age</button>
                            <button type="button" class="btn btn-sm btn-outline-primary">Gender</button>
                            <button type="button" class="btn btn-sm btn-outline-primary">Location</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <canvas id="demographicsChart" height="250"></canvas>
                        </div>
                        <div class="col-lg-4">
                            <div class="mt-4 mt-lg-0">
                                <h6><i class="bi bi-people-fill me-2 text-primary"></i> Top Attendee Locations</h6>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Yaoundé
                                        <span class="badge bg-primary rounded-pill">42%</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Douala
                                        <span class="badge bg-primary rounded-pill">35%</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Bafoussam
                                        <span class="badge bg-primary rounded-pill">12%</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Other
                                        <span class="badge bg-primary rounded-pill">11%</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Data Export -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title fw-bold mb-0">Export Data</h5>
                            <div>
                                <button class="btn btn-outline-secondary me-2">
                                    <i class="bi bi-file-earmark-excel me-2"></i> Export as Excel
                                </button>
                                <button class="btn btn-outline-danger">
                                    <i class="bi bi-file-earmark-pdf me-2"></i> Export as PDF
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Dashboard Charts -->
    <script>
        // Sales Trend Chart (Line)
        const salesCtx = document.getElementById('salesTrendChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Ticket Sales',
                    data: [120, 190, 170, 220, 300, 280, 400],
                    borderColor: '#7d5fff',
                    backgroundColor: 'rgba(125, 95, 255, 0.1)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Booth Sales',
                    data: [50, 90, 120, 80, 150, 200, 180],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        // Revenue Distribution (Doughnut)
        const revenueCtx = document.getElementById('revenueDistributionChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'doughnut',
            data: {
                labels: ['Tickets', 'Booths', 'Sponsorships', 'Other'],
                datasets: [{
                    data: [45, 35, 15, 5],
                    backgroundColor: [
                        '#7d5fff',
                        '#28a745',
                        '#ffc107',
                        '#6c757d'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                },
                cutout: '70%'
            }
        });
        
        // Ticket Type Chart (Bar)
        const ticketTypeCtx = document.getElementById('ticketTypeChart').getContext('2d');
        const ticketTypeChart = new Chart(ticketTypeCtx, {
            type: 'bar',
            data: {
                labels: ['VIP', 'Standard', 'Early Bird', 'Group'],
                datasets: [{
                    label: 'Tickets Sold',
                    data: [120, 420, 180, 90],
                    backgroundColor: [
                        'rgba(125, 95, 255, 0.7)',
                        'rgba(40, 167, 69, 0.7)',
                        'rgba(255, 193, 7, 0.7)',
                        'rgba(108, 117, 125, 0.7)'
                    ],
                    borderColor: [
                        '#7d5fff',
                        '#28a745',
                        '#ffc107',
                        '#6c757d'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        // Booth Type Chart (Bar)
        const boothTypeCtx = document.getElementById('boothTypeChart').getContext('2d');
        const boothTypeChart = new Chart(boothTypeCtx, {
            type: 'bar',
            data: {
                labels: ['Standard', 'Premium', 'Sponsor'],
                datasets: [{
                    label: 'Quantity Booked',
                    data: [12, 6, 3],
                    backgroundColor: 'rgba(125, 95, 255, 0.7)',
                    borderColor: '#7d5fff',
                    borderWidth: 1
                },
                {
                    label: 'Revenue (in 1000 XAF)',
                    data: [900, 900, 900],
                    backgroundColor: 'rgba(40, 167, 69, 0.7)',
                    borderColor: '#28a745',
                    borderWidth: 1,
                    hidden: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        // Demographics Chart (Polar Area)
        const demoCtx = document.getElementById('demographicsChart').getContext('2d');
        const demoChart = new Chart(demoCtx, {
            type: 'polarArea',
            data: {
                labels: ['18-24', '25-34', '35-44', '45-54', '55+'],
                datasets: [{
                    data: [35, 40, 15, 7, 3],
                    backgroundColor: [
                        'rgba(125, 95, 255, 0.7)',
                        'rgba(40, 167, 69, 0.7)',
                        'rgba(255, 193, 7, 0.7)',
                        'rgba(220, 53, 69, 0.7)',
                        'rgba(108, 117, 125, 0.7)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    }
                }
            }
        });
        
        // Toggle booth chart data
        document.getElementById('revenueToggle').addEventListener('change', function() {
            const isRevenue = this.checked;
            boothTypeChart.data.datasets[0].hidden = isRevenue;
            boothTypeChart.data.datasets[1].hidden = !isRevenue;
            boothTypeChart.update();
        });
    </script>
</body>
</html>
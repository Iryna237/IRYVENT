@extends(layouts.layout)

@section('content')
        <style>
        :root {
            --primary-color: #6f42c1; /* IRYVENT purple */
            --secondary-color: #20c997;
        }
        
        .dashboard-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            border-left: 4px solid var(--primary-color);
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        
        .card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .card-trend {
            font-size: 0.9rem;
        }
        
        .trend-up {
            color: #28a745;
        }
        
        .trend-down {
            color: #dc3545;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .payout-status {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
    </style>

    <div class="container-fluid py-4">
        <h2 class="mb-4">Earnings Dashboard</h2>
        
        <!-- 1. Key Metrics Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Gross Revenue</h5>
                    <p class="card-value">1 200,000XAF</p>
                        <p class="card-trend trend-up">↑ 12% vs last event</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Net Revenue</h5>
                        <p class="card-value">2,365,800XAF</p>
                        <small class="text-muted">After 1% platform fee</small>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Tickets Sold</h5>
                        <p class="card-value">655</p>
                        <p class="card-trend">84% of capacity</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">IRYVENT Fee</h5>
                        <p class="card-value">2,365,800XAF</p>
                        <small class="text-muted">1% of gross revenue</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- 2. Charts Row -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="chart-container">
                    <h5>Revenue Breakdown</h5>
                    <canvas id="revenuePieChart"></canvas>
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <div class="chart-container">
                    <h5>Sales Trend (Last 7 Days)</h5>
                    <canvas id="salesTrendChart"></canvas>
                </div>
            </div>
        </div>
        
        <!-- 3. Payout Status -->
        <div class="row">
            <div class="col-12">
                <div class="card payout-status">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Next Payout</h5>
                                <p class="mb-1">Amount: <strong>2,365.800XAF</strong></p>
                                <p class="mb-0">Status: <span class="badge bg-warning">Pending</span></p>
                            </div>
                            <div>
                                <p class="mb-2 text-end">Estimated payout date</p>
                                <h4 class="text-end">Aug 15, 2025</h4>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 10px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%;" 
                                 aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-muted">Funds held for 48h after event completion</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Charts -->
    <script>
        // Revenue Pie Chart
        const pieCtx = document.getElementById('revenuePieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Standard Tickets', 'VIP Tickets', 'Premium Tickets',],
                datasets: [{
                    data: [2400, 1500, 320, 800, 400],
                    backgroundColor: [
                        '#4e73df',
                        '#1cc88a',
                        '#36b9cc',
                        '#f6c23e',
                        '#e74a3b'
                    ],
                    hoverBorderColor: "#fff"
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return ` $${context.raw} (${Math.round(context.parsed)}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Sales Trend Line Chart
        const lineCtx = document.getElementById('salesTrendChart').getContext('2d');
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
                datasets: [{
                    label: 'Daily Revenue ($)',
                    data: [220, 180, 1800, 750, 950, 3200, 200],
                    backgroundColor: 'rgba(111, 66, 193, 0.1)',
                    borderColor: 'rgba(111, 66, 193, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(111, 66, 193, 1)',
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection



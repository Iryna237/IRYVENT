<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRYVENT - Your Tickets</title>
    <!-- Bootstrap 5 CSS -->
    <link href="assets/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6f42c1; /* IRYVENT purple */
            --secondary-color: #20c997;
            --ticket-primary: #6f42c1;
            --ticket-secondary: #8a63d2;
        }
        
        body {
            background-color: #f8f9fa;
        }
        
        .ticket-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            border: none;
            transition: transform 0.3s;
            background: linear-gradient(135deg, var(--ticket-primary) 0%, var(--ticket-secondary) 100%);
            color: white;
            position: relative;
        }
        
        .ticket-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .ticket-card.vip {
            --ticket-primary: #ff9800;
            --ticket-secondary: #ffc107;
            color: #000;
        }
        
        .ticket-card.premium {
            --ticket-primary: #9c27b0;
            --ticket-secondary: #673ab7;
        }
        
        .ticket-header {
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        .ticket-header::before {
            content: "";
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        
        .ticket-header::after {
            content: "";
            position: absolute;
            bottom: -80px;
            right: -30px;
            width: 150px;
            height: 150px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }
        
        .ticket-body {
            background: white;
            padding: 25px;
            color: #333;
            position: relative;
        }
        
        .ticket-body::before {
            content: "";
            position: absolute;
            top: -20px;
            left: 0;
            right: 0;
            height: 20px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 500 20" xmlns="http://www.w3.org/2000/svg"><path d="M0,10 C100,25 150,0 250,10 C350,20 400,5 500,10 L500,20 L0,20 Z" fill="white"/></svg>');
            background-size: 500px 20px;
        }
        
        .ticket-qr {
            width: 120px;
            height: 120px;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #eee;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .ticket-qr img {
            max-width: 100%;
            height: auto;
        }
        
        .ticket-divider {
            border-left: 2px dashed #ddd;
            height: 100%;
            position: absolute;
            left: 50%;
            top: 0;
        }
        
        .ticket-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 0.8rem;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 20px;
            background: rgba(0,0,0,0.2);
            backdrop-filter: blur(5px);
        }
        
        .delivery-method {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .delivery-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 15px;
        }
        
        .btn-download {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            font-weight: 600;
        }
        
        .btn-download:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .event-image {
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary">Your Tickets</h1>
            <p class="lead">Your purchase was successful! Here are your tickets</p>
        </div>
        
        <!-- Event Summary -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <img src="https://via.placeholder.com/400x200?text=Afrobeat+Festival" alt="Event" class="img-fluid rounded event-image">
                    </div>
                    <div class="col-md-6">
                        <h3>Afrobeat Festival 2024</h3>
                        <p class="text-muted mb-1"><i class="fas fa-calendar-alt me-2"></i> December 15-17, 2024</p>
                        <p class="text-muted mb-1"><i class="fas fa-map-marker-alt me-2"></i> Yaoundé Conference Center, Cameroon</p>
                        <p class="text-muted"><i class="fas fa-receipt me-2"></i> Transaction ID: MTN20231115XYZ</p>
                    </div>
                    <div class="col-md-3 text-md-end">
                        <button class="btn btn-primary me-2">
                            <i class="fas fa-share-alt me-1"></i> Share
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-print me-1"></i> Print All
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Delivery Methods -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="delivery-method d-flex align-items-center">
                    <div class="delivery-icon bg-danger">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Email Delivery</h5>
                        <p class="text-muted mb-0">Sent to: user@example.com</p>
                        <small class="text-success"><i class="fas fa-check-circle me-1"></i> Delivered</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="delivery-method d-flex align-items-center">
                    <div class="delivery-icon bg-success">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">WhatsApp Delivery</h5>
                        <p class="text-muted mb-0">Sent to: +237 6XX XXX XXX</p>
                        <small class="text-success"><i class="fas fa-check-circle me-1"></i> Delivered</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tickets -->
        <div class="row">
            <!-- VIP Ticket -->
            <div class="col-lg-6 mb-4">
                <div class="ticket-card vip h-100">
                    <div class="ticket-header">
                        <span class="ticket-badge">VIP</span>
                        <h3 class="mb-0">VIP Experience</h3>
                        <p class="mb-0">Front row access + VIP lounge</p>
                    </div>
                    <div class="ticket-body">
                        <div class="row">
                            <div class="col-md-6 position-relative">
                                <div class="pe-3">
                                    <h5 class="mb-3">Ticket #1</h5>
                                    <p><strong>Name:</strong> John Doe</p>
                                    <p><strong>Date:</strong> Dec 15, 2024</p>
                                    <p><strong>Time:</strong> 6:00 PM</p>
                                    <button class="btn btn-download mt-3">
                                        <i class="fas fa-download me-1"></i> Download
                                    </button>
                                </div>
                                <div class="ticket-divider d-none d-md-block"></div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="ticket-qr mb-3">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://iryvent.com/tickets/ABC123" alt="QR Code">
                                </div>
                                <small class="text-muted">Scan at entrance</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- VIP Ticket 2 -->
            <div class="col-lg-6 mb-4">
                <div class="ticket-card vip h-100">
                    <div class="ticket-header">
                        <span class="ticket-badge">VIP</span>
                        <h3 class="mb-0">VIP Experience</h3>
                        <p class="mb-0">Front row access + VIP lounge</p>
                    </div>
                    <div class="ticket-body">
                        <div class="row">
                            <div class="col-md-6 position-relative">
                                <div class="pe-3">
                                    <h5 class="mb-3">Ticket #2</h5>
                                    <p><strong>Name:</strong> Jane Smith</p>
                                    <p><strong>Date:</strong> Dec 15, 2024</p>
                                    <p><strong>Time:</strong> 6:00 PM</p>
                                    <button class="btn btn-download mt-3">
                                        <i class="fas fa-download me-1"></i> Download
                                    </button>
                                </div>
                                <div class="ticket-divider d-none d-md-block"></div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="ticket-qr mb-3">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://iryvent.com/tickets/XYZ789" alt="QR Code">
                                </div>
                                <small class="text-muted">Scan at entrance</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- General Admission Ticket -->
            <div class="col-lg-6 mb-4">
                <div class="ticket-card h-100">
                    <div class="ticket-header">
                        <span class="ticket-badge">Standard</span>
                        <h3 class="mb-0">General Admission</h3>
                        <p class="mb-0">Standard event access</p>
                    </div>
                    <div class="ticket-body">
                        <div class="row">
                            <div class="col-md-6 position-relative">
                                <div class="pe-3">
                                    <h5 class="mb-3">Ticket #3</h5>
                                    <p><strong>Name:</strong> Guest</p>
                                    <p><strong>Date:</strong> Dec 15, 2024</p>
                                    <p><strong>Time:</strong> 6:00 PM</p>
                                    <button class="btn btn-download mt-3">
                                        <i class="fas fa-download me-1"></i> Download
                                    </button>
                                </div>
                                <div class="ticket-divider d-none d-md-block"></div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="ticket-qr mb-3">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://iryvent.com/tickets/DEF456" alt="QR Code">
                                </div>
                                <small class="text-muted">Scan at entrance</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Actions -->
        <div class="text-center mt-4">
            <button class="btn btn-primary btn-lg me-3">
                <i class="fas fa-calendar-alt me-1"></i> Add to Calendar
            </button>
            <button class="btn btn-outline-primary btn-lg">
                <i class="fas fa-map-marked-alt me-1"></i> View Venue Map
            </button>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sample functionality
        document.querySelectorAll('.btn-download').forEach(btn => {
            btn.addEventListener('click', function() {
                const ticketName = this.closest('.ticket-card').querySelector('h3').textContent;
                alert(`Downloading ${ticketName} ticket as PDF`);
            });
        });
    </script>
</body>
</html>
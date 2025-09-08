<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRYVENT - Purchase Tickets</title>
    <!-- Bootstrap 5 CSS -->
   <link href="assets/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6f42c1; /* IRYVENT purple */
            --secondary-color: #20c997;
        }
        
        .event-header {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://via.placeholder.com/1200x400');
            background-size: cover;
            background-position: center;
            color: white;
            border-radius: 10px;
            padding: 3rem;
            margin-bottom: 2rem;
        }
        
        .ticket-option-card {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            transition: all 0.3s;
            margin-bottom: 1.5rem;
        }
        
        .ticket-option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border-color: var(--primary-color);
        }
        
        .ticket-option-card.selected {
            border: 2px solid var(--primary-color);
            background-color: rgba(111, 66, 193, 0.05);
        }
        
        .vip-badge {
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
        }
        
        .btn-checkout {
            background-color: var(--primary-color);
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .payment-method {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .payment-method:hover, .payment-method.selected {
            border-color: var(--primary-color);
            background-color: rgba(111, 66, 193, 0.05);
        }
        
        .quantity-selector {
            width: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <!-- Event Header -->
        <div class="event-header text-center">
            <h1 class="display-5 fw-bold">Afrobeat Festival 2024</h1>
            <p class="lead">December 15-17, 2024 • Yaoundé Conference Center</p>
        </div>
        
        <div class="row">
            <!-- Ticket Selection -->
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h3 class="mb-0"><i class="fas fa-ticket-alt me-2"></i>Select Tickets</h3>
                    </div>
                    <div class="card-body">
                        <!-- Ticket Option 1 -->
                        <div class="ticket-option-card p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge vip-badge mb-2">VIP</span>
                                    <h4 class="mb-1">VIP Experience</h4>
                                    <p class="text-muted">Front row access + VIP lounge</p>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-check-circle text-success me-2"></i>Premium seating</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i>Free drinks</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i>Backstage pass</li>
                                    </ul>
                                </div>
                                <div class="text-end">
                                    <h3 class="text-primary">25,000 XAF</h3>
                                    <div class="input-group quantity-selector mx-auto">
                                        <button class="btn btn-outline-secondary" type="button">-</button>
                                        <input type="text" class="form-control text-center" value="0">
                                        <button class="btn btn-outline-secondary" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Ticket Option 2 -->
                        <div class="ticket-option-card p-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge bg-primary mb-2">Standard</span>
                                    <h4 class="mb-1">General Admission</h4>
                                    <p class="text-muted">Standard event access</p>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-check-circle text-success me-2"></i>General seating</li>
                                        <li><i class="fas fa-check-circle text-success me-2"></i>Access to main stage</li>
                                    </ul>
                                </div>
                                <div class="text-end">
                                    <h3 class="text-primary">10,000 XAF</h3>
                                    <div class="input-group quantity-selector mx-auto">
                                        <button class="btn btn-outline-secondary" type="button">-</button>
                                        <input type="text" class="form-control text-center" value="0">
                                        <button class="btn btn-outline-secondary" type="button">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Method -->
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h3 class="mb-0"><i class="fas fa-credit-card me-2"></i>Payment Method</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="payment-method selected">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="mtnMoney" checked>
                                        <label class="form-check-label" for="mtnMoney">
                                            <img src="https://via.placeholder.com/80x30?text=MTN+MoMo" alt="MTN Mobile Money" class="ms-2">
                                        </label>
                                    </div>
                                    <div class="mt-2 ms-4">
                                        <small class="text-muted">You'll be redirected to MTN Mobile Money</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="payment-method">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="orangeMoney">
                                        <label class="form-check-label" for="orangeMoney">
                                            <img src="https://via.placeholder.com/80x30?text=Orange+Money" alt="Orange Money" class="ms-2">
                                        </label>
                                    </div>
                                    <div class="mt-2 ms-4">
                                        <small class="text-muted">You'll be redirected to Orange Money</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="payment-method">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard">
                                        <label class="form-check-label" for="creditCard">
                                            <i class="fab fa-cc-visa fa-lg ms-2"></i>
                                            <i class="fab fa-cc-mastercard fa-lg ms-2"></i>
                                        </label>
                                    </div>
                                    <div class="mt-2 ms-4">
                                        <small class="text-muted">Secure credit card payment</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card sticky-top" style="top: 20px;">
                    <div class="card-header bg-white">
                        <h3 class="mb-0"><i class="fas fa-receipt me-2"></i>Order Summary</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>VIP Experience x 2</span>
                            <span>50,000 XAF</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>General Admission x 1</span>
                            <span>10,000 XAF</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <strong>Subtotal</strong>
                            <strong>60,000 XAF</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-3 text-success">
                            <span>Discount</span>
                            <span>-0 XAF</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Fees</span>
                            <span>600 XAF</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <h5>Total</h5>
                            <h5 class="text-primary">60,600 XAF</h5>
                        </div>
                        
                        <button class="btn btn-checkout btn-primary w-100 py-3">
                            <i class="fas fa-lock me-2"></i>Complete Purchase
                        </button>
                        
                        <div class="mt-3 text-center">
                            <small class="text-muted">By completing your purchase, you agree to our <a href="#">Terms of Service</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple quantity selector functionality
        document.querySelectorAll('.quantity-selector .btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                let value = parseInt(input.value);
                
                if (this.textContent === '+' && value < 10) {
                    input.value = value + 1;
                } else if (this.textContent === '-' && value > 0) {
                    input.value = value - 1;
                }
                
                // Update order summary (would be dynamic in real app)
                updateOrderSummary();
            });
        });
        
        // Payment method selection
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', function() {
                document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('selected'));
                this.classList.add('selected');
                this.querySelector('input').checked = true;
            });
        });
        
        function updateOrderSummary() {
            // In a real app, this would calculate totals from selected tickets
            console.log("Order summary would update here");
        }
    </script>
</body>
</html>
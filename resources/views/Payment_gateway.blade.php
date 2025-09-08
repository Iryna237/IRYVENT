<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRYVENT - Mobile Money Payment</title>
    <!-- Bootstrap 5 CSS -->
    <link href="assets/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6f42c1; /* IRYVENT purple */
            --secondary-color: #20c997;
            --mtn-yellow: #ffcc00;
        }
        
        .payment-container {
            max-width: 500px;
            margin: 2rem auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .payment-header {
            background-color: var(--mtn-yellow);
            color: #000;
            padding: 1.5rem;
            text-align: center;
        }
        
        .payment-body {
            background: white;
            padding: 2rem;
        }
        
        .payment-logo {
            height: 40px;
            margin-bottom: 1rem;
        }
        
        .form-control:focus {
            border-color: var(--mtn-yellow);
            box-shadow: 0 0 0 0.25rem rgba(255, 204, 0, 0.25);
        }
        
        .btn-mtn {
            background-color: var(--mtn-yellow);
            color: #000;
            font-weight: 600;
            padding: 12px;
            border: none;
        }
        
        .btn-mtn:hover {
            background-color: #e6b800;
            color: #000;
        }
        
        .countdown {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .payment-steps {
            position: relative;
            padding-left: 30px;
            margin-bottom: 1.5rem;
        }
        
        .payment-steps::before {
            content: "";
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #eee;
        }
        
        .step {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .step-number {
            position: absolute;
            left: -30px;
            width: 24px;
            height: 24px;
            background: var(--mtn-yellow);
            color: #000;
            border-radius: 50%;
            text-align: center;
            font-weight: bold;
            font-size: 0.9rem;
            line-height: 24px;
        }
        
        .loader {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid var(--mtn-yellow);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="payment-container">
            <!-- Payment Header -->
            <div class="payment-header">
                <img src="https://via.placeholder.com/150x50?text=MTN+MoMo" alt="MTN Mobile Money" class="payment-logo">
                <h4>Mobile Money Payment</h4>
            </div>
            
            <!-- Payment Body -->
            <div class="payment-body">
                <!-- Step 1: Enter Phone Number -->
                <div id="step1">
                    <div class="payment-steps">
                        <div class="step">
                            <span class="step-number">1</span>
                            <h5>Enter Your MTN Mobile Money Number</h5>
                            <p class="text-muted">We'll send a payment request to this number</p>
                            
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">+237</span>
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="6XX XXX XXX" pattern="[0-9]{9}">
                                </div>
                                <small class="text-muted">Enter your 9-digit MTN number without the country code</small>
                            </div>
                            
                            <button class="btn btn-mtn w-100" onclick="nextStep()">
                                Continue <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Step 2: Confirm Payment -->
                <div id="step2" class="hidden">
                    <div class="payment-steps">
                        <div class="step">
                            <span class="step-number">2</span>
                            <h5>Confirm Your Payment</h5>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                A payment request has been sent to <strong id="displayNumber">6XX XXX XXX</strong>
                            </div>
                            
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Event Tickets</span>
                                        <span>15,000 XAF</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Service Fee</span>
                                        <span>200 XAF</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <strong>Total</strong>
                                        <strong class="text-primary">15 200 XAF</strong>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center mb-4">
                                <p>Waiting for payment confirmation...</p>
                                <div class="loader"></div>
                                <p class="countdown">01:00</p>
                            </div>
                            
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Important:</strong> Enter your Mobile Money PIN when prompted on your phone
                            </div>
                            
                            <button class="btn btn-outline-secondary w-100 mb-2" onclick="previousStep()">
                                <i class="fas fa-arrow-left me-2"></i> Change Number
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Step 3: Payment Success -->
                <div id="step3" class="hidden">
                    <div class="text-center py-4">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h3>Payment Successful!</h3>
                        <p class="text-muted mb-4">Your tickets have been reserved</p>
                        
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-1"><strong>Transaction ID:</strong> MTN20231115XYZ</p>
                                <p class="mb-1"><strong>Amount:</strong> 15 000 XAF</p>
                                <p class="mb-0"><strong>Date:</strong> 15 Nov 2025, 14:30</p>
                            </div>
                        </div>
                        
                        <div class="alert alert-success">
                            <i class="fas fa-envelope me-2"></i>
                            Your tickets with QR codes have been sent to your email 
                        </div>
                        
                        <button class="btn btn-mtn w-100 mt-3">
                            <i class="fas fa-ticket-alt me-2"></i> View Tickets
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Simulate payment flow
        function nextStep() {
            const phoneNumber = document.getElementById('phoneNumber').value;
            
            if (!phoneNumber.match(/^[0-9]{9}$/)) {
                alert('Please enter a valid 9-digit MTN number');
                return;
            }
            
            document.getElementById('step1').classList.add('hidden');
            document.getElementById('step2').classList.remove('hidden');
            document.getElementById('displayNumber').textContent = '6'+phoneNumber.substring(0,2)+' '+phoneNumber.substring(2,5)+' '+phoneNumber.substring(5);
            
            // Start countdown
            startCountdown();
            
            // Simulate successful payment after 5 seconds
            setTimeout(() => {
                document.getElementById('step2').classList.add('hidden');
                document.getElementById('step3').classList.remove('hidden');
            }, 5000);
        }
        
        function previousStep() {
            document.getElementById('step2').classList.add('hidden');
            document.getElementById('step1').classList.remove('hidden');
        }
        
        function startCountdown() {
            let timeLeft = 180; // 3 minutes
            const countdownElement = document.querySelector('.countdown');
            
            const timer = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                
                countdownElement.textContent = 
                    `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    // In real app, would check payment status
                } else {
                    timeLeft--;
                }
            }, 1000);
        }
    </script>
</body>
</html>
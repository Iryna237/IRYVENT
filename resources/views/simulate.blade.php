<!-- resources/views/payment/simulate.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotchPay - Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }
        .payment-container {
            max-width: 500px;
            margin: 2rem auto;
        }
        .payment-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .payment-header {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        .payment-body {
            padding: 2rem;
        }
        .notchpay-logo {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .payment-amount {
            font-size: 2.5rem;
            font-weight: bold;
            margin: 1rem 0;
        }
        .phone-input {
            border-radius: 10px;
            border: 2px solid #e2e8f0;
            padding: 1rem;
            font-size: 1.1rem;
            transition: all 0.3s;
        }
        .phone-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        .btn-pay {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-pay:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
        }
        .payment-methods {
            display: flex;
            gap: 1rem;
            margin: 1.5rem 0;
        }
        .method-btn {
            flex: 1;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }
        .method-btn.active {
            border-color: #4f46e5;
            background: #f8faff;
        }
        .method-icon {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            color: #64748b;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <div class="payment-card">
            <div class="payment-header">
                <div class="notchpay-logo">
                    <i class="fas fa-shield-alt"></i> NOTCHPAY
                </div>
                <p>Secure Payment Gateway</p>
            </div>
            
            <div class="payment-body">
                <div class="text-center mb-4">
                    <h4>Complete Your Payment</h4>
                    <div class="payment-amount text-primary">
                        {{ number_format($commande->amount, 0, ',', ' ') }} XAF
                    </div>
                    <p class="text-muted">
                        {{ $commande->event->title }} - {{ ucfirst($commande->ticket_type) }} Ticket
                    </p>
                </div>

                <form action="{{ route('payment.process') }}" method="POST" id="paymentForm">
                    @csrf
                    <input type="hidden" name="commande_id" value="{{ $commande->id }}">

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Phone Number (Optional)</label>
                        <input type="tel" 
                               name="phone_number" 
                               class="form-control phone-input" 
                               placeholder="6XX XX XX XX"
                               pattern="[0-9]{9}">
                        <small class="text-muted">Enter your mobile money number (simulation only)</small>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Email for Ticket Delivery *</label>
                        <input type="email" 
                            name="email" 
                            class="form-control phone-input" 
                            placeholder="your-email@example.com"
                            value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                            required>
                        <small class="text-muted">Your e-ticket will be sent to this address</small>
                    </div>
                    <div class="payment-methods">
                        <div class="method-btn active" data-method="mobile">
                            <div class="method-icon text-success">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div>Mobile Money</div>
                        </div>
                        <div class="method-btn" data-method="card">
                            <div class="method-icon text-primary">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div>Card</div>
                        </div>
                    </div>

                    <input type="hidden" name="payment_method" value="mobile" id="paymentMethod">

                    <button type="submit" class="btn-pay" id="payButton">
                        <i class="fas fa-lock me-2"></i>
                        Pay Now
                    </button>

                    <div class="security-badge">
                        <i class="fas fa-shield-alt text-success"></i>
                        <span>Secure SSL Encryption</span>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        This is a simulation. No real payment will be processed.
                    </small>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const methodButtons = document.querySelectorAll('.method-btn');
            const paymentMethodInput = document.getElementById('paymentMethod');

            methodButtons.forEach(button => {
                button.addEventListener('click', function() {
                    methodButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    paymentMethodInput.value = this.dataset.method;
                });
            });

            const payButton = document.getElementById('payButton');
            const paymentForm = document.getElementById('paymentForm');

            paymentForm.addEventListener('submit', function(e) {
                payButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                payButton.disabled = true;
                
                setTimeout(() => {
                    paymentForm.submit();
                }, 2000);
                
                e.preventDefault();
            });
        });
    </script>
</body>
</html>
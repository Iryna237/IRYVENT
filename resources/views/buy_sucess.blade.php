<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .success-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .success-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            max-width: 600px;
            width: 100%;
        }
        .success-icon {
            font-size: 4rem;
            color: #10b981;
            margin-bottom: 1rem;
        }
        .order-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-card">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="text-success mb-3">Payment Successful!</h1>
            <p class="lead mb-4">{{ session('success') }}</p>
            
            @if($commande)
            <div class="order-details">
                <h5>Order Details:</h5>
                <p><strong>Order ID:</strong> #{{ $commande->id }}</p>
                <p><strong>Event:</strong> {{ $commande->event->title }}</p>
                <p><strong>Ticket Type:</strong> {{ ucfirst($commande->ticket_type) }}</p>
                <p><strong>Amount:</strong> {{ number_format($commande->amount, 0, ',', ' ') }} XAF</p>
                <p><strong>Reference:</strong> {{ $commande->reference }}</p>
            </div>
            @endif

            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="{{ route('eventshop') }}" class="btn btn-primary me-md-2">
                    <i class="fas fa-calendar me-2"></i>Browse More Events
                </a>
                <a href="#" class="btn btn-outline-primary">
                    <i class="fas fa-ticket-alt me-2"></i>View My Tickets
                </a>
            </div>
        </div>
    </div>
</body>
</html>
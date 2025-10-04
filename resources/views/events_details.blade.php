<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }} - Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Votre CSS existant reste le même */
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #8b5cf6;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #64748b;
            --gray-light: #e2e8f0;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            padding: 0;
            margin: 0;
        }

        .event-hero {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.9), rgba(139, 92, 246, 0.9));
            color: white;
            padding: 3rem 0;
            position: relative;
            overflow: hidden;
        }

        .event-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;
            z-index: -1;
            opacity: 0.2;
        }

        .event-content {
            background: white;
            border-radius: 24px 24px 0 0;
            margin-top: -2rem;
            position: relative;
            box-shadow: 0 -20px 40px rgba(0, 0, 0, 0.1);
        }

        .event-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .event-meta-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .meta-card {
            background: var(--light);
            padding: 1.5rem;
            border-radius: 16px;
            border-left: 4px solid var(--primary);
        }

        .meta-card i {
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .ticket-section {
            background: var(--light);
            border-radius: 20px;
            padding: 2rem;
            margin: 2rem 0;
        }

        .ticket-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            margin-bottom: 1.5rem;
            background: white;
        }

        .ticket-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .ticket-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1.5rem;
            position: relative;
        }

        .ticket-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        .ticket-body {
            padding: 2rem;
        }

        .ticket-price {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            text-align: center;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .benefits-list {
            list-style: none;
            padding: 0;
            margin-bottom: 2rem;
        }

        .benefits-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .benefits-list li:last-child {
            border-bottom: none;
        }

        .benefits-list li i {
            color: var(--success);
            font-size: 1.1rem;
            width: 20px;
        }

        .btn-purchase {
            background: linear-gradient(135deg, var(--success), #059669);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 1rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        }

        .btn-purchase:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(16, 185, 129, 0.4);
            color: white;
        }

        .btn-purchase:disabled {
            background: var(--gray);
            transform: none;
            box-shadow: none;
            cursor: not-allowed;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.3);
            color: white;
            transform: translateY(-2px);
        }

        .availability-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 1rem;
        }

        .availability-low {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .availability-good {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .event-category {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .sold-out-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            border-radius: 16px;
        }

        .sold-out-text {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            transform: rotate(-15deg);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ticket-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .ticket-card:nth-child(2) { animation-delay: 0.1s; }
        .ticket-card:nth-child(3) { animation-delay: 0.2s; }
        .ticket-card:nth-child(4) { animation-delay: 0.3s; }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="event-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <a href="{{ route('eventshop') }}" class="btn-back mb-4">
                        <i class="fas fa-arrow-left"></i>
                        Back to Events
                    </a>
                    <span class="event-category mb-3 d-inline-block">
                        {{ ucfirst($event->event_type) }}
                    </span>
                    <h1 class="display-4 fw-bold mb-3">{{ $event->title }}</h1>
                    <p class="lead mb-0">{{ $event->location }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="event-content">
        <div class="container py-5">
            <div class="row">
                <!-- Event Details -->
                <div class="col-lg-8">
                    <div class="mb-5">
                        <img src="{{ $event->banner ? asset('storage/' . $event->banner) : 'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80' }}" 
                             class="event-image" alt="{{ $event->title }}">
                    </div>

                    <div class="event-meta-grid">
                        <div class="meta-card">
                            <i class="fas fa-map-marker-alt"></i>
                            <h5>Location</h5>
                            <p class="mb-0 text-dark fw-semibold">{{ $event->location }}</p>
                        </div>
                        <div class="meta-card">
                            <i class="fas fa-calendar-alt"></i>
                            <h5>Date</h5>
                            <p class="mb-0 text-dark fw-semibold">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                            </p>
                        </div>
                        <div class="meta-card">
                            <i class="fas fa-clock"></i>
                            <h5>Time</h5>
                            <p class="mb-0 text-dark fw-semibold">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }}
                            </p>
                        </div>
                        <div class="meta-card">
                            <i class="fas fa-calendar-check"></i>
                            <h5>Ends</h5>
                            <p class="mb-0 text-dark fw-semibold">
                                {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }}
                            </p>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h3 class="fw-bold mb-4" style="color: var(--dark);">Event Description</h3>
                        <p class="text-muted fs-6 lh-lg" style="font-size: 1.1rem;">{{ $event->description }}</p>
                    </div>
                </div>

                <!-- Tickets Section -->
                <div class="col-lg-4">
                    <div class="ticket-section">
                        <h3 class="fw-bold mb-4 text-center" style="color: var(--dark);">
                            <i class="fas fa-ticket-alt me-2"></i>
                            Choose Your Ticket
                        </h3>

                        @foreach($event->tickets as $ticket)
                        <div class="ticket-card">
                            @if($ticket->quantity <= 0)
                            <div class="sold-out-overlay">
                                <div class="sold-out-text">
                                    <i class="fas fa-times-circle me-2"></i>
                                    SOLD OUT
                                </div>
                            </div>
                            @endif

                            <div class="ticket-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0 text-capitalize fw-bold">{{ $ticket->type }}</h4>
                                    <span class="ticket-badge">{{ $ticket->quantity }} tickets</span>
                                </div>
                            </div>
                            
                            <div class="ticket-body">
                                <div class="ticket-price">{{ number_format($ticket->price, 0, ',', ' ') }} XAF</div>
                                
                                @if($ticket->description)
                                <h6 class="fw-semibold mb-3">🎁 Included Benefits:</h6>
                                <ul class="benefits-list">
                                    @foreach(explode(',', $ticket->description) as $benefit)
                                    <li>
                                        <i class="fas fa-check-circle"></i>
                                        <span>{{ trim($benefit) }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif

                                <form action="{{ route('checkout') }}" method="POST" class="payment-form">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                    <input type="hidden" name="amount" value="{{ $ticket->price }}">
                                    <input type="hidden" name="currency" value="XAF">
                                    <input type="hidden" name="ticket_type" value="{{ $ticket->type }}">
                                    <input type="hidden" name="email" value="{{ auth()->check() ? auth()->user()->email : 'customer@example.com' }}">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email for ticket delivery</label>
                                        <input type="email" 
                                            class="form-control" 
                                            id="email" 
                                            name="email" 
                                            value="{{ auth()->check() ? auth()->user()->email : '' }}"
                                            placeholder="your-email@example.com"
                                            required>
                                        <small class="text-muted">We'll send your e-ticket to this address</small>
                                    </div>
                                    
                                    <button type="submit" class="btn-purchase" {{ $ticket->quantity <= 0 ? 'disabled' : '' }}>
                                        <i class="fas fa-credit-card"></i>
                                        {{ $ticket->quantity <= 0 ? 'SOLD OUT' : 'Buy Now' }}
                                    </button>
                                </form>

                                @if($ticket->quantity > 0 && $ticket->quantity < 10)
                                <div class="availability-badge availability-low">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Only {{ $ticket->quantity }} tickets left!
                                </div>
                                @elseif($ticket->quantity >= 10)
                                <div class="availability-badge availability-good">
                                    <i class="fas fa-check-circle"></i>
                                    Tickets available
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add loading state to buttons
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.payment-form');
            
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button[type="submit"]');
                    if (button && !button.disabled) {
                        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                        button.disabled = true;
                    }
                });
            });
        });
    </script>
</body>
</html>
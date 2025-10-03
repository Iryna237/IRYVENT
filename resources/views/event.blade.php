<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e54c8;
            --secondary-color: #8f94fb;
            --accent-color: #ff6b6b;
        }
        
        body {
            background: linear-gradient(to right, #fdfbfb, #ebedee);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        
        .event-card {
            transition: 0.3s;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            height: 100%;
        }
        
        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }
        
        .event-banner {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .card-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
        
        .event-details {
            margin-bottom: 1.2rem;
        }
        
        .event-details p {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .event-details i {
            margin-right: 10px;
            color: var(--primary-color);
            width: 20px;
        }
        
        .price-tag {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 700;
            display: inline-block;
            margin: 0.5rem 0;
        }
        
        .btn-buy {
            background: linear-gradient(to right, var(--accent-color), #ff8e8e);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn-buy:hover {
            background: linear-gradient(to right, #ff5252, var(--accent-color));
            transform: scale(1.03);
        }
        
        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 2px;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .empty-state i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            padding-left: 45px;
            border-radius: 50px;
            border: 1px solid #eee;
        }
        
        .search-box i {
            position: absolute;
            left: 20px;
            top: 12px;
            color: #aaa;
        }
        
        .category-filter {
            margin-top: 1rem;
        }
        
        .category-btn {
            margin: 0.3rem;
            border-radius: 20px;
            background: #f8f9fa;
            border: 1px solid #eee;
            transition: all 0.3s;
        }
        
        .category-btn:hover, .category-btn.active {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            border-color: var(--primary-color);
        }
    </style>
     <style>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            min-height: 100vh;
            padding: 2rem 0;
        }

        .events-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .btn-white-login{
            background-color: white;
            color: var(--primary);
            padding: 0.5rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .event-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background: white;
            box-shadow: 
                0 4px 6px -1px rgba(0, 0, 0, 0.1),
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            position: relative;
        }

        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-12px);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(99, 102, 241, 0.1);
        }

        .event-card:hover::before {
            transform: scaleX(1);
        }

        .event-image-container {
            position: relative;
            overflow: hidden;
            height: 240px;
        }

        .event-banner {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .event-card:hover .event-banner {
            transform: scale(1.08);
        }

        .event-category {
            position: absolute;
            top: 16px;
            right: 16px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            color: var(--primary);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .card-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            height: calc(100% - 240px);
        }

        .event-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .meta-item i {
            width: 16px;
            color: var(--primary);
            font-size: 1rem;
        }

        .tickets-section {
            background: var(--light);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .tickets-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .tickets-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark);
            margin: 0;
        }

        .ticket-types {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .ticket-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--gray-light);
        }

        .ticket-item:last-child {
            border-bottom: none;
        }

        .ticket-name {
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--dark);
            text-transform: capitalize;
        }

        .ticket-price {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--primary);
        }

        .more-tickets {
            text-align: center;
            padding-top: 0.5rem;
            font-size: 0.8rem;
            color: var(--gray);
        }

        .price-availability {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .price-range {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .availability {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .availability.warning {
            color: var(--danger);
        }

        .availability.normal {
            color: var(--success);
        }

        .availability i {
            font-size: 0.9rem;
        }

        .view-details-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            text-decoration: none;
        }

        .view-details-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
            color: white;
        }

        .event-date-badge {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 8px 12px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .event-month {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
        }

        .event-day {
            display: block;
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--dark);
            line-height: 1;
        }

        .sold-out-badge {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-15deg);
            background: var(--danger);
            color: white;
            padding: 8px 24px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4);
            z-index: 2;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .event-card:hover .image-overlay {
            opacity: 1;
        }

        .overlay-text {
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            text-align: center;
        }

        /* Animation pour le chargement */
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

        .event-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .event-card:nth-child(2) { animation-delay: 0.1s; }
        .event-card:nth-child(3) { animation-delay: 0.2s; }
        .event-card:nth-child(4) { animation-delay: 0.3s; }
        .event-card:nth-child(5) { animation-delay: 0.4s; }
        .event-card:nth-child(6) { animation-delay: 0.5s; }
    </style>
</head>
<body>
    
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-5 fw-bold">Available Events</h1>
                    <p class="lead">Find and purchase tickets for your favorite events</p>
                </div>
                <div>
                    <a href="{{ route('iryna-login') }}" class="btn-white-login">login</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container py-3">
        <div class="filter-section">
            <h3 class="section-title">Find Your Next Experience</h3>
            <div class="row">
                <div class="col-md-8">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" class="form-control" placeholder="Search events...">
                    </div>
                </div>
            </div>
        </div>
        <h3 class="section-title">Available Events</h3>
        <div class="row g-4">
           
           <div class="container events-container">
            <div class="row g-4">
                @foreach($events as $event)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="event-card">
                        <div class="event-image-container">
                            <img src="{{ $event->banner ? asset('storage/' . $event->banner) : 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80' }}" 
                                class="event-banner" alt="{{ $event->title }}">
                            
                            <div class="event-date-badge">
                                <span class="event-month">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span>
                                <span class="event-day">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</span>
                            </div>
                            
                            <span class="event-category">
                                {{ ucfirst($event->event_type) }}
                            </span>

                            <div class="image-overlay">
                                <div class="overlay-text">
                                    <i class="fas fa-play-circle me-2"></i>
                                    View Event Details
                                </div>
                            </div>

                            @if($event->tickets->sum('quantity') === 0)
                            <div class="sold-out-badge">
                                SOLD OUT
                            </div>
                            @endif
                        </div>

                        <div class="card-content">
                            <h3 class="event-title">{{ $event->title }}</h3>
                            
                            <div class="event-meta">
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $event->location }}</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ \Carbon\Carbon::parse($event->start_date)->format('g:i A') }}</span>
                                </div>
                            </div>

                            <div class="tickets-section">
                                <div class="tickets-header">
                                    <h6 class="tickets-title">Available Tickets</h6>
                                </div>
                                <div class="ticket-types">
                                    @foreach($event->tickets->take(3) as $ticket)
                                    <div class="ticket-item">
                                        <span class="ticket-name">{{ $ticket->type }}</span>
                                        <span class="ticket-price">{{ number_format($ticket->price, 0, ',', ' ') }} XAF</span>
                                    </div>
                                    @endforeach
                                    @if($event->tickets->count() > 3)
                                    <div class="more-tickets">
                                        +{{ $event->tickets->count() - 3 }} more ticket types
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="price-availability">
                                @php
                                    $minPrice = $event->tickets->min('price');
                                    $maxPrice = $event->tickets->max('price');
                                    $totalTickets = $event->tickets->sum('quantity');
                                @endphp
                                <div class="price-range">
                                    @if($minPrice == $maxPrice)
                                        {{ number_format($minPrice, 0, ',', ' ') }} XAF
                                    @else
                                        From {{ number_format($minPrice, 0, ',', ' ') }} XAF
                                    @endif
                                </div>
                                <div class="availability {{ $totalTickets < 30 ? 'warning' : 'normal' }}">
                                    <i class="fas fa-ticket-alt"></i>
                                    <span>{{ $totalTickets }} available</span>
                                </div>
                            </div>

                            <a href="{{ route('events', $event->id) }}" class="view-details-btn">
                                <i class="fas fa-eye"></i>
                                View Event Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        </div>
            @if($events->isEmpty())
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-calendar-times"></i>
                        <h4 class="mt-3">No events found</h4>
                        <p class="text-muted">Try adjusting your search or filter to find what you're looking for.</p>
                    </div>
                </div>
            @endif        
        <nav aria-label="Event pagination" class="mt-5">
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

    <footer class="bg-light mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>EventTick</h5>
                    <p class="text-muted">Your trusted platform for event tickets</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted">© 2023 EventTick. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple category filter functionality
        document.querySelectorAll('.category-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.category-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
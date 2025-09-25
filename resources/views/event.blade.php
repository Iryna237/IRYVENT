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
</head>
<body>
    
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-5 fw-bold">Available Events</h1>
                    <p class="lead">Find and purchase tickets for your favorite events</p>
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
           
            <div class="col-md-4 col-sm-6">
                <div class="card event-card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="event-banner" alt="Concert Banner">
                        <span class="badge category-badge position-absolute top-0 end-0 m-2 bg-primary">Festival</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Summer vibes</h5>
                        <div class="event-details">
                            <p><i class="fas fa-map-marker-alt"></i> Douala, Salle de Fête ARENA</p>
                            <p><i class="fas fa-calendar-alt"></i> NOV 22 2025 </p>
                            
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price-tag">3500XAF</div>
                            <div class="text-muted small"><i class="fas fa-ticket-alt bg-danger"></i> 42 tickets left</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pt-0">
                        <form action="#" method="POST">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-buy">Buy Ticket</button>
                        </form>
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="amount" value="6000">
                            <input type="hidden" name="currency" value="XAF">
                            <input type="hidden" name="email" value="iryna@gmail.com">
                            <input type="hidden" name="order_id" value="{{ $order_id ?? '' }}">
                            
                            <button type="submit" class="btn btn-buy">
                                <i data-lucide="credit-card" class="w-5 h-5"></i>
                                Buy ticket
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6">
                <div class="card event-card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1542744095-fcf48d80b0fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="event-banner" alt="Basketball Game Banner">
                        <span class="position-absolute top-0 end-0 bg-danger text-white px-2 py-1 m-2 rounded-pill small">Sports</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Basketball Championship Finals</h5>
                        <div class="event-details">
                            <p><i class="fas fa-map-marker-alt"></i> Gymnase Fandena Omnisport</p>
                            <p><i class="fas fa-calendar-alt"></i>SEP 28, 2025 </p>
                           
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price-tag">5000XAF</div>
                            <div class="text-muted small"><i class="fas fa-ticket-alt"></i> 18 tickets left</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pt-0">
                        <form action="#" method="POST">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-buy">Buy Ticket</button>
                        </form>
                    </div>
                </div>
            </div>

            
            <div class="col-md-4 col-sm-6">
                <div class="card event-card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="event-banner" alt="Tech Conference Banner">
                        <span class="position-absolute top-0 end-0 bg-info text-white px-2 py-1 m-2 rounded-pill small">Conference</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Tech Innovation Summit 2025</h5>
                        <div class="event-details">
                            <p><i class="fas fa-map-marker-alt"></i>Kribi Convention Center</p>
                            <p><i class="fas fa-calendar-alt"></i> DEC 10, 2025 </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price-tag">10 000XAF</div>
                            <div class="text-muted small"><i class="fas fa-ticket-alt"></i> 65 tickets left</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pt-0">
                        <form action="#" method="POST">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-buy">Buy Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
               <div class="col-md-6 col-lg-4">
                  <div class="event-card card h-100">
                      <div class="position-relative">
                        <img src="images.jpg" class="card-img-top event-card-img" alt="Dream Fest">
                        <div class="event-date"></div>
                        <span class="badge category-badge position-absolute top-0 end-0 m-2 bg-secondary">Exhibition</span>
                </div>
                        <div class="card-body">
                        <h5 class="card-title">Dream Fest</h5>
                        <div class="event-details">
                            <p><i class="fas fa-map-marker-alt"></i> Yaoundé, National Museum</p>
                            <p><i class="fas fa-calendar-alt"></i>OCT 15, 2025</p>
                            
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price-tag">4500XAF</div>
                            <div class="text-muted small"><i class="fas fa-ticket-alt"></i> 28 tickets left</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pt-0">
                        <form action="#" method="POST">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-buy">Buy Ticket</button>
                        </form>
                    </div>
          </div>
        </div>
            <div class="col-md-4 col-sm-6">
                <div class="card event-card h-100">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="event-banner" alt="Comedy Show Banner">
                        <span class="position-absolute top-0 end-0 bg-success text-white px-2 py-1 m-2 rounded-pill small">Comedy</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Stand-Up Comedy Night</h5>
                        <div class="event-details">
                            <p><i class="fas fa-map-marker-alt"></i>Cinema room, Bafoussam</p>
                            <p><i class="fas fa-calendar-alt"></i>DEC 2, 2025</p>
                           
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price-tag">6000XAF</div>
                            <div class="text-muted small"><i class="fas fa-ticket-alt"></i> 28 tickets left</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pt-0">
                        <form action="#" method="POST">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-buy">Buy Ticket</button>
                        </form>
                    </div>
                </div>
            </div>

           
            <div class="col-md-4 col-sm-6">
                <div class="card event-card h-100">
                    <div class="position-relative">
                        <img src="download (1).jpg" class="card-img-top event-card-img" alt="Living Together Festival">
                        <span class="position-absolute top-0 end-0 bg-secondary text-white px-2 py-1 m-2 rounded-pill small">Food</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Living Together Festival</h5>
                        <div class="event-details">
                            <p><i class="fas fa-map-marker-alt"></i>Yaoundé, Palais des Sports</p>
                            <p><i class="fas fa-calendar-alt"></i>DEC 10, 2025 </p>
                           
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="price-tag">10 000XAF</div>
                            <div class="text-muted small"><i class="fas fa-ticket-alt"></i> 89 tickets left</div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 text-center pt-0">
                        <form action="#" method="POST">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-buy">Buy Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>IRYVENT - Cameroon Event Ticketing Platform</title>
  
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  
  <style>
    :root {
      --primary: #7d5fff;
      --primary-light: #a78bfa;
      --dark: #1e293b;
      --light: pink;
    }

    body {
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    /* Navbar */
    .navbar {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .navbar-brand {
      font-weight: 700;
      color: var(--primary) !important;
    }

    /* Hero */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                  url('/images/hero.jpg') no-repeat center center;
      background-size: cover;
      background-position: center;
      min-height: 500px;
    }

    /* Event Cards */
    .event-card {
      border: none;
      border-radius: 12px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .event-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .event-card-img {
      height: 180px;
      object-fit: cover;
    }
    .event-date {
      position: absolute;
      top: 15px;
      left: 15px;
      background: rgba(0,0,0,0.7);
      color: white;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 0.9rem;
    }
    .category-badge {
      background-color: var(--primary-light);
      color: white;
    }

    
    .btn-cta {
      background-color: var(--primary);
      color: white;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .btn-cta:hover {
      background-color: var(--primary-light);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(125, 95, 255, 0.3);
    }

    
    .feature-icon {
      font-size: 2.5rem;
      color: var(--primary);
      margin-bottom: 1rem;
    }

   
    .footer {
      background-color: var(--dark);
      color: white;
    }
    .container, .container-s {
      max-width: 95%;
    }
  </style>
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">
        <i class="bi bi-ticket-perforated"></i> IRYVENT
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#events">Events</a></li>
          <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <div class="ms-3">
          <a href="{{ url('iryna-login') }}" class="btn btn-outline-primary me-2">Login</a>
          <a href="{{ url('iryna-register') }}" class="btn btn-primary">Register</a>
         
        </div>
      </div>
    </div>
  </nav>
  <section class="hero d-flex align-items-center text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h1 class="display-4 fw-bold mb-4">Online Event Ticketing Platform</h1>
          <p class="lead mb-4">Discover, book and manage events effortlessly with QR code technology.</p>
          <div class="d-flex gap-3">
            <a href="#events" class="btn btn-cta btn-lg">Explore Events</a>
            <a href="{{ url('iryna-register') }}" class="btn btn-outline-light btn-lg">Create Event</a>
          </div>
        </div>
      </div>
    
          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
  </section>
  <section id="events" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Upcoming Events</h2>
        <p class="text-muted">Discover popular upcoming events</p>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="event-card card h-100">
            <div class="position-relative">
              <img src="/images/images_1.jpg" class="card-img-top event-card-img" alt="Dream Fest">
              <div class="event-date">OCT 15 2025</div>
              <span class="badge category-badge position-absolute top-0 end-0 m-2">Exhibition</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Dream Fest</h5>
              <p class="card-text text-muted">Yaoundé, National Museum</p>
              <a href="#" class="btn btn-sm btn-outline-primary w-100">Book Ticket Now</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="event-card card h-100">
            <div class="position-relative">
              <img src="/images/download_3.jpg" class="card-img-top event-card-img" alt="Summer vibes">
              <div class="event-date">NOV 22 2025</div>
              <span class="badge category-badge position-absolute top-0 end-0 m-2">Festival</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Summer vibes</h5>
              <p class="card-text text-muted">Douala, Salle de Fête ARENA</p>
              <a href="#" class="btn btn-sm btn-outline-primary w-100">Book Ticket Now</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="event-card card h-100">
            <div class="position-relative">
              <img src="/images/download_1.jpg" class="card-img-top event-card-img" alt="Living Together Festival">
              <div class="event-date">DEC 10 2025</div>
              <span class="badge category-badge position-absolute top-0 end-0 m-2">Concert</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Living Together Festival</h5>
              <p class="card-text text-muted">Yaoundé, Palais des Sports</p>
              <a href="#" class="btn btn-sm btn-outline-primary w-100">Book Ticket Now</a>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="#" class="btn btn-primary px-4">View All Events</a>
      </div>
    </div>
  </section>
  <section id="features" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Why Choose IRYVENT?</h2>
        <p class="text-muted">A complete solution for organizers and attendees</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4 text-center">
          <div class="feature-icon"><i class="bi bi-qr-code"></i></div>
          <h4>QR Code Tickets</h4>
          <p class="text-muted">Secure event access with unique digital tickets</p>
        </div>
        
        <div class="col-md-4 text-center">
          <div class="feature-icon"><i class="bi bi-phone"></i></div>
          <h4>Payment Methods</h4>
          <p class="text-muted">MTN MoMo, Orange Money & Card Payment integrated</p>
          <div class="mt-3">
            <img src="https://logo.clearbit.com/mtn.com" alt="MTN" width="50">
            <img src="https://logo.clearbit.com/orange.com" alt="Orange" width="50">
            <img src="https://logo.clearbit.com/stripe.com" alt="Stripe" width="50">
          </div>
        </div>
        
        <div class="col-md-4 text-center">
          <div class="feature-icon"><i class="bi bi-graph-up"></i></div>
          <h4>Real-time Analytics</h4>
          <p class="text-muted">Track your sales and attendees with intuitive dashboards</p>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5 bg-primary text-white text-center">
    <div class="container">
      <h2 class="fw-bold mb-4">Ready to revolutionize your events?</h2>
      <p class="lead mb-4">Join hundreds of organizers trusting IRYVENT</p>
      <div class="d-flex justify-content-center gap-3">
        <a href="#" class="btn btn-light btn-outline-sucess px-4">Get Started</a>
        
      </div>
    </div>
  </section>
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <h5 class="fw-bold mb-3"><i class="bi bi-ticket-perforated"></i> IRYVENT</h5>
          <p>The leading event ticketing solution in Cameroon.</p>
          <div class="d-flex gap-3 fs-4">
            <a href="#" class="text-sucess"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-black"><i class="bi bi-tiktok"></i></a>
            <a href="#" class="text-danger"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
        
        <div class="col-lg-2 col-md-6 mb-4">
          <h5 class="fw-bold mb-3">Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white text-decoration-none">Home</a></li>
            <li><a href="#events" class="text-white text-decoration-none">Events</a></li>
            <li><a href="#features" class="text-white text-decoration-none">Features</a></li>
            <li><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
          </ul>
        </div>
        
        <div class="col-lg-3 col-md-6 mb-4">
          <h5 class="fw-bold mb-3">Contact Us</h5>
          <ul class="list-unstyled">
            <li><i class="bi bi-envelope me-2"></i> contact@iryvent.com</li>
            <li><i class="bi bi-phone me-2"></i> +237 6XX XXX XXX</li>
            <li><i class="bi bi-geo-alt me-2"></i> Yaoundé, Cameroon</li>
          </ul>
        </div>
      </div>
      <hr class="my-4 bg-light">
      <div class="text-center">
        <p class="mb-0">&copy; 2025 IRYVENT. All rights reserved.</p>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

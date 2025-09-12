<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'TicketApp' }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="bg-light">
    <section class="d-flex vh-100">
        
        {{-- Sidebar --}}
        <aside class="d-flex flex-column justify-content-between vh-100 bg-primary text-white p-3 shadow" style="width: 260px;">
            
            <!-- Logo -->
            <div>
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-white bg-opacity-25 p-2 rounded-circle me-2">
                        <i class="bi bi-ticket-perforated fs-4 text-white"></i>
                    </div>
                    <a href="{{ route('dashboard') }}" class="fw-bold fs-5 text-white text-decoration-none">IRIVENT</a>
                </div>

                <!-- User -->
                <div class="d-flex align-items-center bg-white bg-opacity-10 p-2 rounded mb-4">
                    <img src="https://via.placeholder.com/40" class="rounded-circle border border-2 border-white me-2" alt="Profil">
                    <div>
                        <p class="mb-0 fw-semibold">{{ auth()->user()->name ?? 'John Doe' }}</p>
                        <small class="text-light">Organisateur</small>
                    </div>  
                </div>

            <!-- Menu -->
                <nav class="nav flex-column">
                    <a href="{{ route('admin.admin-dashboard') }}" 
                    class="nav-link text-white fw-semibold py-2 px-3 rounded mb-2 {{ request()->routeIs('admin.admin-dashboard') ? 'bg-white bg-opacity-25' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Tableau de bord
                    </a>

                    <a href="{{ route('admin.organization') }}" 
                    class="nav-link text-white fw-semibold py-2 px-3 rounded mb-2 {{ request()->routeIs('admin.organization') ? 'bg-white bg-opacity-25' : '' }}">
                        <i class="bi bi-building me-2"></i> Organisations
                    </a>

                    <a href="{{ route('admin.events') }}" 
                    class="nav-link text-white fw-semibold py-2 px-3 rounded mb-2 {{ request()->routeIs('admin.events') ? 'bg-white bg-opacity-25' : '' }}">
                        <i class="bi bi-calendar-event me-2"></i> Événements
                    </a>

                    <a href="{{ route('admin.users') }}" 
                    class="nav-link text-white fw-semibold py-2 px-3 rounded mb-2 {{ request()->routeIs('admin.users') ? 'bg-white bg-opacity-25' : '' }}">
                        <i class="bi bi-people me-2"></i> Utilisateurs
                    </a>

                    <a href="{{ route('admin.transactions') }}" 
                    class="nav-link text-white fw-semibold py-2 px-3 rounded mb-2 {{ request()->routeIs('admin.transactions') ? 'bg-white bg-opacity-25' : '' }}">
                        <i class="bi bi-credit-card me-2"></i> Transactions
                    </a>

                    <a href="{{ route('admin.settings') }}" 
                    class="nav-link text-white fw-semibold py-2 px-3 rounded mb-2 {{ request()->routeIs('admin.settings') ? 'bg-white bg-opacity-25' : '' }}">
                        <i class="bi bi-gear me-2"></i> Paramètres
                    </a>
                </nav>
            </div>

            <!-- Footer -->
            <div>
                <hr class="border-light">
                <a href="{{ route('logout') }}" class="btn btn-light text-primary w-100 fw-semibold">
                    <i class="bi bi-box-arrow-right me-2"></i> Déconnexion
                </a>
                <p class="text-center small text-light mt-3">© 2025 TicketApp</p>
            </div>
        </aside>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>

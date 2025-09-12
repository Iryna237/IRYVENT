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

    <!-- Ton CSS perso si besoin -->
</head>
<body class="bg-light">
    <section class="d-flex vh-100">
        
        {{-- Sidebar --}}
        @include('partials.sidebar_dashboard') 
        <!-- ⚠️ remplace par ton sidebar en Bootstrap -->

        {{-- Contenu principal --}}
        <div class="flex-grow-1 p-4 overflow-auto">
            
            {{-- Topbar --}}
            @include('partials.top_bare') 
            <!-- ⚠️ remplace par ton topbar en Bootstrap -->

            {{-- Contenu de la page --}}
            <main class="mt-4">
                @yield('content')
            </main>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>

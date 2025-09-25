<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRIVENT Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.0/font/bootstrap-icons.css">
        <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
<style>
    :root {
        --primary-color: #4e73df;
        --secondary-color: #5a5c69;
        --light-bg: #f8f9fc;
        --dark-bg: #2c3e50;
        --sidebar-width: 250px;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: var(--light-bg);
    }

    .dashboard-wrapper {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: var(--sidebar-width);
        background-color: #006eff; /* Solid blue background */
        color: white; /* Default text color for the sidebar */
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        transition: all 0.3s;
        position: fixed;
        top: 0;
        bottom: 0;
        overflow-y: auto;
    }

    .sidebar-brand {
        font-weight: bold;
        font-size: 1.5rem;
        color: white; /* Brand name is white */
        padding: 1.5rem 1rem;
        text-align: center;
        display: block;
    }
    
    .sidebar-nav .nav-link {
        padding: 1rem 1.5rem;
        color: white; /* All links are white by default */
        border-left: 4px solid transparent;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }

    .sidebar-nav .nav-link:hover {
        color: white;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .sidebar-nav .nav-link.active {
        color: var(--primary-color); /* Active link text is blue */
        background-color: #ffffff; /* Active link background is white */
        border-left: 4px solid var(--primary-color);
        font-weight: bold;
    }
    
    .sidebar-nav .nav-link.active i {
        color: var(--primary-color); /* Active link icon is blue */
    }
    
    .main-content {
        margin-left: var(--sidebar-width);
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        background-color: var(--light-bg);
    }

    /* ... rest of your CSS for topbar and main content ... */

</style>
</head>
<body>

    <div class="dashboard-wrapper">
        <div class="sidebar d-flex flex-column" id="sidebar">
            @include('partials.sidebar')
        </div>

        <div class="main-content">
            @include('partials.topbar')

            <main class="content-area">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
        // Toggle Sidebar on smaller screens
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
@php
    $name = auth()->user()->name;
@endphp

<nav class="topbar navbar navbar-expand-lg navbar-light border border-3 mb-4">
    <div class="container-fluid">
        <button id="sidebarToggle" class="btn btn-link d-md-none me-3">
            <i class="bi bi-list fs-4"></i>
        </button>
        
        <form class="d-none d-sm-inline-block form-inline ms-auto me-auto mw-100">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search">
                <button class="btn btn-primary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell-fill"></i>
                    <span class="badge bg-danger badge-counter">3+</span>
                </a>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-envelope-fill"></i>
                    <span class="badge bg-danger badge-counter">7</span>
                </a>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle profile-dropdown" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-none d-lg-inline text-gray-600 me-2">{{ $name }}</span>
                    <img class="img-profile rounded-circle" src="https://via.placeholder.com/40" width="32" height="32">
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-person me-2"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-gear me-2"></i>
                        Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
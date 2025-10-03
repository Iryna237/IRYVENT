@php
    $currentRoute = Route::currentRouteName();
        $role = auth()->user()->role;
        $name = auth()->user()->name;
        $email = auth()->user()->email;
@endphp

<nav class="sidebar">
    @if($role === 'admin')
        <div class="d-flex flex-column h-100">
            <a href="{{ route('eventshop') }}" class="sidebar-brand">
                IRIVENT
            </a>
            
            <ul class="sidebar-nav nav flex-column flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'organization') ? 'active' : '' }}" href="{{ route('admin.organization') }}">
                        <i class="bi bi-building me-2"></i>
                        Organizations
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'event') ? 'active' : '' }}" href="{{ route('admin.event') }}">
                        <i class="bi bi-calendar-event me-2"></i>
                        Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'users') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                        <i class="bi bi-people me-2"></i>
                        Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'demandes') ? 'active' : '' }}" href="{{ route('admin.demandes.index') }}">
                        <i class="bi bi-person-plus me-2"></i>
                        Demandes Créateur
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'transaction') ? 'active' : '' }}" href="{{ route('admin.transaction') }}">
                        <i class="bi bi-credit-card me-2"></i>
                        Transactions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'settings') ? 'active' : '' }}" href="{{ route('admin.settings') }}">
                        <i class="bi bi-gear me-2"></i>
                        Settings
                    </a>
                </li>
            </ul>

            <ul class="sidebar-nav nav flex-column mt-auto pb-4">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    @endif
    
    @if($role === 'creator')
        <div class="d-flex flex-column h-100">
            <a href="{{ route('eventshop') }}" class="sidebar-brand">
                IRIVENT
            </a>q
            
            <ul class="sidebar-nav nav flex-column flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'dashboard') ? 'active' : '' }}" href="{{ route('creator.dashboard') }}">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'tickets') ? 'active' : '' }}" href="{{ route('creator.tickets') }}">
                        <i class="bi bi-building me-2"></i>
                        tikcets
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'event') ? 'active' : '' }}" href="{{ route('creator.event') }}">
                        <i class="bi bi-calendar-event me-2"></i>
                        Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'earning') ? 'active' : '' }}" href="{{ route('creator.earning') }}">
                        <i class="bi bi-people me-2"></i>
                        earning
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'booths') ? 'active' : '' }}" href="{{ route('creator.booths') }}">
                        <i class="bi bi-person-plus me-2"></i>
                        booths
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains($currentRoute, 'settings') ? 'active' : '' }}" href="{{ route('creator.settings') }}">
                        <i class="bi bi-gear me-2"></i>
                        Settings
                    </a>
                </li>
            </ul>

            <ul class="sidebar-nav nav flex-column mt-auto pb-4">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    @endif
</nav>
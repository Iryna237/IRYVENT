@extends('layouts.layout')

@section('content')
<style>
    :root {
        --primary: #4e73df;
        --secondary: #858796;
        --success: #1cc88a;
        --info: #36b9cc;
        --warning: #f6c23e;
        --danger: #e74a3b;
        --light: #f8f9fc;
        --dark: #5a5c69;
    }

    body {
        background-color: var(--light);
        font-family: 'Nunito', sans-serif;
    }

    .card-shadow {
        box-shadow: 0 0.15rem 1.75rem rgba(58, 59, 69, 0.1);
        border-radius: 0.35rem;
    }

    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .user-role-badge {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
    }

    .stats-icon {
        font-size: 1.5rem;
        opacity: 0.7;
    }

    .action-buttons .btn {
        margin-right: 5px;
    }
</style>

<div class="container-fluid">

    <!-- Stats Row -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-primary h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_users }}</div>
                    </div>
                    <i class="bi bi-people stats-icon text-gray-300"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-success h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Customers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_custumer }}</div>
                    </div>
                    <i class="bi bi-check-circle stats-icon text-gray-300"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-warning h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Creators</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_creator }}</div>
                    </div>
                    <i class="bi bi-person-plus stats-icon text-gray-300"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-info h-100 py-2">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">New Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_new_user }}</div>
                    </div>
                    <i class="bi bi-person-badge stats-icon text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-between mb-4">
        <div>
            <button class="btn btn-outline-primary me-2"><i class="bi bi-filter me-1"></i> Filter</button>

            <div class="btn-group me-2">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-sort-down me-1"></i> Sort By
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Name (A-Z)</a></li>
                    <li><a class="dropdown-item" href="#">Name (Z-A)</a></li>
                    <li><a class="dropdown-item" href="#">Newest</a></li>
                    <li><a class="dropdown-item" href="#">Most Active</a></li>
                </ul>
            </div>

            <div class="btn-group me-2">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-badge me-1"></i> Role
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">All Roles</a></li>
                    <li><a class="dropdown-item" href="#">Admin</a></li>
                    <li><a class="dropdown-item" href="#">Organizer</a></li>
                    <li><a class="dropdown-item" href="#">Customer</a></li>
                </ul>
            </div>
        </div>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="bi bi-plus-circle me-1"></i> Add New User
        </button>
    </div>

    <!-- Users Table -->
    <div class="row">
        <div class="col-8">
            <div class="card card-shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                    <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-download me-1"></i> Export</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle" id="usersTable" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Events</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://via.placeholder.com/40" class="user-avatar me-3" alt="User Avatar">
                                            <div>
                                                <div class="fw-bold">{{ $user->name }}</div>
                                                <div class="text-muted small">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td><span class="badge bg-primary user-role-badge">{{ $user->role }}</span></td>
                                    <td>12</td>
                                    <td><span class="badge bg-success">{{ $user->status }}</span></td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="action-buttons d-flex">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-secondary me-2"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Demande Creators -->
        <div class="col-4">
            <div class="card card-shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Demandes Creators</h6>
                    <a href="{{ route('admin.demandes.index') }}">Voir toutes</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                <tr>
                                    <td><a href="{{ route('admin.demandes.index', $demande->id) }}">{{ $demande->name }}</a></td>
                                    <td>{{ $demande->email }}</td>
                                    <td>{{ $demande->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $demandes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

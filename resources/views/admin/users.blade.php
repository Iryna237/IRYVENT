@extends('layout.layout_dashboard')

@section('content')
<div class="container-fluid">

    {{-- Titre --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-primary fw-bold">👥 Gestion des Utilisateurs</h1>
        <a href="#" class="btn btn-primary shadow-sm">
            <i class="bi bi-person-plus-fill me-2"></i> Nouvel Utilisateur
        </a>
    </div>

    {{-- Statistiques --}}
    <div class="row g-4 mb-5">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary text-white shadow-lg border-0 rounded-4">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-uppercase small fw-bold mb-1 opacity-75">Total Utilisateurs</p>
                        <h2 class="fw-bold mb-0">5,150</h2>
                    </div>
                    <i class="bi bi-people-fill display-5 opacity-75"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success text-white shadow-lg border-0 rounded-4">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-uppercase small fw-bold mb-1 opacity-75">Comptes Créateurs</p>
                        <h2 class="fw-bold mb-0">120</h2>
                    </div>
                    <i class="bi bi-person-workspace display-5 opacity-75"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-info text-white shadow-lg border-0 rounded-4">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-uppercase small fw-bold mb-1 opacity-75">Nouveaux ce Mois</p>
                        <h2 class="fw-bold mb-0">45</h2>
                    </div>
                    <i class="bi bi-person-add display-5 opacity-75"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning text-white shadow-lg border-0 rounded-4">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-uppercase small fw-bold mb-1 opacity-75">Demandes en Attente</p>
                        <h2 class="fw-bold mb-0">5</h2>
                    </div>
                    <i class="bi bi-hourglass-split display-5 opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Gestion utilisateurs --}}
    <div class="card shadow border-0 rounded-4">
        <div class="card-header bg-white border-0 pt-4 pb-0">
            <ul class="nav nav-tabs card-header-tabs" id="userTabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active fw-semibold" id="all-users-tab" data-bs-toggle="tab" data-bs-target="#all-users" type="button" role="tab">
                        <i class="bi bi-person-lines-fill me-2"></i> Tous les Utilisateurs
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link fw-semibold" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-requests" type="button" role="tab">
                        <i class="bi bi-patch-question-fill me-2"></i> Demandes Créateurs
                    </button>
                </li>
            </ul>
        </div>

        <div class="card-body pt-3">
            <div class="tab-content">

                {{-- Tous les utilisateurs --}}
                <div class="tab-pane fade show active" id="all-users" role="tabpanel">
                    <div class="d-flex justify-content-end my-3">
                        <form class="d-flex w-50">
                            <input class="form-control me-2" type="search" placeholder="Rechercher un utilisateur..." aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Utilisateur</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th>Date d'Inscription</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Exemple utilisateur --}}
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Alice+J" class="rounded-circle me-3" width="40" height="40">
                                            <div>
                                                <div class="fw-bold">Alice Johnson</div>
                                                <small class="text-muted">ID: 12345</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>alice.j@user.com</td>
                                    <td><span class="badge bg-primary">Client</span></td>
                                    <td>05 Janv 2025</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-outline-info btn-sm"><i class="bi bi-eye"></i></a>
                                            <a href="#" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Bob+W" class="rounded-circle me-3" width="40" height="40">
                                            <div>
                                                <div class="fw-bold">Bob Williams</div>
                                                <small class="text-muted">ID: 12346</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>bob.w@creator.com</td>
                                    <td><span class="badge bg-success">Créateur</span></td>
                                    <td>15 Fév 2025</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-outline-info btn-sm"><i class="bi bi-eye"></i></a>
                                            <a href="#" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Demandes créateurs --}}
                <div class="tab-pane fade" id="pending-requests" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Organisation</th>
                                    <th>Date de la Demande</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Jane+D" class="rounded-circle me-3" width="40" height="40">
                                            <div class="fw-bold">Jane Doe</div>
                                        </div>
                                    </td>
                                    <td>jane.doe@example.com</td>
                                    <td>Tech Innovators</td>
                                    <td>12 Sept 2025</td>
                                    <td>
                                        <button class="btn btn-success btn-sm me-2"><i class="bi bi-check-circle me-1"></i> Valider</button>
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-x-circle me-1"></i> Refuser</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=John+S" class="rounded-circle me-3" width="40" height="40">
                                            <div class="fw-bold">John Smith</div>
                                        </div>
                                    </td>
                                    <td>john.smith@example.com</td>
                                    <td>Global Events Co.</td>
                                    <td>11 Sept 2025</td>
                                    <td>
                                        <button class="btn btn-success btn-sm me-2"><i class="bi bi-check-circle me-1"></i> Valider</button>
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-x-circle me-1"></i> Refuser</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

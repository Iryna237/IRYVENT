@extends('layout.layout_dashboard')

@section('content')
<div class="container-fluid">
    <!-- Titre et actions -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">📊 Transactions</h2>
        <div>
            <button class="btn btn-sm btn-success me-2">
                <i class="bi bi-file-earmark-excel"></i> Exporter Excel
            </button>
            <button class="btn btn-sm btn-danger">
                <i class="bi bi-file-earmark-pdf"></i> Exporter PDF
            </button>
        </div>
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

    <!-- Filtres -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Recherche</label>
                    <input type="text" class="form-control" placeholder="Rechercher une transaction...">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Statut</label>
                    <select class="form-select">
                        <option value="">Tous</option>
                        <option value="success">✔️ Réussie</option>
                        <option value="pending">⏳ En attente</option>
                        <option value="failed">❌ Échouée</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Date</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel"></i> Filtrer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau des transactions -->
    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Utilisateur</th>
                        <th>Montant</th>
                        <th>Méthode</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(range(1,5) as $i)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>Utilisateur {{ $i }}</td>
                        <td><span class="fw-bold text-success">{{ rand(1000, 10000) }} FCFA</span></td>
                        <td>Mobile Money</td>
                        <td>
                            @if($i % 2 == 0)
                                <span class="badge bg-success">Réussie</span>
                            @else
                                <span class="badge bg-warning text-dark">En attente</span>
                            @endif
                        </td>
                        <td>{{ now()->subDays($i)->format('d/m/Y H:i') }}</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-info text-white">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Affichage de 1 à 5 sur 50 transactions</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Précédent</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

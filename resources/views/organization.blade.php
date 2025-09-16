@extends('layouts.layout')

@section('content')

<style>
    .card-org {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-org:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    }
    .org-logo-container {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #ddd;
    }
    .org-logo-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .org-stats-item {
        border-right: 1px solid #e3e6f0;
    }
    .org-stats-item:last-child {
        border-right: none;
    }
    .action-buttons-card {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
    }
</style>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Organisations</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Organisations</li>
            </ol>
        </nav>
    </div>

    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Organisations</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-success h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Organisations Actives</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">11</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-warning h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                En Attente d'Approbation</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-clock-history fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-info h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Événements ce Mois-ci</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">42</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar-event fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <button class="btn btn-outline-primary me-2">
                <i class="bi bi-filter me-1"></i> Filtrer
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-sort-down me-1"></i> Trier par
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Nom (A-Z)</a></li>
                    <li><a class="dropdown-item" href="#">Plus récents</a></li>
                    <li><a class="dropdown-item" href="#">Plus d'événements</a></li>
                    <li><a class="dropdown-item" href="#">Plus de revenus</a></li>
                </ul>
            </div>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrganizationModal">
            <i class="bi bi-plus-circle me-1"></i> Ajouter une Organisation
        </button>
    </div>

    <div class="row">
        {{-- @foreach($organizations as $organization) --}}
        
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card org-card card-shadow h-100 card-org">
                <div class="org-status position-absolute top-0 end-0 m-3 z-index-1">
                    <span class="badge rounded-pill bg-success">Actif</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center mb-3">
                        <div class="org-logo-container flex-shrink-0">
                            <img src="https://via.placeholder.com/60" alt="Logo de l'organisation">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="card-title mb-0 font-weight-bold">Nom de l'Organisation</h5>
                            <p class="text-muted mb-0">Catégorie</p>
                        </div>
                    </div>
                    <p class="card-text text-truncate">Description concise de l'organisation pour donner un aperçu de son activité.</p>
                    <div class="row text-center my-3 border-top border-bottom py-2">
                        <div class="col-4 org-stats-item">
                            <div class="h6 mb-0 font-weight-bold">12</div>
                            <small class="text-muted">Événements</small>
                        </div>
                        <div class="col-4 org-stats-item">
                            <div class="h6 mb-0 font-weight-bold">2.5K</div>
                            <small class="text-muted">Billets</small>
                        </div>
                        <div class="col-4 org-stats-item">
                            <div class="h6 mb-0 font-weight-bold">20M XAF</div>
                            <small class="text-muted">Revenus</small>
                        </div>
                    </div>
                    <div class="action-buttons-card mt-auto pt-3">
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i> Voir
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil"></i> Modifier
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                    </div>
                </div>
                <div class="card-footer bg-light border-0">
                    <small class="text-muted">Membre depuis : 2025-09-16</small>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <nav aria-label="Organizations pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Précédent</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<div class="modal fade" id="addOrganizationModal" tabindex="-1" aria-labelledby="addOrganizationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrganizationModalLabel">Ajouter une Nouvelle Organisation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="orgName" class="form-label">Nom de l'Organisation</label>
                                <input type="text" class="form-control" id="orgName" placeholder="Entrez le nom de l'organisation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="orgCategory" class="form-label">Catégorie</label>
                                <select class="form-select" id="orgCategory">
                                    <option selected>Sélectionnez une catégorie</option>
                                    <option value="entertainment">Divertissement</option>
                                    <option value="technology">Technologie</option>
                                    <option value="sports">Sport</option>
                                    <option value="arts">Arts & Culture</option>
                                    <option value="food">Alimentation & Boissons</option>
                                    <option value="health">Santé & Bien-être</option>
                                    <option value="other">Autre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactName" class="form-label">Nom du Contact</label>
                                <input type="text" class="form-control" id="contactName" placeholder="Entrez le nom du contact">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactEmail" class="form-label">Email du Contact</label>
                                <input type="email" class="form-control" id="contactEmail" placeholder="Entrez l'email du contact">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contactPhone" class="form-label">Téléphone du Contact</label>
                                <input type="tel" class="form-control" id="contactPhone" placeholder="Entrez le téléphone du contact">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="orgStatus" class="form-label">Statut</label>
                                <select class="form-select" id="orgStatus">
                                    <option value="active" selected>Actif</option>
                                    <option value="pending">En attente</option>
                                    <option value="inactive">Inactif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="orgDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="orgDescription" rows="3" placeholder="Entrez la description de l'organisation"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="orgLogo" class="form-label">Logo de l'Organisation</label>
                        <input class="form-control" type="file" id="orgLogo">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Ajouter l'Organisation</button>
            </div>
        </div>
    </div>
</div>
@endsection
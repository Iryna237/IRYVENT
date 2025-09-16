@extends('layouts.layout')

@section('content')

<style>
    .card-event {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card-event:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15) !important;
    }
    .event-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-top-left-radius: 0.35rem;
        border-top-right-radius: 0.35rem;
    }
    .event-stats-item {
        border-right: 1px solid #e3e6f0;
    }
    .event-stats-item:last-child {
        border-right: none;
    }
    .action-buttons-card {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
    }
    .badge-status {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>

<div class="container-fluid">

    {{-- Header + Breadcrumb --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Événements</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Événements</li>
            </ol>
        </nav>
    </div>

    {{-- Stats cards --}}
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Événements</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto"><i class="bi bi-calendar-event fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-success h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Événements à Venir</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                        <div class="col-auto"><i class="bi bi-arrow-up-circle fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-info h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Billets Vendus</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">48</div>
                        </div>
                        <div class="col-auto"><i class="bi bi-ticket-perforated fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card card-shadow border-left-warning h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col me-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Revenus Totaux</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">124,850 XAF</div>
                        </div>
                        <div class="col-auto"><i class="bi bi-currency-dollar fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter + Add Button --}}
    <div class="d-flex justify-content-between mb-4">
        <div class="d-flex align-items-center">
            <button class="btn btn-outline-primary me-2"><i class="bi bi-filter me-1"></i> Filtrer</button>
            <div class="btn-group me-2">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-sort-down me-1"></i> Trier par
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Date (plus récent)</a></li>
                    <li><a class="dropdown-item" href="#">Date (plus ancien)</a></li>
                    <li><a class="dropdown-item" href="#">Nom (A-Z)</a></li>
                    <li><a class="dropdown-item" href="#">Revenus</a></li>
                </ul>
            </div>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
            <i class="bi bi-plus-circle me-1"></i> Créer un Événement
        </button>
    </div>

    {{-- Events cards --}}
    <div class="row">
        {{-- @foreach($events as $event) --}}
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card card-event card-shadow h-100 position-relative">
                <span class="badge badge-status bg-success">Actif</span>
                <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="event-image" alt="Festival">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title font-weight-bold">Festival de la Mode Urbaine</h5>
                    <p class="text-muted mb-2">Mode • Art • Douala, Canal Olympia</p>
                    <p class="card-text text-truncate">Le plus grand festival de mode urbaine de la région, avec des défilés et des ateliers créatifs.</p>
                    <div class="row text-center mb-3 border-top border-bottom py-2">
                        <div class="col-4 event-stats-item">
                            <div class="h6 mb-0">3500 XAF</div>
                            <small class="text-muted">Prix</small>
                        </div>
                        <div class="col-4 event-stats-item">
                            <div class="h6 mb-0">1000</div>
                            <small class="text-muted">Capacité</small>
                        </div>
                        <div class="col-4">
                            <div class="h6 mb-0">2.2 M XAF</div>
                            <small class="text-muted">Revenus</small>
                        </div>
                    </div>
                    <div class="action-buttons-card mt-auto pt-3">
                        <button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> Voir</button>
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i> Modifier</button>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Supprimer</button>
                    </div>
                </div>
                <div class="card-footer bg-light border-0">
                    <small class="text-muted">Organisateur: Imane Ayissi</small>
                </div>
            </div>
        </div>
        {{-- @endforeach --}}
    </div>

</div>

@endsection

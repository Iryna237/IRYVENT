@extends('layout.layout_dashboard')
@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gestion des Événements</h1>
        <a href="#" class="btn btn-primary btn-sm shadow-sm">
            <i class="bi bi-calendar-plus me-1"></i> Créer un Événement
        </a>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title text-uppercase mb-0">Événements en Cours</h5>
                            <h2 class="card-text fw-bold">75</h2>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-play-circle-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title text-uppercase mb-0">Événements à Venir</h5>
                            <h2 class="card-text fw-bold">45</h2>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar-check-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="card-title text-uppercase mb-0">Événements Terminés</h5>
                            <h2 class="card-text fw-bold">180</h2>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar-x-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <h4 class="mb-3 text-gray-800">Événements Récents</h4>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow border-0">
                <img src="https://via.placeholder.com/600x400" class="card-img-top" alt="Image de l'événement">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Conférence Tech Innov</h5>
                    <p class="card-text text-muted mb-2"><i class="bi bi-building me-1"></i> Organisation XYZ</p>
                    <p class="card-text"><i class="bi bi-geo-alt-fill me-1"></i> Paris, France</p>
                    <p class="card-text"><i class="bi bi-calendar-event me-1"></i> 10 Octobre 2025</p>
                    <div class="mt-auto">
                        <span class="badge bg-success mb-2">Actif</span>
                        <a href="#" class="btn btn-primary btn-sm">Détails <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow border-0">
                <img src="https://via.placeholder.com/600x400?text=Event+2" class="card-img-top" alt="Image de l'événement">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Festival de Musique Urbaine</h5>
                    <p class="card-text text-muted mb-2"><i class="bi bi-building me-1"></i> Musi-Event Inc.</p>
                    <p class="card-text"><i class="bi bi-geo-alt-fill me-1"></i> Montréal, Canada</p>
                    <p class="card-text"><i class="bi bi-calendar-event me-1"></i> 15 Novembre 2025</p>
                    <div class="mt-auto">
                        <span class="badge bg-warning text-dark mb-2">À Venir</span>
                        <a href="#" class="btn btn-primary btn-sm">Détails <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow border-0">
                <img src="https://via.placeholder.com/600x400?text=Event+3" class="card-img-top" alt="Image de l'événement">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Salon du bien-être</h5>
                    <p class="card-text text-muted mb-2"><i class="bi bi-building me-1"></i> ZenCorp</p>
                    <p class="card-text"><i class="bi bi-geo-alt-fill me-1"></i> Lyon, France</p>
                    <p class="card-text"><i class="bi bi-calendar-event me-1"></i> 25 Septembre 2025</p>
                    <div class="mt-auto">
                        <span class="badge bg-danger mb-2">Terminé</span>
                        <a href="#" class="btn btn-primary btn-sm disabled">Détails <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tableau des Événements à Venir</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Organisateur</th>
                            <th>Date</th>
                            <th>Lieu</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Web Dev Summit 2026</td>
                            <td>Code Masters</td>
                            <td>20 Fév 2026</td>
                            <td>Berlin, Allemagne</td>
                            <td><span class="badge bg-info">Prévu</span></td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
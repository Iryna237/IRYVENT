@extends('layouts.layout')

@section('content')

    <style>
        .card-demande {
            border-left: 4px solid #4e73df;
            transition: all 0.3s ease;
        }
        .card-demande:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .demande-status {
            font-size: 0.8rem;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            text-transform: uppercase;
        }
    </style>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Demandes de Créateurs</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @forelse($demandes as $demande)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow card-demande">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h5 class="card-title fw-bold text-primary">{{ $demande->name }}</h5>
                                <p class="card-subtitle mb-2 text-muted">{{ $demande->email }}</p>
                                <p class="card-text small text-gray-600">
                                    Demandé le: {{ $demande->created_at->format('d/m/Y') }}
                                </p>
                            </div>
                            <div class="col-2 text-end">
                                <span class="badge bg-warning text-dark demande-status">
                                    En attente
                                </span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('admin.demandes.show', $demande) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-eye me-1"></i> Voir les détails
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    Aucune demande de créateur en attente pour le moment.
                </div>
            </div>
            @endforelse
        </div>
    </div>
@endsection
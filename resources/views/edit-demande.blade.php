@extends('layouts.layout')

@section('content')

    <style>
        .form-container {
            max-width: 900px;
            margin: 50px auto;
        }
        .form-title {
            color: #4e73df;
            font-weight: bold;
        }
        .card-demande-info {
            border-left: 4px solid #4e73df;
        }
        .card-documents {
            border-left: 4px solid #1cc88a;
        }
        .info-label {
            font-weight: 600;
            color: #5a5c69;
        }
        .document-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .status-badge {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            text-transform: capitalize;
        }
        .action-buttons-group {
            background-color: #f7f9fc;
            padding: 20px;
            border-radius: 8px;
        }
    </style>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Détails de la demande</h1>
            <a href="{{ route('admin.demandes.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="bi bi-arrow-left fa-sm text-white-50"></i> Retour aux demandes
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-5 mb-4">
                <div class="card shadow card-demande-info">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informations sur la demande</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="info-label">Nom:</p>
                            <p>{{ $demande->name }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="info-label">Email:</p>
                            <p>{{ $demande->email }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="info-label">Date de la demande:</p>
                            <p>{{ $demande->created_at->format('d M Y à H:i') }}</p>
                        </div>
                        <div class="mb-3">
                            <p class="info-label">Statut:</p>
                            @php
                                $statusClass = '';
                                switch($demande->status) {
                                    case 'approved': $statusClass = 'bg-success'; break;
                                    case 'refused': $statusClass = 'bg-danger'; break;
                                    case 'pending':
                                    default: $statusClass = 'bg-warning text-dark'; break;
                                }
                            @endphp
                            <span class="badge {{ $statusClass }} status-badge">{{ ucfirst($demande->status) }}</span>
                        </div>

        <div class="row">
            <div class="col-12 text-center mt-3 mb-5">
                @if ($demande->status === 'pending')
                    <div class="d-inline-flex gap-3 action-buttons-group">
                        <form action="{{ route('admin.demandes.accept', $demande->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-check-circle me-2"></i> Accepter
                            </button>
                        </form>
                        <form action="{{ route('admin.demandes.refuse', $demande->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Êtes-vous sûr de vouloir refuser cette demande ?')">
                                <i class="bi bi-x-circle me-2"></i> Refuser
                            </button>
                        </form>
                    </div>
                @else
                    <div class="alert alert-info text-center" role="alert">
                        Cette demande a déjà été traitée.
                    </div>
                @endif
            </div>
        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 mb-4">
                <div class="card shadow card-documents">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">Documents d'identification</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6 class="info-label">Carte d'identité (Recto):</h6>
                                <img src="{{ asset('storage/' . $demande->vice_ID_card) }}" class="document-image" alt="Carte d'identité Recto">
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6 class="info-label">Carte d'identité (Verso):</h6>
                                <img src="{{ asset('storage/' . $demande->versa_ID_card) }}" class="document-image" alt="Carte d'identité Verso">
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6 class="info-label">Selfie avec la carte:</h6>
                                <img src="{{ asset('storage/' . $demande->face_selfie) }}" class="document-image" alt="Selfie avec la carte">
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6 class="info-label">Photo du visage:</h6>
                                <img src="{{ asset('storage/' . $demande->face_card) }}" class="document-image" alt="Photo du visage">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
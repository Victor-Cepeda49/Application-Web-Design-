@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Superhéroes Eliminados</h1>
        <div>
            <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>
    </div>

    @if($superheroes->count() > 0)
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($superheroes as $superheroe)
                <div class="col">
                    <div class="card h-100 hero-card border-danger">
                        <div class="card-header bg-danger text-white">
                            Eliminado: {{ $superheroe->deleted_at ? $superheroe->deleted_at->format('d/m/Y H:i') : 'N/A' }}
                        </div>
                        <img src="{{ asset('storage/' . $superheroe->foto_url) }}" class="card-img-top hero-image" alt="{{ $superheroe->nombre_superheroe }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $superheroe->nombre_superheroe }}</h5>
                            <p class="card-text text-muted">{{ $superheroe->nombre_real }}</p>
                            <p class="card-text">{{ Str::limit($superheroe->informacion_adicional, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between">
                                <form action="{{ route('superheroes.restore', $superheroe->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm">Restaurar</button>
                                </form>
                                <form action="{{ route('superheroes.forceDelete', $superheroe->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar permanentemente este superhéroe? Esta acción no se puede deshacer.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar permanentemente</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            No hay superhéroes en la papelera.
        </div>
    @endif
@endsection
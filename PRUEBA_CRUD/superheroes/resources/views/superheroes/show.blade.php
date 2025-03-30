@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $superheroe->foto_url }}" class="img-fluid rounded-start" alt="{{ $superheroe->nombre_superheroe }}" style="height: 100%; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{ $superheroe->nombre_superheroe }}</h2>
                    <h5 class="card-subtitle mb-2 text-muted">{{ $superheroe->nombre_real }}</h5>
                    
                    <hr>
                    
                    <h4>Información Adicional</h4>
                    <p class="card-text">{{ $superheroe->informacion_adicional }}</p>
                    
                    <div class="mt-4">
                        <p class="text-muted">
                        <small>Creado: {{ $superheroe->created_at ? $superheroe->created_at->format('d/m/Y H:i') : 'N/A' }}</small><br>
                        <small>Última actualización: {{ $superheroe->updated_at ? $superheroe->updated_at->format('d/m/Y H:i') : 'N/A' }}</small>
                        </p>
                    </div>
                    
                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('superheroes.edit', $superheroe->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('superheroes.destroy', $superheroe->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este superhéroe?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
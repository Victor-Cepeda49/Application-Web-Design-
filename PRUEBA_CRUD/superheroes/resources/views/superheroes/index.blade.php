@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Superhéroes</h1>
        <a href="{{ route('superheroes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nuevo Registro
        </a>
    </div>

    @if($superheroes->count() > 0)
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($superheroes as $superheroe)
                <div class="col">
                    <div class="card h-100 hero-card">
                        <img src="{{ $superheroe->foto_url }}" class="card-img-top hero-image" alt="{{ $superheroe->nombre_superheroe }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $superheroe->nombre_superheroe }}</h5>
                            <p class="card-text text-muted">{{ $superheroe->nombre_real }}</p>
                            <p class="card-text">{{ Str::limit($superheroe->informacion_adicional, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('superheroes.show', $superheroe->id) }}" class="btn btn-info btn-sm">Consultar</a>
                                <a href="{{ route('superheroes.edit', $superheroe->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('superheroes.destroy', $superheroe->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este superhéroe?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            No hay superhéroes registrados. ¡Comienza agregando uno nuevo!
        </div>
    @endif
@endsection
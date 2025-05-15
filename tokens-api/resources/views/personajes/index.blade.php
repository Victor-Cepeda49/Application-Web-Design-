@extends('layout')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Personajes Registrados</h2>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($personajes as $personaje)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($personaje->imagen)
                        <img src="{{ $personaje->imagen }}" class="card-img-top" alt="{{ $personaje->nombre }}" style="height: 250px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $personaje->nombre }}</h5>
                        <p class="card-text">{{ $personaje->descripcion }}</p>

                        <h6>Películas / Series:</h6>
                        <ul class="list-unstyled">
                            @forelse($personaje->peliculas as $pelicula)
                                <li>- {{ $pelicula->nombre }}</li>
                            @empty
                                <li><em>No asociadas</em></li>
                            @endforelse
                        </ul>

                        <form action="{{ route('personajes.destroy', $personaje->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este personaje?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm mt-2">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">No hay personajes registrados aún.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

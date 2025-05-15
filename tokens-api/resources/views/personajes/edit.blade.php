@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Editar Personaje</h2>

    <form method="POST" action="{{ route('personajes.update', $personaje->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ $personaje->nombre }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen (URL)</label>
            <input type="text" class="form-control" name="imagen" value="{{ $personaje->imagen }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="3">{{ $personaje->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Películas o series donde aparece</label>
            <select class="form-select" name="peliculas[]" multiple>
                @foreach($peliculas as $pelicula)
                    <option value="{{ $pelicula->id }}" {{ $personaje->peliculas->contains($pelicula->id) ? 'selected' : '' }}>
                        {{ $pelicula->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection

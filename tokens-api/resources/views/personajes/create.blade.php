@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Agregar Personaje</h2>

    <form method="POST" action="{{ route('personajes.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen (URL)</label>
            <input type="text" class="form-control" name="imagen">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Películas o series donde aparece</label>
            <select class="form-select" name="peliculas[]" multiple>
                @foreach($peliculas as $pelicula)
                    <option value="{{ $pelicula->id }}">{{ $pelicula->nombre }}</option>
                @endforeach
            </select>
            <small class="text-muted">Mantén presionado Ctrl (Cmd en Mac) para seleccionar múltiples.</small>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection

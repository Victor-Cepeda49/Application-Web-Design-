@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Agregar Película o Serie</h2>

    <form method="POST" action="{{ route('peliculas.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Clasificación</label>
            <input type="text" class="form-control" name="clasificacion" placeholder="Ej. drama, acción, etc." required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de estreno</label>
            <input type="date" class="form-control" name="fecha_estreno" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Reseña</label>
            <textarea class="form-control" name="resena" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Temporada</label>
            <input type="text" class="form-control" name="temporada" placeholder="Ej. Temporada 1">
        </div>

        <button type="submit" class="btn btn-success">Guardar Película/Serie</button>
    </form>
</div>
@endsection

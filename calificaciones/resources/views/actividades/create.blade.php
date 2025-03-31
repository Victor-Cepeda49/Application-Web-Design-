@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4><i class="fas fa-plus-circle"></i> Nueva Actividad para {{ $asignatura->nombre }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('actividades.store') }}" method="POST">
            @csrf
            
            <input type="hidden" name="asignatura_id" value="{{ $asignatura->id }}">
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tipo" class="form-label">Tipo de Actividad *</label>
                    <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                        <option value="">Selecciona un tipo</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo }}" {{ old('tipo') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                        @endforeach
                    </select>
                    @error('tipo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre/Título de la Actividad *</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="calificacion" class="form-label">Calificación (0-100)</label>
                    <input type="number" step="0.1" min="0" max="100" class="form-control @error('calificacion') is-invalid @enderror" id="calificacion" name="calificacion" value="{{ old('calificacion') }}">
                    @error('calificacion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="fecha" class="form-label">Fecha *</label>
                    <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha" value="{{ old('fecha') ?? date('Y-m-d') }}" required>
                    @error('fecha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="comentario" class="form-label">Comentarios</label>
                <textarea class="form-control @error('comentario') is-invalid @enderror" id="comentario" name="comentario" rows="3">{{ old('comentario') }}</textarea>
                @error('comentario')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('asignaturas.show', $asignatura->id) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar Actividad
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
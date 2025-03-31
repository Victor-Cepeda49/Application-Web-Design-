@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4><i class="fas fa-plus-circle"></i> Nueva Asignatura</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('asignaturas.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Asignatura *</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="profesor" class="form-label">Profesor</label>
                <input type="text" class="form-control @error('profesor') is-invalid @enderror" id="profesor" name="profesor" value="{{ old('profesor') }}">
                @error('profesor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="semestre" class="form-label">Semestre</label>
                <input type="text" class="form-control @error('semestre') is-invalid @enderror" id="semestre" name="semestre" value="{{ old('semestre') }}">
                @error('semestre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('asignaturas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
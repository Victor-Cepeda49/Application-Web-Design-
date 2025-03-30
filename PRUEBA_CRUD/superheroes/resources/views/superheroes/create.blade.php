@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>Registrar Nuevo Superhéroe</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('superheroes.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre_real" class="form-label">Nombre Real</label>
                    <input type="text" class="form-control @error('nombre_real') is-invalid @enderror" id="nombre_real" name="nombre_real" value="{{ old('nombre_real') }}" required>
                    @error('nombre_real')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nombre_superheroe" class="form-label">Nombre de Superhéroe</label>
                    <input type="text" class="form-control @error('nombre_superheroe') is-invalid @enderror" id="nombre_superheroe" name="nombre_superheroe" value="{{ old('nombre_superheroe') }}" required>
                    @error('nombre_superheroe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_url" class="form-label">URL de la Foto</label>
                    <input type="url" class="form-control @error('foto_url') is-invalid @enderror" id="foto_url" name="foto_url" value="{{ old('foto_url') }}" required>
                    <div class="form-text">Ingresa la URL de una imagen existente en Internet.</div>
                    @error('foto_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="informacion_adicional" class="form-label">Información Adicional</label>
                    <textarea class="form-control @error('informacion_adicional') is-invalid @enderror" id="informacion_adicional" name="informacion_adicional" rows="5" required>{{ old('informacion_adicional') }}</textarea>
                    @error('informacion_adicional')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Guardar Superhéroe</button>
                </div>
            </form>
        </div>
    </div>
@endsection
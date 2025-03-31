@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h2>Editar Superhéroe</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('superheroes.update', $superheroe->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre_real" class="form-label">Nombre Real</label>
                    <input type="text" class="form-control @error('nombre_real') is-invalid @enderror" id="nombre_real" name="nombre_real" value="{{ old('nombre_real', $superheroe->nombre_real) }}" required>
                    @error('nombre_real')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nombre_superheroe" class="form-label">Nombre de Superhéroe</label>
                    <input type="text" class="form-control @error('nombre_superheroe') is-invalid @enderror" id="nombre_superheroe" name="nombre_superheroe" value="{{ old('nombre_superheroe', $superheroe->nombre_superheroe) }}" required>
                    @error('nombre_superheroe')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $superheroe->foto_url) }}" alt="{{ $superheroe->nombre_superheroe }}" class="img-thumbnail" style="max-height: 200px;">
                    </div>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                    <div class="form-text">Deja este campo vacío para mantener la foto actual.</div>
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="informacion_adicional" class="form-label">Información Adicional</label>
                    <textarea class="form-control @error('informacion_adicional') is-invalid @enderror" id="informacion_adicional" name="informacion_adicional" rows="5" required>{{ old('informacion_adicional', $superheroe->informacion_adicional) }}</textarea>
                    @error('informacion_adicional')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('superheroes.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Actualizar Superhéroe</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h4><i class="fas fa-tasks"></i> Detalles de la Actividad</h4>
            <a href="{{ route('asignaturas.show', $actividad->asignatura_id) }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> Volver a la Asignatura
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <h5 class="border-bottom pb-2">Información de la Actividad</h5>
                <p><strong>Asignatura:</strong> {{ $actividad->asignatura->nombre }}</p>
                <p><strong>Tipo:</strong> {{ $actividad->tipo }}</p>
                <p><strong>Nombre:</strong> {{ $actividad->nombre }}</p>
                <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($actividad->fecha)->format('d/m/Y') }}</p>
            </div>
            <div class="col-md-6">
                <h5 class="border-bottom pb-2">Calificación</h5>
                @if($actividad->calificacion !== null)
                    <div class="text-center mb-3">
                        <div class="display-4 {{ $actividad->calificacion >= 70 ? 'text-success' : 'text-danger' }}">
                            {{ $actividad->calificacion }}
                        </div>
                        <p class="text-muted">
                            @if($actividad->calificacion >= 90)
                                Excelente
                            @elseif($actividad->calificacion >= 80)
                                Muy bien
                            @elseif($actividad->calificacion >= 70)
                                Aprobado
                            @elseif($actividad->calificacion >= 60)
                                Necesita mejorar
                            @else
                                No aprobado
                            @endif
                        </p>
                    </div>
                @else
                    <div class="alert alert-warning text-center">
                        <i class="fas fa-exclamation-triangle"></i> Calificación pendiente
                    </div>
                @endif
            </div>
        </div>
        
        @if($actividad->comentario)
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h5><i class="fas fa-comment"></i> Comentarios</h5>
                </div>
                <div class="card-body">
                    {{ $actividad->comentario }}
                </div>
            </div>
        @endif
        
        <div class="d-flex justify-content-between">
            <a href="{{ route('actividades.edit', $actividad->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar Actividad
            </a>
            <form action="{{ route('actividades.destroy', $actividad->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta actividad?')">
                    <i class="fas fa-trash"></i> Eliminar Actividad
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
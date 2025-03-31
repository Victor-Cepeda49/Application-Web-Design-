@extends('layouts.app')

@section('content')
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h4><i class="fas fa-book"></i> {{ $asignatura->nombre }}</h4>
            <a href="{{ route('asignaturas.index') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left"></i> Volver a lista
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Profesor:</strong> {{ $asignatura->profesor ?? 'No especificado' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Semestre:</strong> {{ $asignatura->semestre ?? 'No especificado' }}</p>
            </div>
        </div>
        
        <div class="d-flex justify-content-end">
            <a href="{{ route('asignaturas.edit', $asignatura->id) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit"></i> Editar Asignatura
            </a>
            <form action="{{ route('asignaturas.destroy', $asignatura->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta asignatura?')">
                    <i class="fas fa-trash"></i> Eliminar Asignatura
                </button>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-success text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h4><i class="fas fa-tasks"></i> Actividades Evaluables</h4>
            <a href="{{ route('actividades.create', ['asignatura_id' => $asignatura->id]) }}" class="btn btn-light btn-sm">
                <i class="fas fa-plus-circle"></i> Nueva Actividad
            </a>
        </div>
    </div>
    <div class="card-body">
        @if(count($actividades) > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Calificación</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actividades as $actividad)
                        <tr>
                            <td>{{ $actividad->tipo }}</td>
                            <td>{{ $actividad->nombre }}</td>
                            <td>
                                @if($actividad->calificacion !== null)
                                    <span class="badge rounded-pill bg-{{ $actividad->calificacion >= 70 ? 'success' : 'danger' }}">
                                        {{ $actividad->calificacion }}
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-secondary">Pendiente</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($actividad->fecha)->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('actividades.show', $actividad->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('actividades.edit', $actividad->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('actividades.destroy', $actividad->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta actividad?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Resumen de calificaciones -->
            @php
                $calificaciones = $actividades->whereNotNull('calificacion')->pluck('calificacion');
                $promedio = count($calificaciones) > 0 ? $calificaciones->avg() : 0;
            @endphp
            
            <div class="card mt-4">
                <div class="card-header bg-info text-white">
                    <h5><i class="fas fa-chart-line"></i> Resumen de Calificaciones</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Promedio</h5>
                                    <h2 class="card-text {{ $promedio >= 70 ? 'text-success' : 'text-danger' }}">{{ number_format($promedio, 2) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Total Actividades</h5>
                                    <h2 class="card-text">{{ count($actividades) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Actividades Pendientes</h5>
                                    <h2 class="card-text">{{ count($actividades->whereNull('calificacion')) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        @else
            <div class="alert alert-info">
                No hay actividades evaluables registradas para esta asignatura.
                <a href="{{ route('actividades.create', ['asignatura_id' => $asignatura->id]) }}">Añade tu primera actividad</a>
            </div>
        @endif
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4><i class="fas fa-book"></i> Lista de Asignaturas</h4>
    </div>
    <div class="card-body">
        <div class="mb-3 text-end">
            <a href="{{ route('asignaturas.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Nueva Asignatura
            </a>
        </div>

        @if(count($asignaturas) > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Asignatura</th>
                            <th>Profesor</th>
                            <th>Semestre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asignaturas as $asignatura)
                        <tr>
                            <td>{{ $asignatura->id }}</td>
                            <td>{{ $asignatura->nombre }}</td>
                            <td>{{ $asignatura->profesor }}</td>
                            <td>{{ $asignatura->semestre }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('asignaturas.show', $asignatura->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('asignaturas.edit', $asignatura->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('asignaturas.destroy', $asignatura->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta asignatura?')">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                No hay asignaturas registradas aún. <a href="{{ route('asignaturas.create') }}">Añade una nueva asignatura</a>
            </div>
        @endif
    </div>
</div>
@endsection
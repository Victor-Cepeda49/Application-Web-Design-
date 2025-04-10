@extends('layouts.app')

@section('titulo', 'Gastos')

@section('contenido')
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h1>Gastos</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Registro de gastos recientes</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Añadir gasto</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
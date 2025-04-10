@extends('layouts.app')

@section('titulo', 'Ingresos')

@section('contenido')
    <div class="card">
        <div class="card-header bg-success text-white">
            <h1>Ingresos</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Últimos ingresos registrados</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Registrar nuevo ingreso</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
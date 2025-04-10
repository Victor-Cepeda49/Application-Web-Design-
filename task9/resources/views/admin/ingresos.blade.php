@extends('adminlte::page')

@section('title', 'Ingresos')

@section('content_header')
    <h1>Ingresos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Últimos ingresos registrados</h3>
                        </div>
                        <div class="card-body">
                            <p>No hay registros por el momento.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Registrar nuevo ingreso</h3>
                        </div>
                        <div class="card-body">
                            <p>Utiliza este formulario para registrar un nuevo ingreso.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>© 2025 - Proyecto Task9 ralizado por Victor Cepeda</strong>
@stop
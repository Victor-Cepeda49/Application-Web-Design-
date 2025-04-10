@extends('adminlte::page')

@section('title', 'Informes')

@section('content_header')
    <h1>Informes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Informe mensual</h3>
                        </div>
                        <div class="card-body">
                            <p>Consulta informes mensuales de ingresos y gastos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informe anual</h3>
                        </div>
                        <div class="card-body">
                            <p>Consulta los informes anuales del historico en el sistema.</p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Estadísticas generales</h3>
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
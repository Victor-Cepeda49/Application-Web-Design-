@extends('layouts.app')

@section('titulo', 'Informes')

@section('contenido')
    <div class="card">
        <div class="card-header bg-info text-white">
            <h1>Informes</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Informe mensual</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Informe anual</h5>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-md">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Estadísticas generales</h5>
                    </div>
                </div>
            </div>
        </div>
            
    </div>
@endsection
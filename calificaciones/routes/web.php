<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ActividadController;

Route::get('/', function () {
    return redirect()->route('asignaturas.index');
});

Route::resource('asignaturas', AsignaturaController::class, [
    'parameters' => ['asignaturas' => 'asignatura']
]);

Route::resource('actividades', ActividadController::class, [
    'parameters' => ['actividades' => 'actividad']
]);

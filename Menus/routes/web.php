<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', [MenuController::class, 'inicio'])->name('inicio');
Route::get('/ingresos', [MenuController::class, 'ingresos'])->name('ingresos');
Route::get('/gastos', [MenuController::class, 'gastos'])->name('gastos');
Route::get('/informes', [MenuController::class, 'informes'])->name('informes');


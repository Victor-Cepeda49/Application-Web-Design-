<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'inicio'])->name('inicio');
Route::get('/ingresos', [AdminController::class, 'ingresos'])->name('ingresos');
Route::get('/gastos', [AdminController::class, 'gastos'])->name('gastos');
Route::get('/informes', [AdminController::class, 'informes'])->name('informes');
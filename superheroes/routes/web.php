<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;

Route::get('/', function () {
    return redirect()->route('superheroes.index');
});

// Rutas adicionales para papelera y restauración
Route::get('superheroes/trashed', [SuperheroeController::class, 'trashed'])->name('superheroes.trashed');
Route::patch('superheroes/{id}/restore', [SuperheroeController::class, 'restore'])->name('superheroes.restore');
Route::delete('superheroes/{id}/force-delete', [SuperheroeController::class, 'forceDelete'])->name('superheroes.forceDelete');

// Rutas de recursos estándar
Route::resource('superheroes', SuperheroeController::class, [
    'parameters' => ['superheroes' => 'superheroe']
]);
<?php

use App\Models\Pelicula;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\PersonajeController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/personajes/create', function () {
    $peliculas = Pelicula::all();
    return view('personajes.create', compact('peliculas'));
})->name('personajes.create');

Route::get('/personajes/{personaje}/edit', function ($id) {
    $personaje = App\Models\Personaje::findOrFail($id);
    $peliculas = App\Models\Pelicula::all();
    return view('personajes.edit', compact('personaje', 'peliculas'));
})->name('personajes.edit');

Route::get('/personajes', [PersonajeController::class, 'index'])->name('personajes.index');

Route::get('/personajes', [App\Http\Controllers\PersonajeController::class, 'index'])->name('personajes.index');

Route::delete('/personajes/{personaje}', [PersonajeController::class, 'destroy'])->name('personajes.destroy');

// Mostrar formulario de creación (puede reemplazar el closure anterior)
Route::get('/peliculas/create', [PeliculaController::class, 'create'])->name('peliculas.create');

// Guardar película/serie
Route::post('/peliculas', [PeliculaController::class, 'store'])->name('peliculas.store');

// (Opcional) Listar todas las películas
Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');



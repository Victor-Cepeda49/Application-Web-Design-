<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\PeliculaController;

Route::apiResource('personajes', PersonajeController::class);
Route::apiResource('peliculas', PeliculaController::class);

// Ruta opcional para asociar personajes y películas
Route::post('personajes/{personaje}/peliculas', [PersonajeController::class, 'asociarPeliculas']);

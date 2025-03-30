<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('superheroes.index');
});

Route::resource('superheroes', SuperheroeController::class, [
    'parameters' => ['superheroes' => 'superheroe']
]);
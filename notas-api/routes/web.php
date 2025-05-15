<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('inicio');
});

Route::get('/notas', function () {
    return view('notas');
});
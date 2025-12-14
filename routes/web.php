<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegoController;

Route::get('/', function () {
    return redirect()->route('videojuegos.index');
});

Route::resource('videojuegos', VideojuegoController::class);
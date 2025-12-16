<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VideojuegoApiController;

Route::get('/videojuegos', [VideojuegoApiController::class, 'index']);
Route::get('/videojuegos/genero/{genero}', [VideojuegoApiController::class, 'filtrarPorGenero']);

?>
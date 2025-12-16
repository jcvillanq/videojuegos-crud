<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Videojuego;

class VideojuegoApiController extends Controller
{
     // Devolver todos los videojuegos
    public function index()
    {
        $videojuegos = Videojuego::all();
        
        if ($videojuegos->isEmpty()) {
            return response()->json([
                'codigo' => 404,
                'mensaje' => 'No se encontraron videojuegos'
            ], 404);
        }
        
        return response()->json([
            'codigo' => 200,
            'mensaje' => 'Videojuegos obtenidos correctamente',
            'total' => $videojuegos->count(),
            'datos' => $videojuegos
        ], 200);
    }
    
    // Filtrar videojuegos por género
    public function filtrarPorGenero($genero)
    {
        $videojuegos = Videojuego::where('genero', $genero)->get();
        
        if ($videojuegos->isEmpty()) {
            return response()->json([
                'codigo' => 404,
                'mensaje' => "No se encontraron videojuegos del género: $genero"
            ], 404);
        }
        
        return response()->json([
            'codigo' => 200,
            'mensaje' => "Videojuegos del género '$genero' obtenidos correctamente",
            'total' => $videojuegos->count(),
            'datos' => $videojuegos
        ], 200);
    }
}

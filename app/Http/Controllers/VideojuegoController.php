<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;


class VideojuegoController extends Controller
{
    // Mostrar todos los videojuegos
    public function index(Request $request)
    {
        $query = Videojuego::query();
        
        // Filtrar por género si se proporciona
        if ($request->has('genero') && $request->genero != '') {
            $query->where('genero', $request->genero);
        }
        
        $videojuegos = $query->get();
        $generos = Videojuego::distinct('genero')->get();
        
        return view('videojuegos.index', compact('videojuegos', 'generos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('videojuegos.create');
    }

    // Guardar nuevo videojuego
    public function store(Request $request)
    {
        $videojuego = new Videojuego();
        $videojuego->titulo = $request->titulo;
        $videojuego->genero = $request->genero;
        $videojuego->precio = (float) $request->precio;
        $videojuego->fecha_lanzamiento = $request->fecha_lanzamiento;
        $videojuego->puntuacion = (float) $request->puntuacion;
        $videojuego->multijugador = $request->has('multijugador');
        $videojuego->ventas_millones = (float) $request->ventas_millones;
        $videojuego->detalles = [
            'desarrollador' => $request->desarrollador,
            'plataforma' => $request->plataforma,
            'clasificacion_edad' => $request->clasificacion_edad
        ];
        $videojuego->save();
        
        return redirect()->route('videojuegos.index')->with('success', 'Videojuego creado correctamente');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $videojuego = Videojuego::findOrFail($id);
        return view('videojuegos.edit', compact('videojuego'));
    }

    // Actualizar videojuego
    public function update(Request $request, $id)
    {
        $videojuego = Videojuego::findOrFail($id);
        $videojuego->titulo = $request->titulo;
        $videojuego->genero = $request->genero;
        $videojuego->precio = (float) $request->precio;
        $videojuego->fecha_lanzamiento = $request->fecha_lanzamiento;
        $videojuego->puntuacion = (float) $request->puntuacion;
        $videojuego->multijugador = $request->has('multijugador');
        $videojuego->ventas_millones = (float) $request->ventas_millones;
        $videojuego->detalles = [
            'desarrollador' => $request->desarrollador,
            'plataforma' => $request->plataforma,
            'clasificacion_edad' => $request->clasificacion_edad
        ];
        $videojuego->save();
        
        return redirect()->route('videojuegos.index')->with('success', 'Videojuego actualizado correctamente');
    }

    // Eliminar videojuego
    public function destroy($id)
    {
        $videojuego = Videojuego::findOrFail($id);
        $videojuego->delete();
        
        return redirect()->route('videojuegos.index')->with('success', 'Videojuego eliminado correctamente');
    }
}
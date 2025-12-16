<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('welcome');
    }
    
    public function process(Request $request)
    {
        $usuario = Usuario::where('usuario', $request->usuario)->first();
        
        // Verificar si el usuario existe
        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }
        
        // Verificar si el usuario está activo
        if (!$usuario->activo) {
            return redirect()->back()->with('error', 'Usuario bloqueado por demasiados intentos fallidos');
        }
        
        // Verificar la contraseña
        if ($request->password === $usuario->password) {
            // Login correcto - resetear intentos fallidos
            $usuario->intentos_fallidos = 0;
            $usuario->save();
            
            return redirect()->route('videojuegos.index')->with('success', 'Bienvenido ' . $usuario->nombre);
        } else {
            // Password incorrecto
            return redirect()->back()->with('error', 'Contraseña incorrecta');
        }
    }
}
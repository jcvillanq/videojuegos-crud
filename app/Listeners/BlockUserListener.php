<?php

namespace App\Listeners;

use App\Events\FailedLoginEvent;
use Illuminate\Support\Facades\Log;

class BlockUserListener
{
    public function __construct()
    {
        //
    }

    public function handle(FailedLoginEvent $event): void
    {
        $usuario = $event->usuario;
        
        // Incrementar intentos fallidos
        $usuario->intentos_fallidos = ($usuario->intentos_fallidos ?? 0) + 1;
        $usuario->save();
        
        // Si llega a 3 intentos, bloquear usuario
        if ($usuario->intentos_fallidos >= 3) {
            $usuario->activo = false;
            $usuario->save();
            
            Log::error("Usuario '{$usuario->usuario}' ha sido BLOQUEADO después de 3 intentos fallidos");
        }
    }
}
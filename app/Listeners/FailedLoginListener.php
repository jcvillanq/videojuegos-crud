<?php

namespace App\Listeners;

use App\Events\FailedLoginEvent;
use Illuminate\Support\Facades\Log;

class FailedLoginListener
{
    public function __construct()
    {
        //
    }

    public function handle(FailedLoginEvent $event): void
    {
        $usuario = $event->usuario;
        $fecha = now()->format('d/m/Y H:i:s');
        
        Log::warning("Intento de login fallido para el usuario '{$usuario->usuario}' el {$fecha}");
    }
}
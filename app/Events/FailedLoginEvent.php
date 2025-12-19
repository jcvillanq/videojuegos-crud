<?php

namespace App\Events;

use App\Models\Usuario;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class FailedLoginEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public Usuario $usuario;

    /**
     * Create a new event instance.
     */
    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }
}

<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Usuario extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'usuarios';
    
    protected $fillable = [
        'usuario',
        'password',
        'nombre',
        'email',
        'activo',
        'intentos_fallidos'
    ];
}
<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Videojuego extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'videojuegos';
    
    protected $fillable = [
        'titulo',
        'genero',
        'precio',
        'fecha_lanzamiento',
        'puntuacion',
        'multijugador',
        'ventas_millones',
        'detalles'
    ];
}
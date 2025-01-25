<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Card extends Model
{
    // Define la colección (tabla en términos de SQL)
    protected $collection = 'cards';

    // Campos que pueden ser llenados en masa
    protected $fillable = [
        'nombre',          // Nombre de la carta
        'tipo',          // Tipo de carta (ej. Agua, Fuego, etc.)
        'hp',            // Puntos de vida
        'rareza',        // Rareza de la carta (ej. Común, Rara, Ultra Rara)
        'precio',         // Precio de venta
        'imagen_url',     // URL de la imagen de la carta
    ];
}
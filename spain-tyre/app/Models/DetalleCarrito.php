<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCarrito extends Model
{
    protected $fillable = ['id_carrito', 'id_articulo', 'cantidad'];

    protected $table = 'detalle_carrito';

    public $incrementing = false;
    protected $keyType = 'string';

    public function carrito()
    {
        // Un detalle de carrito pertenece a un carrito concreto
        return $this->belongsTo(Carrito::class, 'id_carrito', 'id');
    }

    public function articulo()
    {
        // Un detalle de carrito está ligado a un artículo concreto
        return $this->belongsTo(Articulo::class, 'id_articulo', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $fillable = ['id_pedido', 'id_producto', 'cantidad', 'precio_unitario'];
    
    protected $table = 'detalle_pedido';

    public function pedido()
    {
        // Un detalle de pedido pertenece a un pedido concreto
        return $this->belongsTo(Pedido::class);
    }

    public function articulo()
    {
        // Un detalle de pedido está ligado a un artículo concreto
        return $this->belongsTo(Articulo::class);
    }
}

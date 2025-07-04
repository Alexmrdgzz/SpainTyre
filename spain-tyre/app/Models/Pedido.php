<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['id_cliente', 'total', 'estado', 'precio_envio'];

    protected $table = 'pedidos';

    public function cliente()
    {
        // Un pedido pertenece a un cliente concreto
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function detalles()
    {
        // Un pedido puede tener muchos detalles de varios artículos
        return $this->hasMany(DetallePedido::class, 'id_pedido', 'id');
    }
}

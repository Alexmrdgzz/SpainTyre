<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['id_cliente', 'total', 'estado'];

    protected $table = 'pedidos';

    public function cliente()
    {
        // Un pedido pertenece a un cliente concreto
        return $this->belongsTo(Cliente::class);
    }

    public function detalles()
    {
        // Un pedido puede tener muchos detalles de varios artículos
        return $this->hasMany(DetallePedido::class);
    }
}

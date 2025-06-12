<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['id_cliente', 'dni', 'direccion', 'telefono'];

    protected $table = 'clientes';

    // Indicamos que la clave primaria NO se llama 'id' sino 'id_cliente'
    protected $primaryKey = 'id_cliente';

    // Laravel debe saber que no es autoincremental, ya que el ID viene del user
    public $incrementing = false;

    // El tipo de clave primaria es entero sin signo
    protected $keyType = 'unsignedBigInteger';

    public function user()
    {
        // Este cliente pertenece a un usuario (1:1)
        return $this->belongsTo(User::class, 'id_cliente', 'id');
    }

    public function pedidos()
    {
        // Un cliente puede tener muchos pedidos
        return $this->hasMany(Pedido::class, 'id_cliente', 'id_cliente');
    }

    public function carrito()
    {
        // Relación 1:1 con su carrito
        return $this->hasOne(Carrito::class, 'id_carrito', 'id_cliente');
    }
}

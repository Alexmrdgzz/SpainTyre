<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $fillable = ['id_carrito'];

    protected $table = 'carritos';

    // Indicamos que la clave primaria NO se llama 'id' sino 'id_carrito'
    protected $primaryKey = 'id_carrito';

    // Laravel debe saber que no es autoincremental, ya que el ID viene del cliente
    public $incrementing = false;

    // El tipo de clave primaria es entero sin signo
    protected $keyType = 'unsignedBigInteger';

    // Un carrito pertenece a un cliente
    public function cliente()
    {
        // Le decimos que este carrito pertenece al cliente cuyo id_cliente coincide con id_carrito
        return $this->belongsTo(Cliente::class, 'id_carrito', 'id_cliente');
    }

    // Relación con detalle_carrito (los artículos que contiene el carrito).
    public function detalles()
    {
        return $this->hasMany(DetalleCarrito::class, 'id_carrito', 'id_carrito');
    }  
    
}

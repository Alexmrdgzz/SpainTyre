<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable = ['nombre', 'marca', 'descripcion', 'precio', 'stock', 'url_imagen'];

    protected $table = 'articulos';

    public function neumatico()
    {
        // Si es un neumático, esta relación será válida
        return $this->hasOne(Neumatico::class);
    }

    public function productoMontaje()
    {
        // Si es un articulo de montaje, esta relación será válida
        return $this->hasOne(ProductoMontaje::class);
    }

    public function detalleCarrito()
    {
        // Un articulo puede estar incluido en múltiples carritos
        return $this->hasMany(DetalleCarrito::class);
    }

    public function detallePedido()
    {
        // Un articulo puede formar parte de múltiples pedidos
        return $this->hasMany(DetallePedido::class);
    }
}

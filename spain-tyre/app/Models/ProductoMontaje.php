<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoMontaje extends Model
{
    protected $fillable = ['id_producto_montaje', 'categoria'];

    // Indicamos que la clave primaria NO se llama 'id' sino 'id_producto_montaje'
    protected $primaryKey = 'id_producto_montaje';

    protected $table = 'productos_montaje';

    // Laravel debe saber que no es autoincremental, ya que el ID viene del articulo
    public $incrementing = false;

    // El tipo de clave primaria es entero sin signo
    protected $keyType = 'unsignedBigInteger';
    
    public function articulo()
    {
        // Un producto de montaje está ligado a un articulo
        return $this->belongsTo(Articulo::class, 'id');
    }
}

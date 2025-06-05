<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Neumatico extends Model
{
    protected $fillable = [
        'id_neumatico', 'modelo', 'ancho', 'perfil', 'diametro',
        'indice_carga', 'indice_velocidad',
        'tipo_vehiculo', 'estacion', 'ruido_db',
        'consumo', 'agarre', 'fecha_fabricacion'
    ];

    protected $table = 'neumaticos';

    // Indicamos que la clave primaria NO se llama 'id' sino 'id_neumatico'
    protected $primaryKey = 'id_neumatico';

    // Laravel debe saber que no es autoincremental, ya que el ID viene del articulo
    public $incrementing = false;

    // El tipo de clave primaria es entero sin signo
    protected $keyType = 'unsignedBigInteger';

    public function articulo()
    {
        // Un neumático está ligado a un articulo
        return $this->belongsTo(Articulo::class, 'id');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Articulo;

class DetalleArticulo extends Component
{
    public $articulo;

    /**
     * Método que se ejecuta automáticamente, recibe el ID de un artículo, lo busca 
     * en la base de datos con sus relaciones
     * 'neumatico' y 'productoMontaje', y lo guarda en la propiedad pública $articulo.
     * 
     * @param int $id  ID del artículo que se desea mostrar
     */
    public function mount($id)
    {
        $this->articulo = Articulo::with(['neumatico', 'productoMontaje'])->findOrFail($id);
    }

    // Metodo para renderizar la vista del detalle del artículo
    public function render()
    {
        return view('articulo.detalle-articulo');
    }
}

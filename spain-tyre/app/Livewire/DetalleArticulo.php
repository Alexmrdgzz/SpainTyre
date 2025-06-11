<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Articulo;

class DetalleArticulo extends Component
{
    public $articulo;

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

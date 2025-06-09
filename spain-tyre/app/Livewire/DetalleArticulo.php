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

    public function render()
    {
        return view('livewire.detalle-articulo')->layout('components.layouts.app');
    }
}

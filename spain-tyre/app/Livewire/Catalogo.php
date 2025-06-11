<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Articulo;

class Catalogo extends Component
{
    
    public $tipo = 'neumaticos'; // Categoria seleccionada por defecto
    public $vehiculo = null;     // Tipo de vehiculo seleccionado : turismo, camion, furgoneta o null (todos)

    use WithPagination;

    // Metodo para renderizar la vista del catálogo
    public function render()
    {
        if ($this->tipo === 'neumaticos') {
            $query = Articulo::whereHas('neumatico');

            if ($this->vehiculo) {
                $query = $query->whereHas('neumatico', function ($q) {
                    $q->where('tipo_vehiculo', $this->vehiculo);
                });
            }

            $articulos = $query->paginate(6);
        } else {
            $articulos = Articulo::whereHas('productoMontaje')->paginate(6);
        }

        return view('catalogo.ver-catalogo', compact('articulos'));
    }

    // Reiniciar paginación al cambiar tipo de producto, el metodo se llama automáticamente al cambiar el tipo de producto
    public function updatedTipo()
    {
        $this->vehiculo = null; // reseteamos filtro vehículo si no es neumatico
        $this->resetPage();
    }

    // Reiniciar paginación al cambiar tipo de vehículo, el metodo se llama automáticamente al cambiar el tipo de vehículo
    public function updatedVehiculo()
    {
        $this->resetPage();
    }

}

<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Articulo;

class Catalogo extends Component
{
    use WithPagination;
    
    public $tipo = 'neumaticos';
    public $vehiculo = null;
    public $marca = null;
    
    public function render()
    {
        if ($this->tipo === 'neumaticos') {
            $query = Articulo::whereHas('neumatico')
                ->when($this->vehiculo, function ($q) {
                    $q->whereHas('neumatico', function ($q) {
                        $q->where('tipo_vehiculo', $this->vehiculo);
                    });
                })
                ->when($this->marca, function ($q) {
                    $q->where('marca', $this->marca);
                });

            $articulos = $query->paginate(6);
            
            // Obtener todas las marcas de neumáticos
            $todasLasMarcas = Articulo::whereHas('neumatico')
                ->select('marca')
                ->distinct()
                ->orderBy('marca')
                ->pluck('marca');
                
            // Obtener disponibilidad por marca para el vehículo actual
            $marcasDisponibles = Articulo::whereHas('neumatico', function($q) {
                    if ($this->vehiculo) {
                        $q->where('tipo_vehiculo', $this->vehiculo);
                    }
                })
                ->select('marca')
                ->distinct()
                ->pluck('marca')
                ->toArray();

        } else {
            $query = Articulo::whereHas('productoMontaje')
            ->when($this->marca, function ($q) {
                $q->where('marca', $this->marca);
            });

            $articulos = $query->paginate(6);
            
            // Obtener todas las marcas de productos de montaje
            $todasLasMarcas = Articulo::whereHas('productoMontaje')
                ->select('marca')
                ->distinct()
                ->orderBy('marca')
                ->pluck('marca');
                
            // Para productos de montaje, todas las marcas están disponibles
            $marcasDisponibles = $todasLasMarcas->toArray();
        }

        return view('catalogo.ver-catalogo', [
            'articulos' => $articulos,
            'todasLasMarcas' => $todasLasMarcas,
            'marcasDisponibles' => $marcasDisponibles
        ]);
    }

    public function updatedTipo()
    {
        // Solo resetea la marca si cambiamos el tipo de producto.
        if ($this->tipo !== 'neumaticos') {
            $this->marca = null;
        }
        $this->resetPage();
    }

    public function updatedVehiculo() {
        $this->resetPage();
    }

}
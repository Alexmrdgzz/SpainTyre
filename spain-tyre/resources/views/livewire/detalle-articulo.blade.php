<div class="w-full mx-auto px-4 py-6 bg-gray-300 dark:bg-transparent rounded-lg">
    {{-- Botón Volver --}}
    <div class="mb-6">
        <a href="{{ route('home') }}" 
            class="bg-gray-400 dark:bg-gray-700 hover:bg-gray-500 dark:hover:bg-gray-600 text-gray-900 dark:text-gray-200 font-semibold px-4 py-2 rounded transition-colors duration-200 inline-block"
            type="button"
        >
            ← Volver
        </a>
    </div>

    <div class="flex flex-col md:flex-row gap-6 bg-gray-200 dark:bg-gray-600 p-6 rounded-lg">
        {{-- Imagen --}}
        <div class="md:w-2/5 flex justify-center items-center">
            @if($articulo->url_imagen)
                <img src="{{ asset($articulo->url_imagen) }}" alt="Imagen de {{ $articulo->nombre }}" class="rounded-lg max-h-96 object-contain">
            @else
                <div class="bg-gray-200 dark:bg-gray-700 w-full h-72 flex items-center justify-center rounded-lg text-gray-500 dark:text-gray-300">
                    Sin imagen disponible
                </div>
            @endif
        </div>

        {{-- Información --}}
        <div class="md:w-2/3 flex flex-col justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2 text-black dark:text-white">{{ $articulo->nombre }}</h1>
                <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $articulo->marca }}</p>
                <p class="mb-4 whitespace-pre-line text-gray-800 dark:text-gray-300">{{ $articulo->descripcion ?? 'Sin descripción disponible.' }}</p>

                <div class="text-xl font-semibold text-green-600 dark:text-green-400 mb-6">
                    {{ number_format($articulo->precio, 2) }} €
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> (IVA incluido)</span>
                </div>

                <div class="mb-6 text-gray-800 dark:text-gray-300">
                    <span class="font-semibold">Stock disponible:</span> {{ $articulo->stock }}
                </div>

                {{-- Datos específicos --}}
                @if($articulo->neumatico)
                    <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-4 rounded-md mb-6 text-gray-700 dark:text-gray-300">
                        <h2 class="text-xl font-semibold mb-3 text-black dark:text-white">Características del neumático</h2>
                        <ul class="grid grid-cols-2 gap-x-6 gap-y-2">
                            <li><strong>Modelo:</strong> {{ $articulo->neumatico->modelo }}</li>
                            <li><strong>Ancho:</strong> {{ $articulo->neumatico->ancho }}</li>
                            <li><strong>Perfil:</strong> {{ $articulo->neumatico->perfil }}</li>
                            <li><strong>Diámetro:</strong> {{ $articulo->neumatico->diametro }}</li>
                            <li><strong>Índice de carga:</strong> {{ $articulo->neumatico->indice_carga }}</li>
                            <li><strong>Índice de velocidad:</strong> {{ $articulo->neumatico->indice_velocidad }}</li>
                            <li><strong>Tipo de vehículo:</strong> {{ $articulo->neumatico->tipo_vehiculo }}</li>
                            <li><strong>Estación:</strong> {{ $articulo->neumatico->estacion }}</li>
                            <li><strong>Ruido:</strong> {{ $articulo->neumatico->ruido_db }}</li>
                            <li><strong>Consumo:</strong> {{ $articulo->neumatico->consumo }}</li>
                            <li><strong>Agarre:</strong> {{ $articulo->neumatico->agarre }}</li>
                            <li><strong>Fecha fabricación:</strong> {{ $articulo->neumatico->fecha_fabricacion ? date('d/m/Y', strtotime($articulo->neumatico->fecha_fabricacion)) : 'No disponible' }}</li>
                        </ul>
                    </div>
                @elseif($articulo->productoMontaje)
                    <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-4 rounded-md mb-6 text-gray-700 dark:text-gray-300">
                        <h2 class="text-xl font-semibold mb-3 text-black dark:text-white">Categoría del producto de montaje</h2>
                        <p>{{ $articulo->productoMontaje->categoria }}</p>
                    </div>
                @endif
            </div>

            {{-- Botón Añadir al carrito --}}
            <div class="flex items-center gap-4">
                @if($articulo->stock > 0)
                    <form action="{{ url('carrito/agregar/'.$articulo->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded transition-colors duration-200">
                            Añadir al carrito
                        </button>
                    </form>
                @else
                    <button disabled class="bg-red-500 cursor-not-allowed text-white font-semibold px-5 py-2 rounded">
                        Agotado
                    </button>
                @endif
                
                {{-- If que muestra mensaje cuando la operación de añadir se ha realizado --}}
                @if(session('success'))
                    <div id="success-message" class="p-2 bg-green-200 text-green-800 rounded text-sm w-max">
                        {{ session('success') }}
                    </div>

                    {{-- Script para hacer que el botón desaparezca pasados dos segundos --}}
                    <script>
                        setTimeout(() => {
                            const msg = document.getElementById('success-message');
                            if (msg) {
                                msg.style.transition = 'opacity 0.5s ease';
                                msg.style.opacity = '0';
                                setTimeout(() => msg.remove(), 500);
                            }
                        }, 2000);
                    </script>
                @endif
            </div>
        </div>
    </div>
</div>

@extends('components.layouts.app')

@section('content')
<div class="w-full bg-gray-300 dark:bg-gray-900 py-6">
    <div class="max-w-7xl mx-auto px-4 py-6 bg-gray-300 dark:bg-transparent rounded-lg">

        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Mi Cesta</h1>

        <div class="flex flex-col md:flex-row gap-6">

            {{-- Listado de artículos --}}
            <div class="md:w-2/3 bg-white dark:bg-gray-800 rounded-lg shadow p-6 space-y-4 max-h-[600px] overflow-y-auto">
                @forelse($detalles as $detalle)
                    <div class="flex items-center gap-4 border border-gray-800 dark:border-gray-300 rounded-md p-4">
                        {{-- Imagen --}}
                        <div class="w-24 h-24 flex-shrink-0">
                            @if($detalle->articulo->url_imagen)
                                <img src="{{ asset($detalle->articulo->url_imagen) }}" alt="{{ $detalle->articulo->nombre }}" class="object-contain w-full h-full rounded">
                            @else
                                <div class="bg-gray-200 dark:bg-gray-800 w-full h-full flex items-center justify-center rounded text-gray-400 dark:text-gray-500">
                                    Sin imagen
                                </div>
                            @endif
                        </div>

                        {{-- Atributos de los articulos --}}
                        <div class="flex-grow">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-3">{{ $detalle->articulo->nombre }}</h3>
                            @if($detalle->articulo->neumatico)
                                <ul class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-700 dark:text-gray-300 mb-4">
                                    <li class="w-1/2">
                                        <strong>Medidas:</strong> {{ $detalle->articulo->neumatico->ancho }}/{{ $detalle->articulo->neumatico->perfil }}/{{ $detalle->articulo->neumatico->diametro }}
                                    </li>
                                    <li class="w-1/2">
                                        <strong>Modelo:</strong> {{ $detalle->articulo->neumatico->modelo }}
                                    </li>
                                    <li class="w-1/2">
                                        <strong>Tipo de vehículo:</strong> {{ $detalle->articulo->neumatico->tipo_vehiculo }}
                                    </li>
                                </ul>
                            @elseif($detalle->articulo->productoMontaje)
                                <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-700 dark:text-gray-300 mb-4">
                                    <div class="w-1/2">
                                        <p><strong>Categoría:</strong> {{ $detalle->articulo->productoMontaje->categoria }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            <div class="flex justify-between items-center">
                                <p class="text-gray-600 dark:text-gray-300"><strong>Cantidad:</strong> {{ $detalle->cantidad }}</p>
                                <div class="flex items-center gap-4">
                                    <p class="text-green-600 dark:text-green-400 font-semibold">{{ number_format($detalle->articulo->precio, 2) }} € c/u</p>
                                    {{-- Botón eliminar --}} 
                                    <form action="{{ route('carrito.eliminarDetalle', ['carrito' => $detalle->id_carrito, 'articulo' => $detalle->id_articulo]) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold p-2 rounded transition-colors duration-200 flex items-center justify-center" aria-label="Eliminar artículo">
                                            <span>
                                                @include('flux.icon.trash')
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-700 dark:text-gray-300">No tienes artículos en la cesta.</p>
                @endforelse
            </div>
            
            {{-- Resumen de pedido --}}
            <div class="md:w-1/3 bg-white dark:bg-gray-800 rounded-lg shadow p-6 self-start">
                <div>
                    <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Resumen</h2>
                    <div class="space-y-2 text-gray-900 dark:text-gray-100 text-lg">
                        <div class="flex justify-between">
                            <span>Subtotal (sin IVA):</span>
                            <span>{{ number_format($subtotal, 2) }} €</span>
                        </div>
                        <div class="flex justify-between">
                            <span>IVA (21%):</span>
                            <span>{{ number_format($iva, 2) }} €</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Gastos de envío:</span>
                            @if($gastosEnvio == 0)
                                <span class="text-green-600 dark:text-green-400 font-semibold">Gratis</span>
                            @else
                                <span>{{ number_format($gastosEnvio, 2) }} €</span>
                            @endif
                        </div>
                        <hr class="border-gray-300 dark:border-gray-600 my-3" />
                        <div class="flex justify-between font-bold text-xl text-green-700 dark:text-green-400">
                            <span>Total:</span>
                            <span>{{ number_format($total, 2) }} €</span>
                        </div>

                        {{-- Botón realizar pedido --}}
                        @if($detalles->count() > 0)
                            <form action="{{ route('pedido.realizar') }}" method="POST" class="mt-6">
                                @csrf
                                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-3 rounded transition-colors duration-200">
                                    Realizar pedido
                                </button>
                            </form>    
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

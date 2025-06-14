@extends('dashboard.index')
@section('contenido')
<h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">📦 Mis pedidos</h1>

{{-- Mensaje de éxito al realizar un pedido --}}
@if (session('success'))
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-300 relative"
    >
        <p>{{ session('success') }}</p>
        <button 
            @click="show = false" 
            class="absolute top-2 right-2 text-green-800 hover:text-green-900 font-bold text-2xl leading-none"
            aria-label="Cerrar mensaje"
        >
            &times;
        </button>
    </div>
@endif

<div class="w-full mx-auto px-4 py-6 bg-gray-300 dark:bg-transparent rounded-lg">
    <div class="max-h-[540px] overflow-y-auto pr-4">
        {{-- Muestra la lista o un mensaje y un botón que lleva hasta el catalogo si aun no hay pedidos --}}
        @forelse ($pedidos as $pedido)
            <div class="bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg shadow-md mb-6 p-4">
                {{-- Cabecera del pedido --}}
                <div class="flex justify-between items-center mb-3">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            Pedido #{{ $pedido->id }}
                        </h2>
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            Fecha: {{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y') }}
                        </p>
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            Estado: <span class="font-semibold">{{ ucfirst($pedido->estado ?? 'Desconocido') }}</span>
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-blue-600 dark:text-blue-400">
                            Total: {{ number_format($pedido->total, 2) }} €
                        </p>
                    </div>
                </div>

                {{-- Lista de artículos del pedido --}}
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($pedido->detalles as $detalle)
                        <div class="py-3 flex justify-between items-center">
                            <div>
                                <p class="text-base font-medium text-gray-800 dark:text-gray-100">
                                    {{ $detalle->articulo->nombre ?? 'Artículo no disponible' }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Cantidad: {{ $detalle->cantidad }} | Precio unitario: {{ number_format($detalle->precio_unitario, 2) }} €
                                </p>
                            </div>
                            <div class="text-right text-gray-900 dark:text-gray-200">
                                {{ number_format($detalle->cantidad * $detalle->precio_unitario, 2) }} €
                            </div>
                        </div>
                    @endforeach

                    {{-- Mostrar gastos de envío --}}
                    <div class="py-3 flex justify-between items-center font-semibold text-gray-900 dark:text-gray-200">
                        <div>
                            <p class="text-base font-medium">
                                Gastos de envío
                            </p>
                        </div>
                        <div class="text-right">
                            @if (($pedido->precio_envio ?? 0) == 0)
                                Gratis
                            @else
                                {{ number_format($pedido->precio_envio, 2) }} €
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <p class="text-lg">Aún no has realizado ningún pedido.</p>
                <a href="{{ route('home') }}" class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded transition-colors duration-200">
                    🛒 Ir a la tienda
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection
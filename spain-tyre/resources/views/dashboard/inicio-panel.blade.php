@extends('dashboard.index')
@section('contenido')
<h1 class="text-2xl font-bold mb-4">👋 Bienvenido/a, {{ Auth::user()->name }}</h1>
<p class="mb-4">Desde este panel puedes gestionar tus pedidos y revisar tu información personal.</p>

{{-- Resumen de pedidos --}}
<div class="bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 p-4 rounded-lg">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Resumen de actividad</h2>
    
    {{-- Mensaje dinámico --}}
    @if($totalPedidos > 0)
        <p class="mb-4 text-gray-800 dark:text-gray-300">
            Has realizado {{ $totalPedidos }} pedido{{ $totalPedidos > 1 ? 's' : '' }}. ¡Gracias por tu confianza!
        </p>
    @else
        <p class="mb-4 text-gray-800 dark:text-gray-300">
            Aún no has realizado ningún pedido. ¡Empieza hoy mismo!
        </p>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
        {{-- Total de pedidos --}}
        <div class="flex items-center bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-3 shadow-sm">
            <span class="text-3xl mr-4">📦</span>
            <div>
                <p class="text-base font-semibold text-gray-800 dark:text-gray-200">
                    Pedidos Realizados: {{ $totalPedidos }}
                </p>
            </div>
        </div>

        {{-- Último pedido --}}
        <div class="flex items-center bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-3 shadow-sm">
            <span class="text-3xl mr-4">📅</span>
            <div>
                @if($ultimoPedido)
                    <p class="text-lg font-bold text-gray-800 dark:text-gray-200">
                        {{ \Carbon\Carbon::parse($ultimoPedido->created_at)->format('d/m/Y') }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Último Pedido</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        Estado: <span class="font-semibold">{{ ucfirst($ultimoPedido->estado ?? 'Desconocido') }}</span>
                    </p>
                @else
                    <p class="text-lg font-bold text-gray-800 dark:text-gray-200">—</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Sin pedidos aún</p>
                @endif
            </div>
        </div>

        {{-- Total gastado --}}
        <div class="flex items-center bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-3 shadow-sm">
            <span class="text-3xl mr-4">💶</span>
            <div>
                <p class="text-lg font-bold text-gray-800 dark:text-gray-200">
                    {{ number_format($totalGastado, 2) }} €
                </p>
                <p class="text-sm text-gray-600 dark:text-gray-400">Total Compras Realizadas</p>
            </div>
        </div>
    </div>
    
    {{-- Botón para ir a la tienda --}}
    <div class="mt-6">
        <a href="{{ route('home') }}"
        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded transition-colors duration-200">
            🛒 Ver artículos disponibles
        </a>
    </div>
</div>
@endsection
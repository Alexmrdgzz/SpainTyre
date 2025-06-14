@extends('components.layouts.app')

@section('content')
<div class="w-full mx-auto px-4 py-6 bg-gray-300 dark:bg-transparent rounded-lg">
    <div class="flex flex-col md:flex-row gap-6 bg-gray-200 dark:bg-gray-900 p-6 rounded-lg h-[720px]">
        {{-- Menú lateral --}}
        <aside class="w-full md:w-1/4 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg p-4">
            <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Menú</h2>
            <nav class="space-y-2">
                <a href="{{ route('dashboard.inicio-panel') }}" 
                class="block px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-300 dark:bg-gray-600' : 'bg-gray-200 dark:bg-gray-700' }} hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 transition-colors">
                    🏠 Inicio
                </a>
                <a href="{{ route('dashboard.mostrar-pedidos') }}" 
                class="block px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-300 dark:bg-gray-600' : 'bg-gray-200 dark:bg-gray-700' }} hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 transition-colors">
                    📦 Mis pedidos
                </a>
                <a href="{{ route('dashboard.datos-cliente') }}" 
                class="block px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-300 dark:bg-gray-600' : 'bg-gray-200 dark:bg-gray-700' }} hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 transition-colors">
                    👤 Mis datos
                </a>
                <a href="{{ route('dashboard.soporte') }}" 
                class="block px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-300 dark:bg-gray-600' : 'bg-gray-200 dark:bg-gray-700' }} hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-100 transition-colors">
                    💬 Soporte
                </a>
            </nav>
        </aside>
        
        {{-- Contenido principal --}}
        <main class="w-full md:w-3/4 text-gray-900 dark:text-gray-100">
            @yield('contenido')
        </main>
    </div>
</div>
@endsection

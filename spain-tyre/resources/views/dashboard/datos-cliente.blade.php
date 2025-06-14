@extends('dashboard.index')
@section('contenido')
<h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">👤 Mis datos personales</h1>
<p class="text-gray-900 dark:text-gray-300 mb-6">Aquí podrás revisar y modificar tus datos personales.</p>

@php
    $cliente = Auth::user()->cliente;
    $mostrarError = empty($cliente->dni) || empty($cliente->direccion);
@endphp

@if ($mostrarError)
    <div class="mb-4 p-4 rounded bg-red-100 text-red-800 border border-red-300 relative">
        <p>⚠️ Por favor, completa tu DNI y dirección antes de continuar.</p>
    </div>
@endif

<div class="w-full bg-white dark:bg-gray-800 rounded-lg p-6 shadow-md border border-gray-300 dark:border-gray-700">
    <form method="POST" action="{{ route('cliente.actualizar-datos') }}" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Información Personal --}}
        <div>
            <div class="flex justify-between items-center mb-4">
                <label class="block text-lg font-bold text-gray-900 dark:text-gray-200">Información Personal</label>
                <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded shadow transition-colors duration-200">
                    💾 Guardar cambios
                </button>
            </div>

            {{-- DNI --}}
            <div>
                <label for="dni" class="block text-sm font-medium text-gray-900 dark:text-gray-300 mb-1">DNI</label>
                <input type="text" name="dni" id="dni" value="{{ old('dni', $cliente->dni) }}"
                    class="block rounded-md border border-gray-500 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-600 focus:border-blue-600 p-2 max-w-xs" 
                    required>
                @error('dni')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Dirección desglosada --}}
        <div>
            <label class="block text-lg font-bold text-gray-900 dark:text-gray-200 mb-4">Dirección</label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="calle" class="block text-sm font-medium text-gray-900 dark:text-gray-300 mb-1">Calle</label>
                    <input type="text" name="calle" id="calle" placeholder="Calle" 
                        value="{{ old('calle', $direccion['calle']) }}"
                        class="w-full rounded-md border border-gray-500 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-600 focus:border-blue-600 p-2" 
                        required>
                </div>

                <div>
                    <label for="numero" class="block text-sm font-medium text-gray-900 dark:text-gray-300 mb-1">Numero</label>
                    <input type="text" name="numero" id="numero" placeholder="Numero" 
                        value="{{ old('numero', $direccion['numero']) }}"
                        class="w-full rounded-md border border-gray-500 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-600 focus:border-blue-600 p-2" 
                        required>
                </div>

                <div>
                    <label for="codigo_postal" class="block text-sm font-medium text-gray-900 dark:text-gray-300 mb-1">Código Postal</label>
                    <input type="text" name="codigo_postal" id="codigo_postal" placeholder="Código Postal"
                        value="{{ old('codigo_postal', $direccion['codigo_postal']) }}"
                        class="w-full rounded-md border border-gray-500 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-600 focus:border-blue-600 p-2" 
                        required>
                </div>

                <div>
                    <label for="localidad" class="block text-sm font-medium text-gray-900 dark:text-gray-300 mb-1">Localidad</label>
                    <input type="text" name="localidad" id="localidad" placeholder="Localidad"
                        value="{{ old('localidad', $direccion['localidad']) }}"
                        class="w-full rounded-md border border-gray-500 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-600 focus:border-blue-600 p-2" 
                        required>
                </div>
                
                <div class="md:w-1/2 w-full">
                    <label for="provincia" class="block text-sm font-medium text-gray-900 dark:text-gray-300 mb-1">Provincia</label>
                    <input type="text" name="provincia" id="provincia" placeholder="Provincia"
                        value="{{ old('provincia', $direccion['provincia']) }}"
                        class="w-full rounded-md border border-gray-500 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 shadow-sm focus:ring-blue-600 focus:border-blue-600 p-2" 
                        required>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

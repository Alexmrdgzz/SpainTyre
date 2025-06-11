<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Catalogo;
use App\Livewire\DetalleArticulo;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;

// Verified comprueba si has autenticado tu email, pero está deshabilitado por defecto.

// Pagina de bienvenida por defecto de Laravel
Route::get('/', function () {
    return view('welcome');
})->name('bienvenida');

// Pagina de inicio del catálogo
Route::get('/home', Catalogo::class)
    ->middleware('auth')
    ->name('home');

// Pagina de detalle de un artículo
Route::get('/articulo/{id}', DetalleArticulo::class)->name('articulos.show');

// Ruta para agregar un artículo al carrito
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');

// Ruta para ver el carrito
Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');

// Ruta para realizar un pedido
Route::post('/pedido/realizar', [PedidoController::class, 'realizar'])->name('pedido.realizar');


// Ruta para eliminar un artículo del carrito
Route::delete('/carrito/{carrito}/{articulo}', [CarritoController::class, 'eliminarDetalle'])->name('carrito.eliminarDetalle');

// Ruta para ver el panel de control del cliente
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rutas de configuración del cliente autenticado
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

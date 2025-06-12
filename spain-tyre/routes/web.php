<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Catalogo;
use App\Livewire\DetalleArticulo;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DashboardController;

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
Route::get('/articulo/{id}', DetalleArticulo::class)->middleware('auth')->name('articulos.show');

// Ruta para agregar un artículo al carrito
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->middleware('auth')->name('carrito.agregar');

// Ruta para ver el carrito
Route::get('/carrito', [CarritoController::class, 'verCarrito'])->middleware('auth')->name('carrito.ver');

// Ruta para realizar un pedido
Route::post('/pedido/realizar', [PedidoController::class, 'realizar'])->middleware('auth')->name('pedido.realizar');

// Ruta para eliminar un artículo del carrito
Route::delete('/carrito/{carrito}/{articulo}', [CarritoController::class, 'eliminarDetalle'])->middleware('auth')->name('carrito.eliminarDetalle');

// Ruta para ver un resumen del panel de control del cliente
Route::get('/dashboard/mi-inicio', [DashboardController::class, 'inicio'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.inicio-panel');

// Ruta para ver los pedidos del cliente autenticado
Route::get('/dashboard/mis-pedidos', [DashboardController::class, 'mostrarPedidos'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.mostrar-pedidos');

// Ruta para ver los pedidos del cliente autenticado
Route::get('/dashboard/mis-datos', [DashboardController::class, 'datosCliente'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.datos-cliente');

// Rutas de configuración del cliente autenticado
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

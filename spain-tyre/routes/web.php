<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Catalogo;
use App\Http\Controllers\ArticuloController;

// Verified comprueba si has autenticado tu email, pero está deshabilitado por defecto.

Route::get('/', function () {
    return view('welcome');
})->name('bienvenida');

Route::get('/home', Catalogo::class)
    ->middleware('auth')
    ->name('home');

Route::get('/articulo/{id}', [ArticuloController::class, 'show'])->name('articulos.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

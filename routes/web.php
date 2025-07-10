<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

// 1) Ruta pública: bienvenida para invitados
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
// Alias “dashboard” que redirige a clientes
Route::get('/dashboard', function () {
    return redirect()->route('clientes.index');
})->name('dashboard')->middleware('auth');


// 2) Ruta raíz para autenticados: redirige a /clientes
Route::get('/', function () {
    return redirect()->route('clientes.index');
})->middleware('auth');

// 3) Tus rutas protegidas
Route::middleware('auth')->group(function () {
    Route::resource('clientes', ClienteController::class);
    // aquí van las demás rutas protegidas...
});

// 4) Rutas de Breeze (login, logout, register, etc.)
require __DIR__.'/auth.php';

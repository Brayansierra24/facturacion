<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;
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


Route::resource('productos', \App\Http\Controllers\ProductoController::class)->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::resource('facturas', FacturaController::class);
});
Route::get('facturas/{factura}/pdf', [FacturaController::class, 'imprimir'])->name('facturas.pdf');

Route::resource('facturas', FacturaController::class);
Route::get('facturas/{id}/imprimir', [FacturaController::class, 'imprimir'])->name('facturas.imprimir');
Route::get('facturas/{id}/descargar', [FacturaController::class, 'descargar'])->name('facturas.descargar');
Route::resource('facturas', FacturaController::class)->except(['show']);


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

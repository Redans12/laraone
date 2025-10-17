<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Tienda\ProductoController;
use App\Http\Controllers\API\Tienda\AuthController;
use App\Http\Controllers\API\MaestroController;

// Ruta de prueba simple
Route::get('test', function () {
    return response()->json([
        'mensaje' => '¡API funcionando correctamente!',
        'timestamp' => now()
    ]);
});

// Rutas de autenticación
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Rutas públicas de productos
Route::get('productos', [ProductoController::class, 'index']);

// Rutas públicas de Maestros de Avatar
Route::get('maestros', [MaestroController::class, 'index']);
Route::get('maestros/avatares', [MaestroController::class, 'avatares']);
Route::get('maestros/elemento/{elemento}', [MaestroController::class, 'porElemento']);
Route::get('maestros/{id}', [MaestroController::class, 'show']);

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth:sanctum'])->group(function () {
    // Productos protegidos
    Route::get('productos-ordenados', [ProductoController::class, 'display']);
    Route::get('productos-ordenados/{col?}/{orden?}', [ProductoController::class, 'ordenar']);
    Route::post('productos', [ProductoController::class, 'create']);

    // Maestros protegidos
    Route::post('maestros', [MaestroController::class, 'store']);
    Route::put('maestros/{id}', [MaestroController::class, 'update']);
    Route::patch('maestros/{id}', [MaestroController::class, 'update']);
    Route::delete('maestros/{id}', [MaestroController::class, 'destroy']);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Tienda\ProductoController;

use App\Http\Controllers\API\Tienda\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('productos', [ProductoController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('productos-ordenados', [ProductoController::class, 'display']);
    Route::get('productos-ordenados/{col?}/{orden?}', [ProductoController::class, 'ordenar']);
    Route::post('productos', [ProductoController::class, 'create']);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Tienda\ProductoController;
use App\Http\Controllers\DummyController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::get('productos', [ProductoController::class, 'index']);
Route::get('productos-ordenados', [ProductoController::class, 'display']);
Route::get('productos-ordenados/{col?}/{orden?}', [ProductoController::class, 'ordenar']);
Route::post('productos', [ProductoController::class, 'create']);

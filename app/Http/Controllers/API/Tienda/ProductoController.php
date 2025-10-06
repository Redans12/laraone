<?php

namespace App\Http\Controllers\API\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tienda\Producto;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::all();

        return response()->json($productos);
    }

    public function display(Request $request) {
        $col = $request->input('col') ?? 'id_producto';
        $orden = $request->orden ?? 'asc';

        $productos = Producto::orderBy($col, $orden)->get();

        return response()->json($productos);
    }

    public function ordenar($col = 'id_producto', $orden = 'asc') {
        $productos = Producto::orderBy($col, $orden)->get();

        return response()->json($productos);
    }

    public function create(Request $request) {
        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->save();

        return response()->json($producto);
    }

}

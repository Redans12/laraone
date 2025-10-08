<?php

namespace App\Http\Controllers\API\Tienda;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|min:3|max:255',
                'descripcion' => 'nullable|min:3|max:255',
                'precio' => 'required|decimal:2',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], 400);
            }
            
            $validated = $validator->validated();

            // Solo avanzamos si la validación es correcta
            $producto = new Producto();
            $producto->nombre = $validated['nombre'];
            $producto->descripcion = $validated['descripcion'] ?? null;
            $producto->precio = $validated['precio'];
            $producto->save();

            return response()->json($producto);
        } catch (\Throwable $th) {
            logger()->error($th->getMessage());

            return response()->json([
                'error' => $th->getMessage()
            ], 400);
        }
        
    }

}

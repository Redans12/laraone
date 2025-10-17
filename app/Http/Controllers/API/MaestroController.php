<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MaestroResource;
use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaestroController extends Controller
{
    /**
     * Obtener todos los maestros
     * GET /api/maestros
     */
    public function index()
    {
        $maestros = Maestro::all();
        return MaestroResource::collection($maestros);
    }

    /**
     * Obtener un maestro específico
     * GET /api/maestros/{id}
     */
    public function show($id)
    {
        $maestro = Maestro::find($id);

        if (!$maestro) {
            return response()->json([
                'error' => 'Maestro no encontrado'
            ], 404);
        }

        return new MaestroResource($maestro);
    }

    /**
     * Crear un nuevo maestro
     * POST /api/maestros
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'elemento' => 'required|in:agua,tierra,fuego,aire',
                'nacion' => 'required|string|max:255',
                'nivel_poder' => 'nullable|integer|min:1|max:10',
                'tecnica_especial' => 'nullable|string|max:255',
                'es_avatar' => 'nullable|boolean',
                'edad' => 'nullable|integer|min:1|max:200'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], 400);
            }

            $maestro = Maestro::create($validator->validated());

            return response()->json([
                'message' => 'Maestro creado exitosamente',
                'data' => new MaestroResource($maestro)
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Error al crear el maestro',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Actualizar un maestro
     * PUT/PATCH /api/maestros/{id}
     */
    public function update(Request $request, $id)
    {
        try {
            $maestro = Maestro::find($id);

            if (!$maestro) {
                return response()->json([
                    'error' => 'Maestro no encontrado'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'nombre' => 'sometimes|string|max:255',
                'elemento' => 'sometimes|in:agua,tierra,fuego,aire',
                'nacion' => 'sometimes|string|max:255',
                'nivel_poder' => 'sometimes|integer|min:1|max:10',
                'tecnica_especial' => 'nullable|string|max:255',
                'es_avatar' => 'sometimes|boolean',
                'edad' => 'nullable|integer|min:1|max:200'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], 400);
            }

            $maestro->update($validator->validated());

            return response()->json([
                'message' => 'Maestro actualizado exitosamente',
                'data' => new MaestroResource($maestro)
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Error al actualizar el maestro',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Eliminar un maestro
     * DELETE /api/maestros/{id}
     */
    public function destroy($id)
    {
        try {
            $maestro = Maestro::find($id);

            if (!$maestro) {
                return response()->json([
                    'error' => 'Maestro no encontrado'
                ], 404);
            }

            $maestro->delete();

            return response()->json([
                'message' => 'Maestro eliminado exitosamente'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Error al eliminar el maestro',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Filtrar maestros por elemento
     * GET /api/maestros/elemento/{elemento}
     */
    public function porElemento($elemento)
    {
        $elementos_validos = ['agua', 'tierra', 'fuego', 'aire'];

        if (!in_array($elemento, $elementos_validos)) {
            return response()->json([
                'error' => 'Elemento no válido. Debe ser: agua, tierra, fuego o aire'
            ], 400);
        }

        $maestros = Maestro::where('elemento', $elemento)->get();

        return MaestroResource::collection($maestros);
    }

    /**
     * Obtener solo los avatares
     * GET /api/maestros/avatares
     */
    public function avatares()
    {
        $avatares = Maestro::where('es_avatar', true)->get();
        return MaestroResource::collection($avatares);
    }
}

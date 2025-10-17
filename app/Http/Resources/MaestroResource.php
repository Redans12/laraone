<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaestroResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_maestro,
            'nombre' => $this->nombre,
            'elemento' => $this->elemento,
            'nacion' => $this->nacion,
            'nivel_poder' => $this->nivel_poder,
            'tecnica_especial' => $this->tecnica_especial,
            'es_avatar' => $this->es_avatar,
            'edad' => $this->edad,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

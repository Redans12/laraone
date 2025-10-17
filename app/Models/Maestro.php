<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;

    protected $table = 'maestros';
    protected $primaryKey = 'id_maestro';

    public $fillable = [
        'nombre',
        'elemento',
        'nacion',
        'nivel_poder',
        'tecnica_especial',
        'es_avatar',
        'edad'
    ];

    protected $attributes = [
        'nivel_poder' => 1,
        'es_avatar' => false
    ];

    protected $casts = [
        'es_avatar' => 'boolean',
        'nivel_poder' => 'integer',
        'edad' => 'integer'
    ];
}

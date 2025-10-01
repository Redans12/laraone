<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
    protected $table = 'meses';
    protected $primaryKey = 'id_mes';

    public $fillable = [
        'nombre_mes'
    ];
}

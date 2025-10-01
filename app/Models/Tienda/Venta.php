<?php

namespace App\Models\Tienda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    /** @use HasFactory<\Database\Factories\Tienda\VentaFactory> */
    use HasFactory;

    protected $table = '';
    protected $primaryKey = '';

    public $fillable = [
    ];
}

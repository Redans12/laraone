<?php

namespace App\Models\Tienda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\Tineda\ProductoFactory> */
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';

    public $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'activo'
    ];

    protected $attributes = [
        'activo' => true
    ];

}

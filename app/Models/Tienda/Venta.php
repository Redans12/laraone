<?php

namespace App\Models\Tienda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    /** @use HasFactory<\Database\Factories\Tienda\VentaFactory> */
    use HasFactory;

    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';

    public $fillable = [
        'id_producto',
        'total'
    ];

    public function producto()
    {
        return $this->belongsTo(
            Producto::class, 'id_producto', 'id_producto'
        );
    }
}

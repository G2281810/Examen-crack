<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = "ventas";

    protected $fillable = [
        'id',
        'Fecha',
        'Total',
        'Cantidad',
        'Tienda_Id',
        'Producto_id',
        'Usuarios_Id',
    ];
}

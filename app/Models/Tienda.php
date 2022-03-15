<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;
    protected $table = "tiendas";

    protected $fillable = [
        'id',
        'Nombre_Tienda',
        'Foto',
        'Usuario_Id'
    ];

}

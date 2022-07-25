<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ["_id","codigo_barras", "nombre","descripcion", "precio_venta", "existencia", "image", "imageUrl"
    ];

}

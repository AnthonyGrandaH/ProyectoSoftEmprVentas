<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Venta extends Model
{

    use HasFactory;
    public function productos()
    {
        return $this->hasMany("App\Models\ProductoVendido", "id_venta");
    }

    public function cliente()
    {
        return $this->belongsTo("App\Models\Cliente", "cedula");
    }
}

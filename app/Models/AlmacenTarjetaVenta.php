<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenTarjetaVenta extends Model
{
    use HasFactory;

    protected $table = 'almacen_tarjeta_venta';

    protected $fillable = [
        'producto', 'precio_sugerido', 'existencia_actual'
    ];
}
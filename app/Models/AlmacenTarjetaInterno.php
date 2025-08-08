<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenTarjetaInterno extends Model
{
    use HasFactory;

    protected $table = 'almacen_tarjeta_interno';

    protected $fillable = [
        'insumo', 'existencias_inicio', 'existencia_actual'
    ];
}
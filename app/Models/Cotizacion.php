<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = 'cotizaciones';

    protected $fillable = [
        'fecha',
        'total_cajas',
        'total_kilos',
        'precio_kilo',
        'proveedor',
        'total_pagar',
    ];
}

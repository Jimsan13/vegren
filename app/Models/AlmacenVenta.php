<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenVenta extends Model
{
    use HasFactory;

    protected $table = 'almacen_ventas';

    protected $fillable = [
        'fecha', 'cliente_id', 'descripcion_productos', 'total',
        'condicion_pago', 'estado_entrega', 'fecha_entrega',
        'estado_pago', 'fecha_recepcion_pago'
    ];
}
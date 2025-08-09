<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'nombre', 'empacador', 'cajas_entregadas', 'cajas_empacadas',
        'fecha', 'estado', 'monto', 'tipo', 'numero_factura', 'estado_factura'
    ];
    protected $table = 'proveedores';
}

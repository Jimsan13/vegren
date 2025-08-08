<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenPagoProveedor extends Model
{
    use HasFactory;

    protected $table = 'almacen_pagos_proveedores';

    protected $fillable = [
        'proveedor_id',
        'monto',
        'fecha_pago',
        'metodo_pago'
    ];

    public function proveedor()
    {
        return $this->belongsTo(AlmacenProveedor::class, 'proveedor_id');
    }
}

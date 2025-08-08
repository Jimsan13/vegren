<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenCompraProducto extends Model
{
    use HasFactory;

    protected $table = 'almacen_compras_productos';

    protected $fillable = [
        'fecha', 'nota', 'proveedor_id', 'tipo_pago', 'total',
        'facturado', 'fecha_factura', 'credito_liquidado'
    ];

    public function proveedor()
    {
        return $this->belongsTo(AlmacenProveedor::class);
    }
}
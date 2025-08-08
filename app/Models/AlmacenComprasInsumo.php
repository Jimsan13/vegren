<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenComprasInsumo extends Model
{
    use HasFactory;

    protected $table = 'almacen_compras_insumos';

    protected $fillable = [
        'fecha', 'nota', 'proveedor_id', 'tipo_pago', 'total',
        'facturado', 'fecha_factura', 'credito_liquidado'
    ];

    public function proveedor()
    {
        return $this->belongsTo(AlmacenProveedor::class);
    }
}
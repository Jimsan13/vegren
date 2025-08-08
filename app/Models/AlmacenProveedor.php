<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenProveedor extends Model
{
    use HasFactory;

    protected $table = 'almacen_proveedores';

    protected $fillable = [
        'nombre_razon_social', 'rfc', 'telefono', 'email', 'direccion'
    ];

    public function comprasInsumos()
    {
        return $this->hasMany(AlmacenComprasInsumo::class);
    }

    public function comprasProductos()
    {
        return $this->hasMany(AlmacenCompraProducto::class);
    }
}
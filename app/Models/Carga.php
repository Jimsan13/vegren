<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'lote',
        'cliente',
        'bultosCaja',
        'precioUnidad',
        'totalEnvio',
        'remate',
        'descuentoAplicado',
        'facturacion',
        'saldoCarga',
        'cintaTransporte',
        'facturasPagadas',
        'cajaExtra',
        'representanteResponsable',
    ];

   
     protected $table = 'cargas';
}

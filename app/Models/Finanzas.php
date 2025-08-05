<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finanzas extends Model
{
    protected $table = 'finanzas';

    protected $fillable = [
        'fecha',
        'descripcion',
        'concepto',
        'categoria',
        'monto',
        'cliente',
        'fecha_emision',
        'proveedor',
        'fecha_vencimiento',
        'monto_original',
        'beneficiario',
        'tipo_utilidad',
        'estado',
        'tipo'
    ];
}

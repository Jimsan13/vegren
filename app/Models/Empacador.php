<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empacador extends Model
{
    use HasFactory;

    protected $table = 'empacadores';

    protected $fillable = [
        'empleado',
        'cajas_semanal',
        'reempaques',
        'descargas',
        'descuentos',
        'total_pagar',
    ];
}
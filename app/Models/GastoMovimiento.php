<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoMovimiento extends Model
{
    use HasFactory;

    protected $table = 'gastos_movimientos';

    protected $fillable = [
        'fecha',
        'descripcion',
        'monto',
        'tipo',
        'categoria',
    ];
}
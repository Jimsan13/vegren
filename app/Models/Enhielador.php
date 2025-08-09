<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enhielador extends Model
{
    use HasFactory;

    protected $table = 'enhieladores';

    protected $fillable = [
        'empleado',
        'tarimas_trabajadas',
        'rengeladas',
        'actividades_adicionales',
        'descuentos',
        'total_pagar',
    ];
}
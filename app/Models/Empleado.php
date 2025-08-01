<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_completo',
        'puesto',
        'salario_base',
        'fecha_contratacion',
        'telefono',
        'email',
    ];
}
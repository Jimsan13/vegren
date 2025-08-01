<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $fillable = [
        'descripcion',
        'beneficiario',
        'monto',
        'fecha',
        'tipo',
        'estado',
        'cuenta',
        'numero_cheque',
        'origen'
    ];
}

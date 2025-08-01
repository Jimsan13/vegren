<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroGasto extends Model
{
    use HasFactory;
    protected $fillable = ['fecha', 'categoria', 'descripcion', 'monto'];
    protected $dates = ['fecha'];

}

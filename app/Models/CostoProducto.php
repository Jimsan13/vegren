<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostoProducto extends Model
{
    use HasFactory;
    protected $table = 'costos_productos';

    protected $fillable = ['fecha', 'concepto', 'monto'];
    protected $dates = ['fecha'];


}

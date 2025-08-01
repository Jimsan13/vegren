<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diferencia extends Model
{
    protected $fillable = ['motivo', 'socio_id', 'monto', 'tipo'];

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }
}
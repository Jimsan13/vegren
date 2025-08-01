<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $fillable = ['nombre', 'aportacion'];

    public function diferencias()
    {
        return $this->hasMany(Diferencia::class);
    }
}

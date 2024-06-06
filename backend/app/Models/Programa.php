<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'programas';

    protected $fillable = [
        'nombre'
    ];

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class);
    }

    public function horariosSalas()
    {
        return $this->hasMany(HorarioSala::class);
    }
}

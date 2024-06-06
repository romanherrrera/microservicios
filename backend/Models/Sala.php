<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';

    protected $fillable = [
        'nombre'
    ];

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'idSala');
    }

    public function horariosSalas()
    {
        return $this->hasMany(HorarioSala::class, 'idSala');
    }
}

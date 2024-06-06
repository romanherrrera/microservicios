<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsables';

    protected $fillable = [
        'nombre'
    ];

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'idResponsable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $table = 'responsables';

    protected $fillable = [
        'nombre'
    ];

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'idResponsable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $table = 'programas';

    protected $fillable = [
        'nombre'
    ];

    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'idPrograma');
    }

    
    public function horariosSalas()
    {
        return $this->hasMany(HorarioSala::class, 'idPrograma');
    }
}

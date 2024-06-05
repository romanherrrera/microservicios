<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';

    protected $fillable = [
        'nombre'
    ];

    // Getter para el atributo 'nombre'
    public function getNombreAttribute($value)
    {
        return strtoupper($value); // Convertir el nombre a mayúsculas antes de devolverlo
    }

    // Setter para el atributo 'nombre'
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtolower($value); // Convertir a minúsculas antes de asignar
    }

    // Relación con ingresos
    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'idSala');
    }

    // Relación con horarios de sala
    public function horariosSalas()
    {
        return $this->hasMany(HorarioSala::class, 'idSala');
    }
}

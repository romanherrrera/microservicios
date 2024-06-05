<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsables';

    protected $fillable = [
        'nombre'
    ];

    // Getter para el atributo 'nombre'
    public function getNombreAttribute($value)
    {
        return ucfirst($value); // Convertir la primera letra a mayúscula
    }

    // Setter para el atributo 'nombre'
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtolower($value); // Convertir a minúsculas antes de asignar
    }

    // Relación con ingresos
    public function ingresos()
    {
        return $this->hasMany(Ingreso::class, 'idResponsable');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioSala extends Model
{
    protected $table = 'horarios_salas';

    protected $fillable = [
        'dia',
        'materia',
        'horaInicio',
        'horaFin',
        'idPrograma',
        'idSala'
    ];

    // Getter y setter para el atributo 'materia'
    public function getMateriaAttribute($value)
    {
        return ucfirst($value); // Convertir la materia a mayúscula inicial antes de devolverla
    }

    public function setMateriaAttribute($value)
    {
        $this->attributes['materia'] = strtolower($value); // Convertir a minúsculas antes de asignar
    }

    // Relación con programa
    public function programa()
    {
        return $this->belongsTo(Programa::class, 'idPrograma');
    }

    // Relación con sala
    public function sala()
    {
        return $this->belongsTo(Sala::class, 'idSala');
    }
}

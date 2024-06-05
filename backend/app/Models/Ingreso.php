<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'ingresos';

    protected $fillable = [
        'codigoEstudiante',
        'nombreEstudiante',
        'idPrograma',
        'fechaIngreso',
        'horaIngreso',
        'horaSalida',
        'idResponsable',
        'idSala',
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }
}


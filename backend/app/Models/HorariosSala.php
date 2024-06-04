<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioSala extends Model
{
    use HasFactory;

    protected $table = 'horarios_salas';

    protected $fillable = [
        'dia',
        'materia',
        'horaInicio',
        'horaFin',
        'idPrograma',
        'idSala'
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'idPrograma');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'idSala');
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigoEstudiante', 'nombreEstudiante', 'idPrograma', 'fechaIngreso',
        'horaIngreso', 'horaSalida', 'idResponsable', 'idSala', 'created_at', 'updated_at'
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'idPrograma');
    }

    public function responsable()
    {
        return $this->belongsTo(Responsable::class, 'idResponsable');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'idSala');
    }
}

?>
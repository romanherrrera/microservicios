<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioSala extends Model
{
    // ...

    public function programa()
    {
        return $this->belongsTo(Programa::class, 'idPrograma');
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'idSala');
    }
}


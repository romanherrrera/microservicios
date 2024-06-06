<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Programa;
use App\Models\Responsable;
use App\Models\Sala;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'codigoEstudiante' => 'required|string|max:10',
            'nombreEstudiante' => 'required|string|max:250',
            'fechaIngreso' => 'required|date',
            'horaIngreso' => 'required|date_format:H:i',
            'idPrograma' => 'required|integer',
            'idSala' => 'required|integer',
            'idResponsable' => 'required|integer',
        ]);

        $ingreso = new Ingreso;
        $ingreso->codigoEstudiante = $request->codigoEstudiante;
        $ingreso->nombreEstudiante = $request->nombreEstudiante;
        $ingreso->fechaIngreso = $request->fechaIngreso;
        $ingreso->horaIngreso = $request->horaIngreso;
        $ingreso->idPrograma = $request->idPrograma;
        $ingreso->idSala = $request->idSala;
        $ingreso->idResponsable = $request->idResponsable;
        $ingreso->save();

        return response()->json(['success' => 'Ingreso registrado correctamente']);
    }
}


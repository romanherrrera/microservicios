<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\Programa;
use App\Models\Sala;
use App\Models\Responsable;

class IngresoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'codigoEstudiante' => 'required|string|max:10',
            'nombreEstudiante' => 'required|string|max:250',
            'fechaIngreso' => 'required|date',
            'horaIngreso' => 'required|date_format:H:i',
            'idPrograma' => 'required|integer|exists:programas,id',
            'idSala' => 'required|integer|exists:salas,id',
            'idResponsable' => 'required|integer|exists:responsables,id',
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

        return redirect('/')->with('success', 'Ingreso registrado correctamente');
    }

    public function getProgramas()
    {
        $programas = Programa::all();
        return response()->json($programas);
    }

    public function getSalas()
    {
        $salas = Sala::all();
        return response()->json($salas);
    }

    public function getResponsables()
    {
        $responsables = Responsable::all();
        return response()->json($responsables);
    }
}

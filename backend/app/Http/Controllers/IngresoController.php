<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
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

    $ingreso = Ingreso::create($request->all());

    return response()->json(['success' => 'Ingreso registrado correctamente']);
}
}

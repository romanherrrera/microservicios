<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;

class IngresoController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'codigoEstudiante' => 'required|string|max:10',
            'nombreEstudiante' => 'required|string|max:250',
            'fechaIngreso' => 'required|date',
            'horaIngreso' => 'required|date_format:H:i',
            'horaSalida' => 'nullable|date_format:H:i', // Permitir hora de salida nula
            'idPrograma' => 'required|integer',
            'idSala' => 'required|integer',
            'idResponsable' => 'required|integer',
        ]);

        // Crear un nuevo ingreso en la base de datos
        $ingreso = new Ingreso;
        $ingreso->codigoEstudiante = $request->codigoEstudiante;
        $ingreso->nombreEstudiante = $request->nombreEstudiante;
        $ingreso->fechaIngreso = $request->fechaIngreso;
        $ingreso->horaIngreso = $request->horaIngreso;
        $ingreso->horaSalida = $request->horaSalida; // Asignar hora de salida
        $ingreso->idPrograma = $request->idPrograma;
        $ingreso->idSala = $request->idSala;
        $ingreso->idResponsable = $request->idResponsable;
        $ingreso->save();

        // Redireccionar a alguna ruta después de guardar el ingreso
        return response()->json(['message' => 'Ingreso registrado correctamente'], 201);
    }
}

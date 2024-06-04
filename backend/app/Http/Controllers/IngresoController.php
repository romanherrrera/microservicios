<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function index()
    {
        $hoy = date('Y-m-d');
        return Ingreso::whereDate('fechaIngreso', $hoy)->get();
    }

    public function store(Request $request)
    {
        // Validación de horarios permitidos
        $horaIngreso = strtotime($request->horaIngreso);
        $horaPermitida = $this->validarHorarioPermitido($horaIngreso);

        if (!$horaPermitida) {
            return response()->json(['error' => 'Horario no permitido'], 400);
        }

        // Verificar disponibilidad de la sala
        $disponibilidad = $this->verificarDisponibilidadSala($request->idSala, $request->fechaIngreso, $request->horaIngreso);

        if (!$disponibilidad) {
            return response()->json(['error' => 'Sala no disponible'], 400);
        }

        $ingreso = Ingreso::create($request->all());
        return response()->json($ingreso, 201);
    }

    public function update(Request $request, $id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->update($request->only(['codigoEstudiante', 'nombreEstudiante']));
        return response()->json($ingreso);
    }

    public function showByDateRange(Request $request)
    {
        $fechaInicio = $request->fechaInicio;
        $fechaFin = $request->fechaFin;
        return Ingreso::whereBetween('fechaIngreso', [$fechaInicio, $fechaFin])->get();
    }

    private function validarHorarioPermitido($hora)
    {
        // Implementación de validación de horarios permitidos
        $dia = date('N', $hora); // 1 (para Lunes) hasta 7 (para Domingo)
        $horaInicio = strtotime("07:00");
        $horaFin = ($dia == 6) ? strtotime("16:30") : strtotime("20:50");

        return $hora >= $horaInicio && $hora <= $horaFin && $dia <= 6;
    }

    private function verificarDisponibilidadSala($idSala, $fecha, $hora)
    {
        // Implementar la lógica para verificar si la sala está disponible
        // basado en `horarios_salas`
        $dia = date('l', strtotime($fecha));
        $hora = date('H:i:s', strtotime($hora));

        $ocupada = DB::table('horarios_salas')
            ->where('idSala', $idSala)
            ->where('dia', $dia)
            ->where('horaInicio', '<=', $hora)
            ->where('horaFin', '>=', $hora)
            ->exists();

        return !$ocupada;
    }
}
?>
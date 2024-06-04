<?php
namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();
        return Ingreso::where('fechaIngreso', $today)->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigoEstudiante' => 'required|string|max:10',
            'nombreEstudiante' => 'required|string|max:250',
            'idPrograma' => 'required|integer',
            'fechaIngreso' => 'required|date',
            'horaIngreso' => 'required|date_format:H:i',
            'idResponsable' => 'required|integer',
            'idSala' => 'required|integer',
        ]);

        return Ingreso::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigoEstudiante' => 'sometimes|required|string|max:10',
            'nombreEstudiante' => 'sometimes|required|string|max:250',
        ]);

        $ingreso = Ingreso::findOrFail($id);
        $ingreso->update($request->all());

        return $ingreso;
    }

    public function getByDateRange(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        return Ingreso::whereBetween('fechaIngreso', [$request->start_date, $request->end_date])->get();
    }

    public function filter(Request $request)
    {
        $query = Ingreso::query();

        if ($request->has('codigoEstudiante')) {
            $query->where('codigoEstudiante', $request->codigoEstudiante);
        }

        if ($request->has('idPrograma')) {
            $query->where('idPrograma', $request->idPrograma);
        }

        if ($request->has('idResponsable')) {
            $query->where('idResponsable', $request->idResponsable);
        }

        return $query->get();
    }
}

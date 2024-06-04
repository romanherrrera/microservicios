<?php

namespace App\Http\Controllers;

use App\Models\HorarioSala;
use Illuminate\Http\Request;

class HorariosSalaController extends Controller
{
    
    public function index()
    {
        return HorarioSala::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required|string',
            'materia' => 'required|string|max:150',
            'horaInicio' => 'required|date_format:H:i',
            'horaFin' => 'required|date_format:H:i',
            'idPrograma' => 'required|integer',
            'idSala' => 'required|integer',
        ]);

        return HorarioSala::create($request->all());
    }

    public function show($id)
    {
        return HorarioSala::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dia' => 'sometimes|required|string',
            'materia' => 'sometimes|required|string|max:150',
            'horaInicio' => 'sometimes|required|date_format:H:i',
            'horaFin' => 'sometimes|required|date_format:H:i',
            'idPrograma' => 'sometimes|required|integer',
            'idSala' => 'sometimes|required|integer',
        ]);

        $horarioSala = HorarioSala::findOrFail($id);
        $horarioSala->update($request->all());

        return $horarioSala;
    }

    public function destroy($id)
    {
        $horarioSala = HorarioSala::findOrFail($id);
        $horarioSala->delete();

        return response()->noContent();
    }
}

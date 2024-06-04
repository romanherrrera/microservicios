<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\HorariosSalaController;

Route::middleware('api')->group(function () {
   
    Route::get('/ingresos', [IngresoController::class, 'index']);
    Route::post('/ingresos', [IngresoController::class, 'store']);
    Route::put('/ingresos/{id}', [IngresoController::class, 'update']);
    Route::get('/ingresos/range', [IngresoController::class, 'getByDateRange']);
    Route::get('/ingresos/filter', [IngresoController::class, 'filter']);

    Route::get('/horarios_salas', [HorariosSalaController::class, 'index']);
    Route::post('/horarios_salas', [HorariosSalaController::class, 'store']);
    Route::get('/horarios_salas/{id}', [HorariosSalaController::class, 'show']);
    Route::put('/horarios_salas/{id}', [HorariosSalaController::class, 'update']);
    Route::delete('/horarios_salas/{id}', [HorariosSalaController::class, 'destroy']);
});

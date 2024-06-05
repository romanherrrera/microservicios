<?php

use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ResponsableController;

Route::get('/programas', [ProgramaController::class, 'index']);
Route::get('/salas', [SalaController::class, 'index']);
Route::get('/responsables', [ResponsableController::class, 'index']);

Route::post('/ingresos', [IngresoController::class, 'store']); // Endpoint para registrar ingresos

Route::get('/ingresos', [IngresoController::class, 'index']); // Endpoint para cargar los ingresos del día actual

Route::get('/ingresos/rango', [IngresoController::class, 'porRango']); // Endpoint para consultar ingresos por rango de fechas

Route::get('/ingresos/filtrar', [IngresoController::class, 'filtrar']); // Endpoint para filtrar ingresos por código de estudiante, programa o persona que registra el ingreso

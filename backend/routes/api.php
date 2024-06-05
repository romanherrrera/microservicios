<?php

use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ResponsableController;

Route::get('/programas', [ProgramaController::class, 'index']);
Route::get('/salas', [SalaController::class, 'index']);
Route::get('/responsables', [ResponsableController::class, 'index']);

Route::post('/ingresos', [IngresoController::class, 'store']); 

Route::get('/ingresos', [IngresoController::class, 'index']); 

Route::get('/ingresos/rango', [IngresoController::class, 'porRango']); 

Route::get('/ingresos/filtrar', [IngresoController::class, 'filtrar']); 

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\IngresoController;

Route::get('/programas', [ProgramaController::class, 'index']);
Route::get('/salas', [SalaController::class, 'index']);
Route::get('/responsables', [ResponsableController::class, 'index']);
Route::post('/ingresos', [IngresoController::class, 'store']);
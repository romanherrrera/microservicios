<?php

use App\Http\Controllers\IngresoController;

Route::get('/', function () {
    return view('registro_ingresos');
});

Route::post('/ingresos', [IngresoController::class, 'store'])->name('ingresos.store');
Route::get('/programas', [IngresoController::class, 'getProgramas']);
Route::get('/salas', [IngresoController::class, 'getSalas']);
Route::get('/responsables', [IngresoController::class, 'getResponsables']);

<?php

use App\Http\Controllers\IngresoController;

Route::post('/ingresos', [IngresoController::class, 'store'])->name('ingresos.store');

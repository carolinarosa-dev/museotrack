<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportInventarioController;

Route::get('/export/inventario', [ExportInventarioController::class, 'export'])
    ->name('export.inventario');




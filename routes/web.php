<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportInventarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WelcomeController;


Route::get('/export/inventario', [ExportInventarioController::class, 'export'])
    ->name('export.inventario');

Route::get('/', function () {
    return view('welcome');
});





Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');



/*

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);*/


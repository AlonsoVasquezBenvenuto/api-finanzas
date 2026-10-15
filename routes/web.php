<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\PresupuestoItemController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ReportesController;



Route::get('/', function () {
    return view('welcome');
});


Route::resource('categorias', CategoriaController::class);
Route::resource('roles', RolController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('presupuestos', PresupuestoController::class);
Route::resource('movimientos', MovimientoController::class);
Route::get('auditorias', [AuditoriaController::class, 'index'])->name('auditorias.index');
Route::resource('presupuesto-items', PresupuestoItemController::class);
Route::get('historials', [HistorialController::class, 'index'])->name('historials.index');
Route::get('reportes', [ReportesController::class, 'index'])->name('reportes.index');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CuentaController;
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


Route::resource('categorias', CategoriaController::class)->except(['show']);
Route::resource('roles', RolController::class)  ->parameters(['roles' => 'rol']) ->except(['show']);
Route::resource('usuarios', UsuarioController::class)->except(['show']);
Route::resource('cuentas', CuentaController::class)->except(['show']);
Route::resource('presupuestos', PresupuestoController::class)->except(['show']);
Route::resource('movimientos', MovimientoController::class)->except(['show']);
Route::resource('presupuesto-items', PresupuestoItemController::class)->except(['show']);
Route::get('auditorias', [AuditoriaController::class, 'index'])->name('auditorias.index');
Route::get('historiales', [HistorialController::class, 'index'])->name('historials.index');
Route::get('reportes', [ReportesController::class, 'index'])->name('reportes.index');
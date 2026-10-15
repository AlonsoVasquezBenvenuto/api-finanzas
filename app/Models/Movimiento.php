<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use SoftDeletes;
    protected $table = 'movimientos';
    protected $primaryKey = 'id_movimiento';
    protected $fillable = [
        'id_usuario', 'id_cuenta', 'id_cuenta_destino', 'id_categoria', 
        'id_presupuesto', 'tipo', 'monto', 'tasa_cambio', 'fecha', 
        'descripcion', 'estado', 'visibilidad'
    ];
}
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presupuesto extends Model
{
    use SoftDeletes;
    protected $table = 'presupuestos';
    protected $primaryKey = 'id_presupuesto';
    protected $fillable = [
        'id_usuario', 'nombre', 'descripcion', 'monto_total', 
        'fecha_inicio', 'fecha_fin', 'estado', 'visibilidad'
    ];
}
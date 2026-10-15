<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PresupuestoItem extends Model
{
    protected $table = 'presupuesto_items';
    protected $primaryKey = 'id_presupuesto_item';
    protected $fillable = ['id_presupuesto', 'id_categoria', 'monto_asignado', 'monto_ejecutado'];
}
<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historials';
    protected $primaryKey = 'id_historial_estado';
    protected $fillable = ['id_usuario', 'entidad_tipo', 'entidad_id', 'estado_anterior', 'estado_nuevo', 'motivo'];
    public $timestamps = false;
}
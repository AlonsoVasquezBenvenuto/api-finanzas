<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'reportes';
    protected $primaryKey = 'id_reporte_guardado';
    protected $fillable = ['id_usuario', 'nombre', 'tipo', 'parametros', 'visibilidad'];
    public $timestamps = false;
}
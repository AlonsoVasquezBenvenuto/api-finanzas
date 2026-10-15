<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    // Nombre de la tabla
    protected $table = 'categorias';

    // Llave primaria personalizada
    protected $primaryKey = 'id_categoria';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'id_usuario',
        'id_categoria_padre',
        'nombre',
        'tipo',
        'visibilidad'
    ];
}
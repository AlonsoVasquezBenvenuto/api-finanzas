<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['rol_id', 'nombre', 'email', 'password', 'estado'];
    protected $hidden = ['password'];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'rol_id');
    }
}
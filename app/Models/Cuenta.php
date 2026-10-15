<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuenta extends Model
{
    use SoftDeletes;
    protected $table = 'cuentas';
    protected $primaryKey = 'id_cuenta';
    protected $fillable = [
        'id_usuario', 'nombre', 'tipo', 'moneda', 
        'saldo_inicial', 'saldo_actual', 'visibilidad', 'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
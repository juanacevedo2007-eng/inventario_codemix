<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Notificacion extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'notificaciones';
    protected $primaryKey = 'id_notificacion';
    protected $fillable = [
        'id_usuario',
        'id_producto',
        'titulo',
        'mensaje',
        'leido',
        'fecha',
        'tipo_alerta'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }   
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}

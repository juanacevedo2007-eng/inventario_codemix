<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class RecuperacionContrasena extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'recuperacion_contraseña';
    protected $primaryKey = 'id_recuperacion_contraseña';
    protected $fillable = [
        'id_usuario',
        'codigo',
        'fecha_expiracion',
        'usado'
    ];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}

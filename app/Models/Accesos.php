<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Accesos extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'accesos';
    protected $primaryKey = 'id_acceso';
    protected $fillable = [
        'id_usuario',
        'dispositivo',
        'navegador',
        'ubicacion',
        'fecha_ingreso',
        'fecha_salida',
        'estado'
    ];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}

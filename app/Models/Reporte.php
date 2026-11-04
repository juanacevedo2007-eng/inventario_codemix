<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Reporte extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'reportes';
    protected $primaryKey = 'id_reporte';
    protected $fillable = [
        'tipo_reporte',
        'formato',
        'fecha_generacion',
        'fecha_descarga',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;


class Configuracion extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'configuraciones';
    protected $primaryKey = 'id_configuracion';
    protected $fillable = [
        'nombre_empresa',
        'nit',
        'direccion',
        'telefono',
        'email',
        'pagina_web',
        'moneda',
        'zona_horaria',
        'formato_fecha',
        'formato_hora',
        'intentos_maximos',
        'tiempo_inactividad',
        'productos_vencer',
        'productos_agotados',
        'bajo_stock',
        'movimientos_stock',
        'ventas_dia',
        'respaldo',
        'version_sistema',
        'licencia'
    ];
}

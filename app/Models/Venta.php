<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory,softDeletes;
    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';
    protected $fillable = [
        'numero_factura',
        'fecha',
        'descuento',
        'iva',
        'total',
        'estado',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    public function detalleVenta()
    {
        return $this->hasMany(DetalleVenta::class, 'id_detalle_venta');
    }
    public function movimientoStock()
    {
        return $this->hasMany(MovimientoStock::class, 'id_movimiento_stock');
    }

}

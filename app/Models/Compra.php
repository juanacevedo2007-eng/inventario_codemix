<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    protected $fillable = [
        'fecha',
        'total',
        'estado',
        'id_usuario',
        'id_proveedor'
    ];
    public function proveedor()
        {
            return $this->belongsTo(Proveedor::class, 'id_proveedor');
        }
    public function usuario()
        {
            return $this->belongsTo(Usuario::class, 'id_usuario');
        }
    public function detalleCompra()
        {
            return $this->hasMany(DetalleCompra::class, 'id_detalle_compra');
        }
    public function movimientoStock()
        {
            return $this->hasMany(MovimientoStock::class, 'id_movimiento_stock');
        }
    

}

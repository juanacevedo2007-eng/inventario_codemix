<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class MovimientoStock extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'movimientos_stock';
    protected $primaryKey = 'id_movimiento_stock';
    protected $fillable = [
        'id_producto',
        'id_usuario',
        'id_proveedor',
        'id_compra',
        'id_venta',
        'tipo_movimiento',
        'cantidad',
        'stock_antes',
        'stock_despues',
        'motivo',
        'fecha'
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra');
    }
    public function venta(){
        return $this->belongsTo(Venta::class, 'id_venta');
    }

   
}

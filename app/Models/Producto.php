<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Producto extends Model
{
    use HasFactory, softDeletes;
    protected $table = "productos";
    protected $primaryKey = 'id_producto';
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'marca',
        'precio_compra',
        'precio_venta',
        'stock_actual',
        'stock_minimo',
        'fecha_vencimiento',
        'categoria_id',
        'proveedor_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function alerta()
    {
        return $this->hasMany(Alerta::class, 'id_alerta');
    }

    public function detalleCompra()
    {
        return $this->hasMany(DetalleCompra::class, 'id_detalle_compra');
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

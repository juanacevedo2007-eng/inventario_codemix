<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Proveedor extends Model
{
    use HasFactory, softDeletes;
    protected $table = "proveedores";
    protected $primaryKey = 'id_proveedor';
    protected $fillable = [
        'nombre_proveedor',
        'contacto',
        'telefono',
        'correo',
        'direccion',
        'estado'
    ];
    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_proveedor');
    }
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_proveedor');
    }
    public function movimientoStock()
    {
        return $this->hasMany(MovimientoStock::class, 'id_proveedor');
    }
}

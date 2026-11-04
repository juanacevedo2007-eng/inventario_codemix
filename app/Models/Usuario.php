<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
  use HasFactory, softDeletes;
  protected $table = 'usuarios';
  protected $primaryKey = 'id_usuario';
  protected $fillable = [
    'nombre',
    'email',
    'password',
    'estado',
    'id_rol'
  ];

  public function rol()
  {
    return $this->belongsTo(Rol::class, 'id_rol');
  }
  public function usuario()
  {
    return $this->hasMany(Usuario::class, 'id_usuario');
  }  
  public function compra ()
  {
    return $this->hasMany(Compra::class, 'id_compra');
  }
  public function venta ()
  {
    return $this->hasMany(Venta::class, 'id_venta');
  }
  public function movimientoStock ()
  {
    return $this->hasMany(MovimientoStock::class, 'id_movimiento_stock');
  }
  public function notificacion ()
  {
    return $this->hasMany(Notificacion::class, 'id_notificacion');
  }
  public function recuperacionContraseña ()
  {    
  return $this->hasMany(RecuperacionContraseña::class, 'id_recuperacion_contraseña');
  }
  public function reporte ()
  {
    return $this->hasMany(Reporte::class, 'id_reporte');
  }
}

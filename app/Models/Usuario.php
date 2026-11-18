<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable implements JWTSubject
{
  use HasFactory, softDeletes;
  protected $table = 'usuarios';
  protected $primaryKey = 'id_usuario';
  protected $fillable = [
    'nombre',
    'email',
    'password',
    'estado',
    'intentos',
    'id_rol'
    
  ];

  protected $hidden = [
    'password',
    'remember_token'
  ];

  protected function cats(): array{
      return[
        'password' => 'hashed'
      ];
  }
  public function getRolName(): ?String
  {
    return $this->rol?->nombre_rol;
  }
  public function getJWTIdentifier(): mixed
  {
    return $this->getkey();
  }

  public function getJWTCustomClaims(): array
  {
    return[
      'rol' => $this->getRolName()
    ];
  }

  public function getPermissions(): array{
    return $this->rol?->permissions() ??[];
  }
  
  public function hasPermission(string $permission): bool
  {
    return in_array($permission, $this->getPermissions(), true);
  }

  public function hasRol(string $rol): bool
  {
    return $this->getRolName() === $rol;
  }
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
    return $this->hasMany(Compra::class, 'id_usuario');
  }
  public function venta ()
  {
    return $this->hasMany(Venta::class, 'id_usuario');
  }
  public function movimientoStock ()
  {
    return $this->hasMany(MovimientoStock::class, 'id_usuario');
  }
  public function notificacion ()
  {
    return $this->hasMany(Notificacion::class, 'id_usuario');
  }
  public function recuperacionContraseña ()
  {    
  return $this->hasMany(RecuperacionContraseña::class, 'id_usuario');
  }
  public function reporte ()
  {
    return $this->hasMany(Reporte::class, 'id_usuario');
  }
}

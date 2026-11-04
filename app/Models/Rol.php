<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Rol extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    protected $fillable = [
        'nombre_rol',
        'descripcion'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }
}

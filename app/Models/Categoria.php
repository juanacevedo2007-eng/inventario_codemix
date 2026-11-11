<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    protected $fillable = [
        'nombre_categoria',
        'descripcion',
        'estado'
    ];

    public function producto()
    {
        return $this->hasMany(Categoria::class, 'id_categoria');
    }
    
}

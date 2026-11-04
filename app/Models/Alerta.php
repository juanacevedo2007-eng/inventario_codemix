<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;


class Alerta extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'alertas';
    protected $primaryKey = 'id_alerta';
    protected $fillable = [
        'id_producto',
        'tipo_alerta',
        'mensaje',
        'fecha',
        'estado'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}

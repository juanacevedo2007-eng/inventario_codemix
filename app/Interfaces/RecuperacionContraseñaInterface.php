<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface RecuperacionContraseñaInterface extends BaseInterface
{
    public function findById(int $id_recuperacion_contraseña);

    public function findByUsuarioId(int $id_usuario);

    public function findByCodigo(string $codigo);

    public function findByDateTime(Carbon $fechaExpiracion);
    
    public function findByUsado(bool $usado);
}

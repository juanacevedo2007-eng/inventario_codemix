<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface RecuperacionContrasenaInterface extends BaseInterface
{
    public function findById(int $id_recuperacion_contraseña);

    public function findByUsuario(int $id_usuario);

    public function findByCodigo(string $codigo);

    public function findByFechaExpiracion(Carbon $fechaExpiracion);
    
    public function findByUsado(bool $usado);
}

<?php

namespace App\Interfaces;

interface RolInterface extends BaseInterface
{
    public function findById(int $id_rol);

    public function findByNombreRol(string $nombreRol);
    
    public function findByDescripcionRol(string $descripcion);
}

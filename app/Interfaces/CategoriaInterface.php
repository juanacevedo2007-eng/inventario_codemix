<?php

namespace App\Interfaces;

interface CategoriaInterface extends BaseInterface
{
    public function findById(int $id_categoria);

    public function findByNombreCategoria(string $nombreCategoria);

    public function findByDescripcion(string $descripcion);
    
    public function findByEstado(string $estado);
}

<?php

namespace App\Repositories;

use App\Models\Rol;
use App\Interfaces\RolInterface;

class  RolRepository extends BaseRepository implements RolInterface 
{  
    public function __construct(Rol $rol)
    {
        parent::__construct($rol);
    }
    public function findById(int $id_rol)
    {
      return $this->model->find($id_rol);
    }

    public function findByNombreRol(string $nombreRol)
    { 
      return $this->model->where('nombre_rol', $nombreRol)->get();
    }
    
    public function findByDescripcionRol(string $descripcion)
    {
      return $this->model->where('descripcion', $descripcion)->get();
    }

}

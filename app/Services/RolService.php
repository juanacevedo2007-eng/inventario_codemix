<?php

namespace App\Services;

use App\Interfaces\RolInterface;
use Illuminate\Validation\ValidationException;

class RolService
{
    protected RolInterface $rolRepository;

    public function __construct(RolInterface $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }

    public function getAll()
    {
        return $this->rolRepository->getAll();
    }

    public function getById(int $id)
    {
        $rol = $this->rolRepository->findById($id);

        if (!$rol) {
            throw ValidationException::withMessages([
                'rol' => 'El rol no existe.'
            ]);
        }

        return $rol;
    }

    public function create(array $data)
    {

        return $this->rolRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        
        return $this->rolRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->rolRepository->delete($id);
    }

    public function findByNombreRol(string $nombreRol)
    {
        return $this->rolRepository->findByNombreRol($nombreRol);
    }

    public function findByDescripcionRol(string $descripcion)
    {
        return $this->rolRepository->findByDescripcionRol($descripcion);
    }

}


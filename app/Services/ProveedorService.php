<?php

namespace App\Services;

use App\Interfaces\ProveedorInterface;
use Illuminate\Validation\ValidationException;

class ProveedorService
{
    protected ProveedorInterface $proveedorRepository;

    public function __construct(ProveedorInterface $proveedorRepository)
    {
        $this->proveedorRepository = $proveedorRepository;
    }

    public function getAll()
    {
        return $this->proveedorRepository->getAll();
    }

    public function getById(int $id)
    {
        $proveedor = $this->proveedorRepository->findById($id);

        if (!$proveedor) {
            throw ValidationException::withMessages([
                'proveedor' => 'El proveedor no existe.'
            ]);
        }

        return $proveedor;
    }

    public function create(array $data)
    {
        $this->validarDatosProveedor($data);

        return $this->proveedorRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosProveedor($data);

        return $this->proveedorRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->proveedorRepository->delete($id);
    }

    public function findByNombre(string $nombreProveedor)
    {
        return $this->proveedorRepository->findByNombre($nombreProveedor);
    }

    public function findByContacto(string $contacto)
    {
        return $this->proveedorRepository->findByContacto($contacto);
    }

    public function findByCorreo(string $correo)
    {
        return $this->proveedorRepository->findByCorreo($correo);
    }

    public function findByTelefono(string $telefono)
    {
        return $this->proveedorRepository->findByTelefono($telefono);
    }

    public function findByDireccion(string $direccion)
    {
        return $this->proveedorRepository->findByDireccion($direccion);
    }

    public function findByEstado(string $estado)
    {
        return $this->proveedorRepository->findByEstado($estado);
    }

}


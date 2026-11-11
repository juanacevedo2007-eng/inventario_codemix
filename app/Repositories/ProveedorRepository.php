<?php

namespace App\Repositories;
use App\Models\Proveedor;
use App\Interfaces\ProveedorInterface;

class ProveedorRepository extends BaseRepository implements ProveedorInterface
{
    public function __construct(Proveedor $proveedor)
    {
        parent::__construct($proveedor);
    }

    public function findById(int $id_proveedor)
    {
        return $this->model->find($id_proveedor);
    }
    public function findByNombre(string $nombreProveedor)
    {
        return $this->model->where('nombre_proveedor', $nombreProveedor)->orderBy('nombre_proveedor','asc')->get();
    }
    public function findByContacto(string $contacto)
    {
        return $this->model->where('contacto', $contacto)->get();
    }
    public function findByCorreo(string $correo)
    {
        return $this->model->where('correo', $correo)->get();
    }
    public function findByTelefono(string $telefono)
    {
        return $this->model->where('telefono', $telefono)->get();
    }
    public function findByDireccion(string $direccion)
    {
        return $this->model->where('direccion', $direccion)->get();
    }
    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }


}
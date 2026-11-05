<?php

namespace App\Interfaces;

interface ProveedorInterface extends BaseInterface
{
    public function findById(int $id_proveedor);
    public function findByNombre(string $nombreProveedor);
    public function findByContacto(string $contacto);
    public function findByCorreo(string $correo);
    public function findByTelefono(string $telefono);
    public function findByDireccion(string $direccion);
    public function findByEstado(string $estado);

}

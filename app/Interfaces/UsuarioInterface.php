<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface
{
    Public function findById(int $id_usuario);

    Public function findByNombre(string $nombre);

    Public function findByCorreo(string $correo);

    public function findByPassword(string $password);

    public function findByEstado(string $estado);
    
    public function findByIntentos(int $intentos);
    
    public function findByRol(int $id_rol);
}

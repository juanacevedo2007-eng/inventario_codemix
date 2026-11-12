<?php

namespace App\Services;

use App\Interfaces\UsuarioInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsuarioService
{
    protected UsuarioInterface $usuarioRepository;

    public function __construct(UsuarioInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function getAll()
    {
        return $this->usuarioRepository->getAll();
    }

    public function getById(int $id)
    {
        $usuario = $this->usuarioRepository->findById($id);

        if (!$usuario) {
            throw ValidationException::withMessages([
                'usuario' => 'El usuario no existe.'
            ]);
        }

        return $usuario;
    }

    public function create(array $data)
    {
        $this->validarDatosUsuario($data);
        $this->validarEmailUnico($data['email']);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->usuarioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosUsuario($data);

        if (isset($data['email'])) {
            $this->validarEmailUnico($data['email'], $id);
        }

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->usuarioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->usuarioRepository->delete($id);
    }

    public function findByNombre(string $nombre)
    {
        return $this->usuarioRepository->findByNombre($nombre);
    }

    public function findByEmail(string $correo)
    {
        return $this->usuarioRepository->findByEmail($correo);
    }

    public function findByEstado(string $estado)
    {
        return $this->usuarioRepository->findByEstado($estado);
    }

    public function findByIntentos(int $intentos)
    {
        return $this->usuarioRepository->findByIntentos($intentos);
    }

    public function findByRol(int $id_rol)
    {
        return $this->usuarioRepository->findByRol($id_rol);
    }

}

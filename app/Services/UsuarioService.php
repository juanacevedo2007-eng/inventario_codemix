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

    private function validarDatosUsuario(array $data): void
    {
        if (isset($data['nombre']) && trim($data['nombre']) === '') {
            throw ValidationException::withMessages([
                'nombre' => 'El nombre no puede estar vacio.'
            ]);
        }

        if (isset($data['email']) &&
            !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

            throw ValidationException::withMessages([
                'email' => 'El correo electronico no es valido.'
            ]);
        }

        if (isset($data['password']) && strlen($data['password']) < 8) {
            throw ValidationException::withMessages([
                'password' => 'La contraseña debe tener minimo 8 caracteres.'
            ]);
        }

        if (isset($data['estado']) &&
            !in_array($data['estado'], ['Activo', 'Inactivo'], true)) {

            throw ValidationException::withMessages([
                'estado' => 'El estado no es valido.'
            ]);
        }

        if (isset($data['intentos']) &&
            (!filter_var($data['intentos'], FILTER_VALIDATE_INT) ||
            $data['intentos'] < 0)) {

            throw ValidationException::withMessages([
                'intentos' => 'Los intentos deben ser un entero positivo.'
            ]);
        }
    }

    private function validarEmailUnico(
        string $correo,
        ?int $idExcluir = null
    ): void {
        $usuarios = $this->usuarioRepository->findByEmail($correo);

        foreach ($usuarios as $usuario) {
            if ($usuario->id_usuario != $idExcluir) {
                throw ValidationException::withMessages([
                    'email' => 'Este correo ya esta registrado.'
                ]);
            }
        }
    }
}

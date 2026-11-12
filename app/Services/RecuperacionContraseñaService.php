<?php

namespace App\Services;

use App\Interfaces\RecuperacionContrasenaInterface;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class RecuperacionContraseñaService
{
    protected RecuperacionContrasenaInterface $recuperacionRepository;

    public function __construct(
        RecuperacionContrasenaInterface $recuperacionRepository
    ) {
        $this->recuperacionRepository = $recuperacionRepository;
    }

    public function getAll()
    {
        return $this->recuperacionRepository->getAll();
    }

    public function getById(int $id)
    {
        $recuperacion = $this->recuperacionRepository->findById($id);

        if (!$recuperacion) {
            throw ValidationException::withMessages([
                'recuperacion' => 'El registro no existe.'
            ]);
        }

        return $recuperacion;
    }

    public function create(array $data)
    {
        $this->validarDatosRecuperacion($data);

        return $this->recuperacionRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosRecuperacion($data);

        return $this->recuperacionRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->recuperacionRepository->delete($id);
    }

    public function findByUsuario(int $id_usuario)
    {
        return $this->recuperacionRepository->findByUsuario($id_usuario);
    }

    public function findByCodigo(string $codigo)
    {
        return $this->recuperacionRepository->findByCodigo($codigo);
    }

    public function findByFechaExpiracion(Carbon $fechaExpiracion)
    {
        return $this->recuperacionRepository->findByFechaExpiracion(
            $fechaExpiracion
        );
    }

    public function findByUsado(bool $usado)
    {
        return $this->recuperacionRepository->findByUsado($usado);
    }

}

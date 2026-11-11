<?php

namespace App\Services;

use App\Interfaces\RecuperacionContraseñaInterface;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class RecuperacionContraseñaService
{
    protected RecuperacionContraseñaInterface $recuperacionRepository;

    public function __construct(
        RecuperacionContraseñaInterface $recuperacionRepository
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

    private function validarDatosRecuperacion(array $data): void
    {
        if (isset($data['codigo']) && trim($data['codigo']) === '') {
            throw ValidationException::withMessages([
                'codigo' => 'El codigo no puede estar vacio.'
            ]);
        }

        if (isset($data['fecha_expiracion'])) {
            try {
                Carbon::parse($data['fecha_expiracion']);
            } catch (\Exception $e) {
                throw ValidationException::withMessages([
                    'fecha_expiracion' => 'La fecha de expiracion no es valida.'
                ]);
            }
        }

        if (isset($data['usado']) && !is_bool($data['usado'])) {
            throw ValidationException::withMessages([
                'usado' => 'El campo usado debe ser verdadero o falso.'
            ]);
        }
    }
}

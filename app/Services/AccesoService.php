<?php

namespace App\Services;

use App\Interfaces\AccesoInterface;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class AccesoService
{
    protected AccesoInterface $accesoRepository;

    public function __construct(AccesoInterface $accesoRepository)
    {
        $this->accesoRepository = $accesoRepository;
    }

    public function getAll()
    {
        return $this->accesoRepository->getAll();
    }

    public function getById(int $id)
    {
        $acceso = $this->accesoRepository->findById($id);

        if (!$acceso) {
            throw ValidationException::withMessages([
                'acceso' => 'El acceso no existe.'
            ]);
        }

        return $acceso;
    }

    public function create(array $data)
    {
        $this->validarDatosAcceso($data);

        return $this->accesoRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosAcceso($data);

        return $this->accesoRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->accesoRepository->delete($id);
    }

    public function findByUsuario(int $id_usuario)
    {
        return $this->accesoRepository->findByUsuario($id_usuario);
    }

    public function findByDispositivo(string $dispositivo)
    {
        return $this->accesoRepository->findByDispositivo($dispositivo);
    }

    public function findByNavegador(string $navegador)
    {
        return $this->accesoRepository->findByNavegador($navegador);
    }

    public function findByUbicacion(string $ubicacion)
    {
        return $this->accesoRepository->findByUbicacion($ubicacion);
    }

    public function findByFecha(Carbon $fechaIngreso, Carbon $fechaSalida)
    {
        if ($fechaIngreso->gt($fechaSalida)) {
            throw ValidationException::withMessages([
                'fecha' => 'La fecha inicial no puede ser mayor que la fecha final.'
            ]);
        }

        return $this->accesoRepository->findByFecha(
            $fechaIngreso,
            $fechaSalida
        );
    }

    public function findByEstado(string $estado)
    {
        return $this->accesoRepository->findByEstado($estado);
    }

    private function validarDatosAcceso(array $data): void
    {
        if (isset($data['estado']) &&
            !in_array($data['estado'], ['Activo', 'Inactivo'], true)) {

            throw ValidationException::withMessages([
                'estado' => 'El estado no es valido.'
            ]);
        }
    }
}

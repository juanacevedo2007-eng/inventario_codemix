<?php

namespace App\Services;

use App\Interfaces\NotificacionInterface;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class NotificacionService
{
    protected NotificacionInterface $notificacionRepository;

    public function __construct(NotificacionInterface $notificacionRepository)
    {
        $this->notificacionRepository = $notificacionRepository;
    }

    public function getAll()
    {
        return $this->notificacionRepository->getAll();
    }

    public function getById(int $id)
    {
        $notificacion = $this->notificacionRepository->findById($id);

        if (!$notificacion) {
            throw ValidationException::withMessages([
                'notificacion' => 'La notificacion no existe.'
            ]);
        }

        return $notificacion;
    }

    public function create(array $data)
    {
        $this->validarDatosNotificacion($data);

        return $this->notificacionRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosNotificacion($data);

        return $this->notificacionRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->notificacionRepository->delete($id);
    }

    public function findByIdUsuario(int $id_usuario)
    {
        return $this->notificacionRepository->findByIdUsuario($id_usuario);
    }

    public function findByTitulo(string $titulo)
    {
        return $this->notificacionRepository->findByTitulo($titulo);
    }

    public function findByMensaje(string $mensaje)
    {
        return $this->notificacionRepository->findByMensaje($mensaje);
    }

    public function findByLeido(bool $leido)
    {
        return $this->notificacionRepository->findByLeido($leido);
    }

    public function findByIdProducto(int $id_producto)
    {
        return $this->notificacionRepository->findByIdProducto($id_producto);
    }

    public function findByFecha(Carbon $fecha)
    {
        return $this->notificacionRepository->findByFecha($fecha);
    }

    public function findByTipoAlerta(string $tipo_alerta)
    {
        return $this->notificacionRepository->findByTipoAlerta($tipo_alerta);
    }

}

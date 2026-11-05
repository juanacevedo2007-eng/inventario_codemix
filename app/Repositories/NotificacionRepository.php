<?php

namespace App\Repositories;
use App\Interfaces\NotificacionInterface;
use App\Models\Notificacion;

class NotificacionRepository extends BaseRepository implements NotificacionInterface
{
    public function __construct(Notificacion $notificacion)
    {
        parent::__construct($notificacion);
    }

    public function findById(int $id_notificacion)
    {
        return $this->model->find($id_notificacion);
    }

    public function findByIdUsuario(int $id_usuario)
    {
        return $this->model->where('id_usuario', $id_usuario)->get();
    }

    public function findByTitulo(string $titulo)
    {
        return $this->model->where('titulo', 'LIKE', '%' . $titulo . '%')->get();
    }

    public function findByMensaje(string $mensaje)
    {
        return $this->model->where('mensaje', 'LIKE', '%' . $mensaje . '%')->get();
    }

    public function findByLeido(bool $leido)
    {
        return $this->model->where('leido', $leido)->get();
    }
}

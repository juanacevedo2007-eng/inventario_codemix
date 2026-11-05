<?php

namespace App\Interfaces;

interface NotificacionInterface extends BaseInterface
{
    public function findById(int $id_notificacion);

    public function findByIdUsuario(int $id_usuario);

    public function findByTitulo(string $titulo);

    public function findByMensaje(string $mensaje);

    public function findByLeido(bool $leido);
}

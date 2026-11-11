<?php

namespace App\Interfaces;
use Carbon\Carbon;
interface NotificacionInterface extends BaseInterface


{
    public function findById(int $id_notificacion);

    public function findByIdUsuario(int $id_usuario);
    
    public function findByIdProducto(int $id_producto);

    public function findByTipoAlerta(String $tipo_alerta);

    public function findByTitulo(string $titulo);

    public function findByMensaje(string $mensaje);

    public function findByFecha(Carbon $fecha);

    public function findByLeido(bool $leido);
}

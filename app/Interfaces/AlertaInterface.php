<?php

namespace App\Interfaces;

interface AlertaInterface extends BaseInterface
{
    public function findById(int $id_alerta);

    public function findByProducto(int $id_producto);

    public function findByTipoAlerta(string $tipoAlerta);

    public function findByMensaje(string $mensaje);
    
    public function findByEstado(string $estado);
}

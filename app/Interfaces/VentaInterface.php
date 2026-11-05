<?php

namespace App\Interfaces;

interface VentaInterface extends BaseInterface
{
    public function findById(int $id_venta);

    public function findByNombreFactura(string $nombreFactura);

    public function findByDescuento(float $descuento);

    public function findByIva(float $iva);

    public function findByTotal(float $total);

    public function findByEstado(string $estado);

    public function findByIdUsuario(int $id_usuario);

}

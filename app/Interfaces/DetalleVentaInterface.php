<?php

namespace App\Interfaces;

interface DetalleVentaInterface extends BaseInterface
{
    public function findById(int $id_detalle_venta);

    public function findByVenta(int $id_venta);

    public function findByProducto(int $id_producto);

    public function findByCantidad(int $cantidad);

    public function findByPrecioUnitario(float $precioUnitario);

    public function findBySubtotal(float $subtotal);

}

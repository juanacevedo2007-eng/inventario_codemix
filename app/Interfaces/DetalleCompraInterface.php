<?php

namespace App\Interfaces;

interface DetalleCompraInterface extends BaseInterface
{
    public function findById(int $id_detalle_compra);

    public function findByCompra(int $id_compra);

    public function findByProducto(int $id_producto);

    public function findByCantidad(int $cantidad);

    public function findByPrecioCompra(float $precioCompra);
    
    public function findBySubtotal(float $subtotal);
}

<?php

namespace App\Interfaces;

interface MovimientoStockInterface extends BaseInterface
{
    public function findById(int $id_movimiento_stock);

    public function findByProducto(int $id_producto);

    public function findByUsuario(int $id_usuario);

    public function findByProveedor(int $id_proveedor);

    public function findByCompra(int $id_compra);

    public function findByVenta(int $id_venta);

    public function findByTipoMovimiento(string $tipoMovimiento);

    public function findByCantidad(int $cantidad);

    public function findByStockAntes(int $stockAntes);

    public function findByStockDespues(int $stockDespues);
    
    public function findByMotivo(string $motivo);
}

<?php

namespace App\Repositories;
use App\models\MovimientoStock;
use App\Interfaces\MovimientoStockInterface;

class MovimientoStockRepository extends BaseRepository implements MovimientoStockInterface
{
    public function __construct(MovimientoStock $movimientoStock)
    {
        parent::__construct($movimientoStock);
    }
    public function findById(int $id_movimiento_stock)
    {
        return $this->model->find($id_movimiento_stock);
    }

    public function findByProducto(int $id_producto)
    {
        return $this->model->where('id_producto', $id_producto)->get();
    }

    public function findByUsuario(int $id_usuario)
    {
        return $this->model->where('id_usuario', $id_usuario)->get();
    }

    public function findByProveedor(int $id_proveedor)
    {
        return $this->model->where('id_proveedor', $id_proveedor)->get();
    }

    public function findByCompra(int $id_compra)
    {
        return $this->model->where('id_compra', $id_compra)->get();
    }

    public function findByVenta(int $id_venta)
    {
        return $this->model->where('id_venta', $id_venta)->get();
    }

    public function findByTipoMovimiento(string $tipoMovimiento)
    {
        return $this->model->where('tipo_movimiento', $tipoMovimiento)->get();
    }

    public function findByCantidad(int $cantidad)
    {
        return $this->model->where('cantidad', $cantidad)->get();
    }

    public function findByStockAntes(int $stockAntes)
    {
        return $this->model->where('stock_antes', $stockAntes)->get();
    }

    public function findByStockDespues(int $stockDespues)
    {
        return $this->model->where('stock_despues', $stockDespues)->get();
    }

    public function findByMotivo(string $motivo)
    {
        return $this->model->where('motivo', $motivo)->get();
    }
}
?>
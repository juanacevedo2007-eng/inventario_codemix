<?php

namespace App\Repositories;
use App\Interfaces\DetalleVentaInterface;
use App\Models\DetalleVenta;

class DetalleVentaRepository extends BaseRepository implements DetalleVentaInterface
{
    public function __construct(DetalleVenta $detalleventa)
    {
        parent::__construct($detalleventa);
    }

    public function findById(int $id_detalle_venta)
    {
        return $this->model->find($id_detalle_venta);
    }

    public function findByVenta(int $id_venta)
    {
        return $this->model->where('id_venta', $id_venta)->get();
    }

    public function findByProducto(int $id_producto)
    {
        return $this->model->where('id_producto', $id_producto)->get();
    }

    public function findByCantidad(int $cantidad)
    {
        return $this->model->where('cantidad', $cantidad)->get();
    }

    public function findByPrecioUnitario(float $precioUnitario)
    {
        return $this->model->where('precio_unitario', $precioUnitario)->get();
    }

    public function findBySubtotal(float $subtotal)
    {
        return $this->model->where('subtotal', $subtotal)->get();
    }
}
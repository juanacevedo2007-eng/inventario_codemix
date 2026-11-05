<?php
namespace App\Repositories;
use App\Models\DetalleCompra;
use App\Interfaces\DetalleCompraInterface;

class DetalleCompraRepository extends BaseRepository implements DetalleCompraInterface
{
    public function __construct(DetalleCompra $detalleCompra)
    {
        parent::__construct($detalleCompra);
    }
    public function findById(int $id_detalle_compra)
    {
        return $this->model->find($id_detalle_compra);
    }

    public function findByCompra(int $id_compra){
        return $this->model->where('id_compra', $id_compra)->get();
    }

    public function findByProducto(int $id_producto)
    {
        return $this->model->where('id_producto', $id_producto)->get();
    }

    public function findByCantidad(int $cantidad)
    {
        return $this->model->where('cantidad', $cantidad)->get();
    }

    public function findByPrecioCompra(float $precioCompra)
    {
        return $this->model->where('precio_compra', $precioCompra)->get();
    }

    public function findBySubtotal(float $subtotal)
    {
        return $this->model->where('subtotal', $subtotal)->get();
    }
}
?>
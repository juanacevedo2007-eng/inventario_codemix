<?php
namespace App\Repositories;
use App\Models\Producto;
use App\Interfaces\ProductoInterface;

class ProductoRepository extends BaseRepository implements ProductoInterface
{
    public function __construct(Producto $producto)
    {
        parent::__construct($producto);
    }

    public function findById(int $id_producto)
    {
        return $this->model->find($id_producto);
    }

    public function findByCodigo(string $codigo)
    {
        return $this->model->where('codigo', $codigo)->get();
    }

    public function findByNombre(string $nombre)
    {
        return $this->model->where('nombre', $nombre)->orderBy('nombre','asc')->get();
    }

    public function findByDescripcion(string $descripcion)
    {
        return $this->model->where('descripcion', $descripcion)->get();
    }

    public function findByMarca(string $marca)
    {
        return $this->model->where('marca', $marca)->get();
    }
    
    public function findByPrecioCompra(float $precioCompra)
    {
        return $this->model->where('precio_compra', $precioCompra)->get();
    }

    public function findByPrecioVenta(float $precioVenta)
    {
        return $this->model->where('precio_venta', $precioVenta)->get();
    }

    public function findByStockActual(int $stockActual)
    {
        return $this->model->where('stock_actual', $stockActual)->orderBy('stock_actual', 'asc')->get();
    }

    public function findByStockMinimo(int $stockMinimo)
    {
        return $this->model->where('stock_minimo', $stockMinimo)->orderBy('stock_minimo', 'desc')->get();
    }

    public function findByFechaVencimiento(Carbon $fechaVencimiento)
    {
        return $this->model->where('fecha_vencimiento', $fechaVencimiento)->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }

    public function findByCategoria(int $id_categoria)
    {
        return $this->model->where('id_categoria', $id_categoria)->get();
    }

    public function findByProveedor(int $id_proveedor)
    {
        return $this->model->where('id_proveedor', $id_proveedor)->get();
    }
}
?>
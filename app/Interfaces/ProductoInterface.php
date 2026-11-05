<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface ProductoInterface extends BaseInterface
{
    public function findById(int $id_producto);

    public function findByCodigo(string $codigo);

    public function findByNombre(string $nombre);

    public function findByDescripcion(string $descripcion);

    public function findByMarca(string $marca);
    
    public function findByPrecioCompra(float $precioCompra);

    public function findByPrecioVenta(float $precioVenta);

    public function findByStockActual(int $stockActual);

    public function findByStockMinimo(int $stockMinimo);

    public function findByFechaVencimiento(Carbon $fechaVencimiento);

    public function findByEstado(string $estado);

    public function findByCategoria(int $id_categoria);
    
    public function findByProveedor(int $id_proveedor);
}

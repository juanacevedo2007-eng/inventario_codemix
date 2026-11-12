<?php

namespace App\Services;

use App\Interfaces\DetalleVentaInterface;
use Illuminate\Validation\ValidationException;

class DetalleVentaService
{
    protected DetalleVentaInterface $detalleVentaRepository;

    public function __construct(DetalleVentaInterface $detalleVentaRepository)
    {
        $this->detalleVentaRepository = $detalleVentaRepository;
    }

    public function getAll()
    {
        return $this->detalleVentaRepository->getAll();
    }

    public function getById(int $id)
    {
        $detalle = $this->detalleVentaRepository->findById($id);

        if (!$detalle) {
            throw ValidationException::withMessages([
                'detalle_venta' => 'El detalle de venta no existe.'
            ]);
        }

        return $detalle;
    }

    public function create(array $data)
    {
        $this->validarDatosDetalle($data);

        return $this->detalleVentaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosDetalle($data);

        return $this->detalleVentaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->detalleVentaRepository->delete($id);
    }

    public function findByVenta(int $id_venta)
    {
        return $this->detalleVentaRepository->findByVenta($id_venta);
    }

    public function findByProducto(int $id_producto)
    {
        return $this->detalleVentaRepository->findByProducto($id_producto);
    }

    public function findByCantidad(int $cantidad)
    {
        return $this->detalleVentaRepository->findByCantidad($cantidad);
    }

    public function findByPrecioUnitario(float $precioUnitario)
    {
        return $this->detalleVentaRepository->findByPrecioUnitario($precioUnitario);
    }

    public function findBySubtotal(float $subtotal)
    {
        return $this->detalleVentaRepository->findBySubtotal($subtotal);
    }

}

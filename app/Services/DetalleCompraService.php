<?php

namespace App\Services;

use App\Interfaces\DetalleCompraInterface;
use Illuminate\Validation\ValidationException;

class DetalleCompraService
{
    protected DetalleCompraInterface $detalleCompraRepository;

    public function __construct(DetalleCompraInterface $detalleCompraRepository)
    {
        $this->detalleCompraRepository = $detalleCompraRepository;
    }

    public function getAll()
    {
        return $this->detalleCompraRepository->getAll();
    }

    public function getById(int $id)
    {
        $detalle = $this->detalleCompraRepository->findById($id);

        if (!$detalle) {
            throw ValidationException::withMessages([
                'detalle_compra' => 'El detalle de compra no existe.'
            ]);
        }

        return $detalle;
    }

    public function create(array $data)
    {
        $this->validarDatosDetalle($data);

        return $this->detalleCompraRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosDetalle($data);

        return $this->detalleCompraRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->detalleCompraRepository->delete($id);
    }

    public function findByCompra(int $id_compra)
    {
        return $this->detalleCompraRepository->findByCompra($id_compra);
    }

    public function findByProducto(int $id_producto)
    {
        return $this->detalleCompraRepository->findByProducto($id_producto);
    }

    public function findByCantidad(int $cantidad)
    {
        return $this->detalleCompraRepository->findByCantidad($cantidad);
    }

    public function findByPrecioCompra(float $precioCompra)
    {
        return $this->detalleCompraRepository->findByPrecioCompra($precioCompra);
    }

    public function findBySubtotal(float $subtotal)
    {
        return $this->detalleCompraRepository->findBySubtotal($subtotal);
    }


}

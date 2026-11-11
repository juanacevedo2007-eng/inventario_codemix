<?php

namespace App\Services;

use App\Interfaces\MovimientoStockInterface;
use Illuminate\Validation\ValidationException;

class MovimientoStockService
{
    protected MovimientoStockInterface $movimientoStockRepository;

    public function __construct(MovimientoStockInterface $movimientoStockRepository)
    {
        $this->movimientoStockRepository = $movimientoStockRepository;
    }

    public function getAll()
    {
        return $this->movimientoStockRepository->getAll();
    }

    public function getById(int $id)
    {
        $movimiento = $this->movimientoStockRepository->findById($id);

        if (!$movimiento) {
            throw ValidationException::withMessages([
                'movimiento_stock' => 'El movimiento no existe.'
            ]);
        }

        return $movimiento;
    }

    public function create(array $data)
    {
        $this->validarDatosMovimiento($data);

        return $this->movimientoStockRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosMovimiento($data);

        return $this->movimientoStockRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->movimientoStockRepository->delete($id);
    }

    public function findByProducto(int $id_producto)
    {
        return $this->movimientoStockRepository->findByProducto($id_producto);
    }

    public function findByUsuario(int $id_usuario)
    {
        return $this->movimientoStockRepository->findByUsuario($id_usuario);
    }

    public function findByProveedor(int $id_proveedor)
    {
        return $this->movimientoStockRepository->findByProveedor($id_proveedor);
    }

    public function findByCompra(int $id_compra)
    {
        return $this->movimientoStockRepository->findByCompra($id_compra);
    }

    public function findByVenta(int $id_venta)
    {
        return $this->movimientoStockRepository->findByVenta($id_venta);
    }

    public function findByTipoMovimiento(string $tipoMovimiento)
    {
        return $this->movimientoStockRepository->findByTipoMovimiento($tipoMovimiento);
    }

    public function findByCantidad(int $cantidad)
    {
        return $this->movimientoStockRepository->findByCantidad($cantidad);
    }

    public function findByStockAntes(int $stockAntes)
    {
        return $this->movimientoStockRepository->findByStockAntes($stockAntes);
    }

    public function findByStockDespues(int $stockDespues)
    {
        return $this->movimientoStockRepository->findByStockDespues($stockDespues);
    }

    public function findByMotivo(string $motivo)
    {
        return $this->movimientoStockRepository->findByMotivo($motivo);
    }

    private function validarDatosMovimiento(array $data): void
    {
        if (isset($data['cantidad']) &&
            (!filter_var($data['cantidad'], FILTER_VALIDATE_INT) ||
            $data['cantidad'] <= 0)) {

            throw ValidationException::withMessages([
                'cantidad' => 'La cantidad debe ser un entero mayor que cero.'
            ]);
        }

        foreach (['stock_antes', 'stock_despues'] as $campo) {
            if (isset($data[$campo]) &&
                (!filter_var($data[$campo], FILTER_VALIDATE_INT) ||
                $data[$campo] < 0)) {

                throw ValidationException::withMessages([
                    $campo => 'El stock debe ser un entero igual o mayor que cero.'
                ]);
            }
        }
    }
}

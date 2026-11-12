<?php

namespace App\Services;

use App\Interfaces\VentaInterface;
use Illuminate\Validation\ValidationException;

class VentaService
{
    protected VentaInterface $ventaRepository;

    public function __construct(VentaInterface $ventaRepository)
    {
        $this->ventaRepository = $ventaRepository;
    }

    public function getAll()
    {
        return $this->ventaRepository->getAll();
    }

    public function getById(int $id)
    {
        $venta = $this->ventaRepository->findById($id);

        if (!$venta) {
            throw ValidationException::withMessages([
                'venta' => 'La venta no existe.'
            ]);
        }

        return $venta;
    }

    public function create(array $data)
    {
        $this->validarDatosVenta($data);

        return $this->ventaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosVenta($data);

        return $this->ventaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->ventaRepository->delete($id);
    }

    public function findByNombreFactura(string $nombreFactura)
    {
        return $this->ventaRepository->findByNombreFactura($nombreFactura);
    }

    public function findByDescuento(float $descuento)
    {
        return $this->ventaRepository->findByDescuento($descuento);
    }

    public function findByIva(float $iva)
    {
        return $this->ventaRepository->findByIva($iva);
    }

    public function findByTotal(float $total)
    {
        return $this->ventaRepository->findByTotal($total);
    }

    public function findByEstado(string $estado)
    {
        return $this->ventaRepository->findByEstado($estado);
    }

    public function findByIdUsuario(int $id_usuario)
    {
        return $this->ventaRepository->findByIdUsuario($id_usuario);
    }


}

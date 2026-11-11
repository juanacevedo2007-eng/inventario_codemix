<?php

namespace App\Services;

use App\Interfaces\CompraInterface;
use Illuminate\Validation\ValidationException;

class CompraService
{
    protected CompraInterface $compraRepository;

    public function __construct(CompraInterface $compraRepository)
    {
        $this->compraRepository = $compraRepository;
    }

    public function getAll()
    {
        return $this->compraRepository->getAll();
    }

    public function getById(int $id)
    {
        $compra = $this->compraRepository->findById($id);

        if (!$compra) {
            throw ValidationException::withMessages([
                'compra' => 'La compra no existe.'
            ]);
        }

        return $compra;
    }

    public function create(array $data)
    {
        $this->validarDatosCompra($data);

        return $this->compraRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosCompra($data);

        return $this->compraRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->getById($id);

        return $this->compraRepository->delete($id);
    }

    public function findByTotal(float $total)
    {
        return $this->compraRepository->findByTotal($total);
    }

    public function findByEstado(string $estado)
    {
        return $this->compraRepository->findByEstado($estado);
    }

    public function findByUsuario(int $id_usuario)
    {
        return $this->compraRepository->findByUsuario($id_usuario);
    }

    public function findByProveedor(int $id_proveedor)
    {
        return $this->compraRepository->findByProveedor($id_proveedor);
    }

    private function validarDatosCompra(array $data): void
    {
        if (isset($data['total']) &&
            (!is_numeric($data['total']) || $data['total'] < 0)) {

            throw ValidationException::withMessages([
                'total' => 'El total de la compra no puede ser negativo.'
            ]);
        }
    }
}

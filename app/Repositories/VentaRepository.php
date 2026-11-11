<?php
namespace App\Repositories;
use App\Models\Venta;
use App\Interfaces\VentaInterface;

class VentaRepository extends BaseRepository implements VentaInterface
{
    public function __construct(Venta $venta)
    {
        parent::__construct($venta);
    }

    public function findById(int $id_venta)
    {
        return $this->model->find($id_venta);
    }

    public function findByNombreFactura(string $nombreFactura)
    {
        return $this->model->where('nombre_factura', $nombreFactura)->orderBy('nombre_factura', 'asc')->get();
    }

    public function findByDescuento(float $descuento)
    {
        return $this->model->where('descuento', $descuento)->get();
    }

    public function findByIva(float $iva)
    {
        return $this->model->where('iva', $iva)->get();
    }

    public function findByTotal(float $total)
    {
        return $this->model->where('total', $total)->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }

    public function findByIdUsuario(int $id_usuario)
    {
        return $this->model->where('id_usuario', $id_usuario)->get();
    }
}
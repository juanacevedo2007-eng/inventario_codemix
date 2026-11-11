<?php
namespace App\Repositories;
use App\Models\Compra;
use App\Interfaces\CompraInterface;


class CompraRepository extends BaseRepository implements CompraInterface
{
    public function __construct(Compra $compra)
    {
        parent::__construct($compra);
    }
    public function findById(int $id_compra){
        return $this->model->find(id_compra);
    }

    public function findByTotal(float $total){
        return $this->model->where("total", $total)->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where("estado", $estado)->get();
    }

    public function findByUsuario(int $id_usuario)
    {
        return $this->model->where("id_usuario", $id_usuario)->get();
    }

    public function findByProveedor(int $id_proveedor)
    {
        return $this->model->where("id_proveedor", $id_proveedor)->get();
    }
}

?>
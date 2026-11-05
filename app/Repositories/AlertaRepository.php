<?php

namespace App\Repositories;
use App\Interfaces\AlertaInterface;
use App\Models\Alerta;

class AlertaRepository extends BaseRepository implements AlertaInterface

{
    
    public function __construct(Alerta $alerta)
    {
        parent::__construct($alerta);
    }

    public function findById(int $id_alerta)
    {
        return $this->model->find($id_alerta);
    }

    public function findByProducto(int $id_producto)
    {
    return $this->model->where('id_producto', $id_producto)->get();
    }

    public function findByTipoAlerta(string $tipoAlerta)
    {
        return $this->model->where('tipo_alerta', $tipoAlerta)->get();
    }

    public function findByMensaje(string $mensaje)
    {
        return $this->model->where('mensaje', 'LIKE', '%' . $mensaje . '%')->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }




}
<?php

namespace App\Repositories;

use App\Models\Accesos;
use Carbon\Carbon;
use App\Interfaces\AccesoInterface;

class  AccesoRepository extends BaseRepository implements AccesoInterface {  
    public function __construct(Accesos $acceso)
    {
        parent::__construct($acceso);
    }

    public function findById(int $id_acceso)
    { 
        return $this->model->find($id_acceso);
    }

    public function findByUsuario(int $id_usuario)
    {
        return $this->model->where('id_usuario', $id_usuario)->get();
    }

    public function findByDispositivo(string $dispositivo)
    {
        return $this->model->where('dispositivo', $dispositivo)->get();
    }

    public function findByNavegador(string $navegador)
    {
      return $this->model->where('navegador', $navegador)->get();
    }

    public function findByUbicacion(string $ubicacion)
    {
      return $this->model->where('ubicacion', $ubicacion)->get();
    }

    public function findByFecha(Carbon $fechaIngreso, Carbon $fechaSalida)
    {
      return $this->model->whereBetween('fecha_ingreso', [$fechaIngreso, $fechaSalida])->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }
}

<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface AccesoInterface extends BaseInterface
{
    public function findById(int $id_acceso);

    public function findByUsuario(int $id_usuario);

    public function findByDispositivo(string $dispositivo);

    public function findByNavegador(string $navegador);

    public function findByUbicacion(string $ubicacion);

    public function findByFecha(Carbon $fechaIngreso, Carbon $fechaSalida); 

    public function findByEstado(string $estado);

}

<?php

namespace App\Interfaces;

interface ReporteInterface extends BaseInterface
{
    public function findById(int $id_reporte);

    public function findByTipoReporte(string $tipoReporte);

    public function findByFormato(string $formato);

    public function findByFechaDescarga(Carbon $fechaDescarga);
    
    public function findByUsuario(int $id_usuario);
}

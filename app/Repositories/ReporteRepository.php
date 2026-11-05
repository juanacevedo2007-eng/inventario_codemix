<?php
namespace App\Repositories;
use App\Models\Reporte;
use App\Interfaces\ReporteInterface;

class ReporteRepository extends BaseRepository implements ReporteInterface
{
    public function __construct(Reporte $reporte)
    {
        parent::__construct($reporte);
    }
    

    public function findById(int $id_reporte)
    {
        return $this->model->find($id_reporte);
    }

    public function findByTipoReporte(string $tipoReporte)
    {
        return $this->model->where('tipo_reporte', $tipoReporte)->get();
    }

    public function findByFormato(string $formato)
    {
        return $this->model->where('formato', $formato)->get();
    }

    public function findByFechaDescarga(Carbon $fechaDescarga)
    {
        return $this->model->where('fecha_descarga', $fechaDescarga)->get();
    }

    public function findByUsuario(int $id_usuario)
    {
        return $this->model->where('id_usuario', $id_usuario)->get();
    }
}
?>
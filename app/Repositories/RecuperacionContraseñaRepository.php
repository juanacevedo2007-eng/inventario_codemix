<?php
namespace App\Repositories;
use App\Models\RecuperacionContraseña;
use App\Interfaces\RecuperacionContraseñaInterface;
use Carbon\Carbon;

class RecuperacionContraseñaRepository extends BaseRepository implements RecuperacionContraseñaInterface
{
    public function __construct(RecuperacionContraseña $recuperacionContraseña)
    {
        parent::__construct($recuperacionContraseña);
    }
    public function findById(int $id_recuperacion_contraseña)
    {
        return $this->model->find($id_recuperacion_contraseña);
    }

    public function findByUsuario(int $id_usuario)
    {
        return $this->model->where('id_usuario', $id_usuario)->get();
    }

    public function findByCodigo(string $codigo)
    {
        return $this->model->where('codigo', $codigo)->get();
    }

    public function findByFechaExpiracion(Carbon $fechaExpiracion)
    {
        return $this->model->where('fecha_expiracion', $fechaExpiracion)->get();
    }

    public function findByUsado(bool $usado)
    {
        return $this->model->where('usado', $usado)->get();
    }
}

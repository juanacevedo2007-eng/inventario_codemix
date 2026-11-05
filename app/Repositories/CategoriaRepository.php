<?php
namespace App\Repositories;
use app\models\Categoria;
use App\Interfaces\CategoriaInterface;

class CategoriaRepository extends BaseRepository implements CategoriaInterface
{
    public function __construct(Categoria $categoria)
    {
        parent::__construct($categoria);
    }

    public function findById(int $id_categoria)
    {
        return $this->model->find($id_categoria);
    }

    public function findByNombreCategoria(string $nombreCategoria)
    {
        return $this->model->where('nombre_categoria', $nombreCategoria)->orderBy('nombre_categoria', 'ASC')->get();
    }

    public function findByDescripcion(string $descripcion)
    {
        return $this->model->where('descripcion', $descripcion)->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }

}




?>
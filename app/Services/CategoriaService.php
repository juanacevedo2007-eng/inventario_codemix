<?php

namespace App\Services;

use App\Interfaces\CategoriaInterface;
use Illuminate\Validation\ValidationException;

class CategoriaService
{
    protected CategoriaInterface $categoriaRepository;

    public function __construct(CategoriaInterface $categoriaRepository)
    {
        $this->categoriaRepository = $categoriaRepository;
    }

    // Listar todas las categorias
    public function getAll()
    {
        return $this->categoriaRepository->getAll();
    }

    // Buscar categoria por ID
    public function getById(int $id)
    {
        $categoria = $this->categoriaRepository->findById($id);

        if (!$categoria) {
            throw ValidationException::withMessages([
                'categoria' => 'La categoria no existe.'
            ]);
        }

        return $categoria;
    }

    // Registrar categoria
    public function create(array $data)
    {


        return $this->categoriaRepository->create($data);
    }

    // Actualizar categoria
    public function update(int $id, array $data)
    {
        $this->getById($id);

        return $this->categoriaRepository->update($id, $data);
    }

    // Eliminar categoria
    public function delete(int $id)
    {
        $this->getById($id);

        return $this->categoriaRepository->delete($id);
    }

    // Buscar por nombre
    public function findByNombreCategoria(string $nombreCategoria)
    {
        return $this->categoriaRepository->findByNombreCategoria($nombreCategoria);
    }

    // Buscar por descripcion
    public function findByDescripcion(string $descripcion)
    {
        return $this->categoriaRepository->findByDescripcion($descripcion);
    }

    // Buscar por estado
    public function findByEstado(string $estado)
    {
        return $this->categoriaRepository->findByEstado($estado);
    }



}

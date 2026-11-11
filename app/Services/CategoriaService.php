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
        $this->validarDatosCategoria($data);
        $this->validarNombreUnico($data['nombre_categoria']);

        return $this->categoriaRepository->create($data);
    }

    // Actualizar categoria
    public function update(int $id, array $data)
    {
        $this->getById($id);
        $this->validarDatosCategoria($data);

        if (isset($data['nombre_categoria'])) {
            $this->validarNombreUnico($data['nombre_categoria'], $id);
        }

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

    // Validar datos
    private function validarDatosCategoria(array $data): void
    {
        if (isset($data['nombre_categoria']) &&
            trim($data['nombre_categoria']) === '') {

            throw ValidationException::withMessages([
                'nombre_categoria' => 'El nombre no puede estar vacio.'
            ]);
        }

        if (isset($data['estado']) &&
            !in_array($data['estado'], ['Activo', 'Inactivo'], true)) {

            throw ValidationException::withMessages([
                'estado' => 'El estado debe ser Activo o Inactivo.'
            ]);
        }
    }

    // Validar nombre unico
    private function validarNombreUnico(
        string $nombreCategoria,
        ?int $idExcluir = null
    ): void {
        $categorias = $this->categoriaRepository
            ->findByNombreCategoria($nombreCategoria);

        foreach ($categorias as $categoria) {
            if ($categoria->id_categoria != $idExcluir) {
                throw ValidationException::withMessages([
                    'nombre_categoria' => 'Ya existe una categoria con ese nombre.'
                ]);
            }
        }
    }
}

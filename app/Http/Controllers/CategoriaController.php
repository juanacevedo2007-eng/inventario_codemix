<?php

namespace App\Http\Controllers;

use App\Services\CategoriaService;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    public function __construct(private CategoriaService $categoriaService)
    {
    }

    // Traer todas las categorías
    public function index()
    {
        $registros = $this->categoriaService->getAll();

        return response()->json([
            'message' => 'Se listaron las categorías correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear una categoría
    public function store(CategoriaRequest $request)
    {
        $registro = $this->categoriaService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'La categoría se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer una categoría por ID
    public function show(string $id)
    {
        $registro = $this->categoriaService->getById($id);

        return response()->json([
            'message' => 'Se listó la categoría correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar una categoría
    public function update(CategoriaRequest $request, string $id)
    {
        $registroActualizado = $this->categoriaService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'La categoría se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar una categoría
    public function destroy(string $id)
    {
        $this->categoriaService->delete($id);

        return response()->json([
            'message' => 'La categoría se eliminó correctamente'
        ], 200);
    }

    // Buscar por nombre de categoría
    public function findByNombreCategoria(string $nombreCategoria)
    {
        $registros = $this->categoriaService->findByNombreCategoria(
            $nombreCategoria
        );

        return response()->json([
            'message' => 'Se listaron las categorías por nombre',
            'data' => $registros
        ], 200);
    }

    // Buscar por descripción
    public function findByDescripcion(string $descripcion)
    {
        $registros = $this->categoriaService->findByDescripcion($descripcion);

        return response()->json([
            'message' => 'Se listaron las categorías por descripción',
            'data' => $registros
        ], 200);
    }

    // Buscar por estado
    public function findByEstado(string $estado)
    {
        $registros = $this->categoriaService->findByEstado($estado);

        return response()->json([
            'message' => 'Se listaron las categorías por estado',
            'data' => $registros
        ], 200);
    }
}

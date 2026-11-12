<?php

namespace App\Http\Controllers;

use App\Services\RolService;
use App\Http\Requests\RolRequest;

class RolController extends Controller
{
    public function __construct(private RolService $rolService)
    {
    }

    // Traer todos los roles
    public function index()
    {
        $registros = $this->rolService->getAll();

        return response()->json([
            'message' => 'Se listaron los roles correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un rol
    public function store(RolRequest $request)
    {
        $registro = $this->rolService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'El rol se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer un rol por ID
    public function show(string $id)
    {
        $registro = $this->rolService->getById($id);

        return response()->json([
            'message' => 'Se listó el rol correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un rol
    public function update(RolRequest $request, string $id)
    {
        $registroActualizado = $this->rolService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'El rol se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un rol
    public function destroy(string $id)
    {
        $this->rolService->delete($id);

        return response()->json([
            'message' => 'El rol se eliminó correctamente'
        ], 200);
    }

    // Buscar por nombre del rol
    public function findByNombreRol(string $nombreRol)
    {
        $registros = $this->rolService->findByNombreRol($nombreRol);

        return response()->json([
            'message' => 'Se listaron los roles por nombre',
            'data' => $registros
        ], 200);
    }

    // Buscar por descripción del rol
    public function findByDescripcionRol(string $descripcion)
    {
        $registros = $this->rolService->findByDescripcionRol($descripcion);

        return response()->json([
            'message' => 'Se listaron los roles por descripción',
            'data' => $registros
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }

    // Traer todos los usuarios
    public function index()
    {
        $registros = $this->usuarioService->getAll();

        return response()->json([
            'message' => 'Se listaron los usuarios correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un usuario
    public function store(UsuarioRequest $request)
    {
        $registro = $this->usuarioService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'El usuario se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer un usuario por ID
    public function show(string $id)
    {
        $registro = $this->usuarioService->getById($id);

        return response()->json([
            'message' => 'Se listó el usuario correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un usuario
    public function update(UsuarioRequest $request, string $id)
    {
        $registroActualizado = $this->usuarioService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'El usuario se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un usuario
    public function destroy(string $id)
    {
        $this->usuarioService->delete($id);

        return response()->json([
            'message' => 'El usuario se eliminó correctamente'
        ], 200);
    }

    // Buscar por nombre
    public function findByNombre(string $nombre)
    {
        $registros = $this->usuarioService->findByNombre($nombre);

        return response()->json([
            'message' => 'Se listaron los usuarios por nombre',
            'data' => $registros
        ], 200);
    }

    // Buscar por correo electrónico
    public function findByEmail(string $correo)
    {
        $registros = $this->usuarioService->findByEmail($correo);

        return response()->json([
            'message' => 'Se listaron los usuarios por correo',
            'data' => $registros
        ], 200);
    }

    // Buscar por estado
    public function findByEstado(string $estado)
    {
        $registros = $this->usuarioService->findByEstado($estado);

        return response()->json([
            'message' => 'Se listaron los usuarios por estado',
            'data' => $registros
        ], 200);
    }

    // Buscar por número de intentos
    public function findByIntentos(int $intentos)
    {
        $registros = $this->usuarioService->findByIntentos($intentos);

        return response()->json([
            'message' => 'Se listaron los usuarios por intentos',
            'data' => $registros
        ], 200);
    }

    // Buscar por rol
    public function findByRol(int $id_rol)
    {
        $registros = $this->usuarioService->findByRol($id_rol);

        return response()->json([
            'message' => 'Se listaron los usuarios por rol',
            'data' => $registros
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\RecuperacionContraseñaService;
use App\Http\Requests\RecuperacionContraseñaRequest;
use Carbon\Carbon;

class RecuperacionContraseñaController extends Controller
{
    public function __construct(
        private RecuperacionContraseñaService $recuperacionService
    ) {
    }

    // Traer todos los registros de recuperación
    public function index()
    {
        $registros = $this->recuperacionService->getAll();

        return response()->json([
            'message' => 'Se listaron las recuperaciones correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un registro de recuperación
    public function store(RecuperacionContraseñaRequest $request)
    {
        $registro = $this->recuperacionService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'El registro de recuperación se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer un registro por ID
    public function show(string $id)
    {
        $registro = $this->recuperacionService->getById($id);

        return response()->json([
            'message' => 'Se listó el registro de recuperación correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un registro
    public function update(
        RecuperacionContraseñaRequest $request,
        string $id
    ) {
        $registroActualizado = $this->recuperacionService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'El registro de recuperación se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un registro
    public function destroy(string $id)
    {
        $this->recuperacionService->delete($id);

        return response()->json([
            'message' => 'El registro de recuperación se eliminó correctamente'
        ], 200);
    }

    // Buscar por usuario
    public function findByUsuario(int $id_usuario)
    {
        $registros = $this->recuperacionService->findByUsuario($id_usuario);

        return response()->json([
            'message' => 'Se listaron las recuperaciones por usuario',
            'data' => $registros
        ], 200);
    }

    // Buscar por código
    public function findByCodigo(string $codigo)
    {
        $registros = $this->recuperacionService->findByCodigo($codigo);

        return response()->json([
            'message' => 'Se listaron las recuperaciones por código',
            'data' => $registros
        ], 200);
    }

    // Buscar por fecha de expiración
    public function findByFechaExpiracion(string $fechaExpiracion)
    {
        $fecha = Carbon::parse($fechaExpiracion);

        $registros = $this->recuperacionService->findByFechaExpiracion(
            $fecha
        );

        return response()->json([
            'message' => 'Se listaron las recuperaciones por fecha de expiración',
            'data' => $registros
        ], 200);
    }

    // Buscar por estado de uso
    public function findByUsado(string $usado)
    {
        $valorUsado = filter_var($usado, FILTER_VALIDATE_BOOLEAN);

        $registros = $this->recuperacionService->findByUsado($valorUsado);

        return response()->json([
            'message' => 'Se listaron las recuperaciones por estado de uso',
            'data' => $registros
        ], 200);
    }
}

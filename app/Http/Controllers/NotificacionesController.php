<?php

namespace App\Http\Controllers;

use App\Services\NotificacionService;
use App\Http\Requests\NotificacionRequest;
use Carbon\Carbon;

class NotificacionesController extends Controller
{
    public function __construct(
        private NotificacionService $notificacionService
    ) {
    }

    // Traer todas las notificaciones
    public function index()
    {
        $registros = $this->notificacionService->getAll();

        return response()->json([
            'message' => 'Se listaron las notificaciones correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear una notificación
    public function store(NotificacionRequest $request)
    {
        $registro = $this->notificacionService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'La notificación se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer una notificación por ID
    public function show(string $id)
    {
        $registro = $this->notificacionService->getById($id);

        return response()->json([
            'message' => 'Se listó la notificación correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar una notificación
    public function update(NotificacionRequest $request, string $id)
    {
        $registroActualizado = $this->notificacionService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'La notificación se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar una notificación
    public function destroy(string $id)
    {
        $this->notificacionService->delete($id);

        return response()->json([
            'message' => 'La notificación se eliminó correctamente'
        ], 200);
    }

    // Buscar por usuario
    public function findByIdUsuario(int $id_usuario)
    {
        $registros = $this->notificacionService->findByIdUsuario($id_usuario);

        return response()->json([
            'message' => 'Se listaron las notificaciones por usuario',
            'data' => $registros
        ], 200);
    }

    // Buscar por título
    public function findByTitulo(string $titulo)
    {
        $registros = $this->notificacionService->findByTitulo($titulo);

        return response()->json([
            'message' => 'Se listaron las notificaciones por título',
            'data' => $registros
        ], 200);
    }

    // Buscar por mensaje
    public function findByMensaje(string $mensaje)
    {
        $registros = $this->notificacionService->findByMensaje($mensaje);

        return response()->json([
            'message' => 'Se listaron las notificaciones por mensaje',
            'data' => $registros
        ], 200);
    }

    // Buscar por estado de lectura
    public function findByLeido(string $leido)
    {
        $valorLeido = filter_var($leido, FILTER_VALIDATE_BOOLEAN);

        $registros = $this->notificacionService->findByLeido($valorLeido);

        return response()->json([
            'message' => 'Se listaron las notificaciones por estado de lectura',
            'data' => $registros
        ], 200);
    }

    // Buscar por producto
    public function findByIdProducto(int $id_producto)
    {
        $registros = $this->notificacionService->findByIdProducto($id_producto);

        return response()->json([
            'message' => 'Se listaron las notificaciones por producto',
            'data' => $registros
        ], 200);
    }

    // Buscar por fecha
    public function findByFecha(string $fecha)
    {
        $fechaConvertida = Carbon::parse($fecha);

        $registros = $this->notificacionService->findByFecha(
            $fechaConvertida
        );

        return response()->json([
            'message' => 'Se listaron las notificaciones por fecha',
            'data' => $registros
        ], 200);
    }

    // Buscar por tipo de alerta
    public function findByTipoAlerta(string $tipo_alerta)
    {
        $registros = $this->notificacionService->findByTipoAlerta(
            $tipo_alerta
        );

        return response()->json([
            'message' => 'Se listaron las notificaciones por tipo de alerta',
            'data' => $registros
        ], 200);
    }
}

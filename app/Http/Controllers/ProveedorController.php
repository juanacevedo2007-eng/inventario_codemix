<?php

namespace App\Http\Controllers;

use App\Services\ProveedorService;
use App\Http\Requests\ProveedorRequest;

class ProveedorController extends Controller
{
    public function __construct(private ProveedorService $proveedorService)
    {
    }

    // Traer todos los proveedores
    public function index()
    {
        $registros = $this->proveedorService->getAll();

        return response()->json([
            'message' => 'Se listaron los proveedores correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un proveedor
    public function store(ProveedorRequest $request)
    {
        $registro = $this->proveedorService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'El proveedor se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer un proveedor por ID
    public function show(string $id)
    {
        $registro = $this->proveedorService->getById($id);

        return response()->json([
            'message' => 'Se listó el proveedor correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un proveedor
    public function update(ProveedorRequest $request, string $id)
    {
        $registroActualizado = $this->proveedorService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'El proveedor se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un proveedor
    public function destroy(string $id)
    {
        $this->proveedorService->delete($id);

        return response()->json([
            'message' => 'El proveedor se eliminó correctamente'
        ], 200);
    }

    // Buscar por nombre
    public function findByNombre(string $nombre)
    {
        $registros = $this->proveedorService->findByNombre($nombre);

        return response()->json([
            'message' => 'Se listaron los proveedores por nombre',
            'data' => $registros
        ], 200);
    }

    // Buscar por contacto
    public function findByContacto(string $contacto)
    {
        $registros = $this->proveedorService->findByContacto($contacto);

        return response()->json([
            'message' => 'Se listaron los proveedores por contacto',
            'data' => $registros
        ], 200);
    }

    // Buscar por correo
    public function findByCorreo(string $correo)
    {
        $registros = $this->proveedorService->findByCorreo($correo);

        return response()->json([
            'message' => 'Se listaron los proveedores por correo',
            'data' => $registros
        ], 200);
    }

    // Buscar por teléfono
    public function findByTelefono(string $telefono)
    {
        $registros = $this->proveedorService->findByTelefono($telefono);

        return response()->json([
            'message' => 'Se listaron los proveedores por teléfono',
            'data' => $registros
        ], 200);
    }

    // Buscar por dirección
    public function findByDireccion(string $direccion)
    {
        $registros = $this->proveedorService->findByDireccion($direccion);

        return response()->json([
            'message' => 'Se listaron los proveedores por dirección',
            'data' => $registros
        ], 200);
    }

    // Buscar por estado
    public function findByEstado(string $estado)
    {
        $registros = $this->proveedorService->findByEstado($estado);

        return response()->json([
            'message' => 'Se listaron los proveedores por estado',
            'data' => $registros
        ], 200);
    }
}

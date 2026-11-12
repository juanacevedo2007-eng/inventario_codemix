<?php

namespace App\Http\Controllers;

use App\Services\CompraService;
use App\Http\Requests\CompraRequest;

class CompraController extends Controller
{
    public function __construct(private CompraService $compraService)
    {
    }

    // Traer todas las compras
    public function index()
    {
        $registros = $this->compraService->getAll();

        return response()->json([
            'message' => 'Se listaron las compras correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear una compra
    public function store(CompraRequest $request)
    {
        $registro = $this->compraService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'La compra se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer una compra por ID
    public function show(string $id)
    {
        $registro = $this->compraService->getById($id);

        return response()->json([
            'message' => 'Se listó la compra correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar una compra
    public function update(CompraRequest $request, string $id)
    {
        $registroActualizado = $this->compraService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'La compra se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar una compra
    public function destroy(string $id)
    {
        $this->compraService->delete($id);

        return response()->json([
            'message' => 'La compra se eliminó correctamente'
        ], 200);
    }

    // Buscar por total
    public function findByTotal(float $total)
    {
        $registros = $this->compraService->findByTotal($total);

        return response()->json([
            'message' => 'Se listaron las compras por total',
            'data' => $registros
        ], 200);
    }

    // Buscar por estado
    public function findByEstado(string $estado)
    {
        $registros = $this->compraService->findByEstado($estado);

        return response()->json([
            'message' => 'Se listaron las compras por estado',
            'data' => $registros
        ], 200);
    }

    // Buscar por usuario
    public function findByUsuario(int $id_usuario)
    {
        $registros = $this->compraService->findByUsuario($id_usuario);

        return response()->json([
            'message' => 'Se listaron las compras por usuario',
            'data' => $registros
        ], 200);
    }

    // Buscar por proveedor
    public function findByProveedor(int $id_proveedor)
    {
        $registros = $this->compraService->findByProveedor($id_proveedor);

        return response()->json([
            'message' => 'Se listaron las compras por proveedor',
            'data' => $registros
        ], 200);
    }
}

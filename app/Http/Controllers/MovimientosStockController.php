<?php

namespace App\Http\Controllers;

use App\Services\MovimientoStockService;
use App\Http\Requests\MovimientoStockRequest;

class MovimientosStockController extends Controller
{
    public function __construct(
        private MovimientoStockService $movimientoStockService
    ) {
    }

    // Traer todos los movimientos
    public function index()
    {
        $registros = $this->movimientoStockService->getAll();

        return response()->json([
            'message' => 'Se listaron los movimientos de stock correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un movimiento
    public function store(MovimientoStockRequest $request)
    {
        $registro = $this->movimientoStockService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'El movimiento de stock se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer un movimiento por ID
    public function show(string $id)
    {
        $registro = $this->movimientoStockService->getById($id);

        return response()->json([
            'message' => 'Se listó el movimiento correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un movimiento
    public function update(MovimientoStockRequest $request, string $id)
    {
        $registroActualizado = $this->movimientoStockService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'El movimiento de stock se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un movimiento
    public function destroy(string $id)
    {
        $this->movimientoStockService->delete($id);

        return response()->json([
            'message' => 'El movimiento de stock se eliminó correctamente'
        ], 200);
    }

    // Buscar por producto
    public function findByProducto(int $id_producto)
    {
        $registros = $this->movimientoStockService->findByProducto($id_producto);

        return response()->json([
            'message' => 'Se listaron los movimientos por producto',
            'data' => $registros
        ], 200);
    }

    // Buscar por usuario
    public function findByUsuario(int $id_usuario)
    {
        $registros = $this->movimientoStockService->findByUsuario($id_usuario);

        return response()->json([
            'message' => 'Se listaron los movimientos por usuario',
            'data' => $registros
        ], 200);
    }

    // Buscar por proveedor
    public function findByProveedor(int $id_proveedor)
    {
        $registros = $this->movimientoStockService->findByProveedor($id_proveedor);

        return response()->json([
            'message' => 'Se listaron los movimientos por proveedor',
            'data' => $registros
        ], 200);
    }

    // Buscar por compra
    public function findByCompra(int $id_compra)
    {
        $registros = $this->movimientoStockService->findByCompra($id_compra);

        return response()->json([
            'message' => 'Se listaron los movimientos por compra',
            'data' => $registros
        ], 200);
    }

    // Buscar por venta
    public function findByVenta(int $id_venta)
    {
        $registros = $this->movimientoStockService->findByVenta($id_venta);

        return response()->json([
            'message' => 'Se listaron los movimientos por venta',
            'data' => $registros
        ], 200);
    }

    // Buscar por tipo de movimiento
    public function findByTipoMovimiento(string $tipoMovimiento)
    {
        $registros = $this->movimientoStockService->findByTipoMovimiento(
            $tipoMovimiento
        );

        return response()->json([
            'message' => 'Se listaron los movimientos por tipo',
            'data' => $registros
        ], 200);
    }

    // Buscar por cantidad
    public function findByCantidad(int $cantidad)
    {
        $registros = $this->movimientoStockService->findByCantidad($cantidad);

        return response()->json([
            'message' => 'Se listaron los movimientos por cantidad',
            'data' => $registros
        ], 200);
    }

    // Buscar por stock anterior
    public function findByStockAntes(int $stockAntes)
    {
        $registros = $this->movimientoStockService->findByStockAntes(
            $stockAntes
        );

        return response()->json([
            'message' => 'Se listaron los movimientos por stock anterior',
            'data' => $registros
        ], 200);
    }

    // Buscar por stock posterior
    public function findByStockDespues(int $stockDespues)
    {
        $registros = $this->movimientoStockService->findByStockDespues(
            $stockDespues
        );

        return response()->json([
            'message' => 'Se listaron los movimientos por stock posterior',
            'data' => $registros
        ], 200);
    }

    // Buscar por motivo
    public function findByMotivo(string $motivo)
    {
        $registros = $this->movimientoStockService->findByMotivo($motivo);

        return response()->json([
            'message' => 'Se listaron los movimientos por motivo',
            'data' => $registros
        ], 200);
    }
}

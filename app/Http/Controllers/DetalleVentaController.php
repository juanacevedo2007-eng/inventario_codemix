<?php

namespace App\Http\Controllers;

use App\Services\DetalleVentaService;
use App\Http\Requests\DetalleVentaRequest;

class DetalleVentaController extends Controller
{
    public function __construct(
        private DetalleVentaService $detalleVentaService
    ) {
    }

    // Traer todos los detalles de venta
    public function index()
    {
        $registros = $this->detalleVentaService->getAll();

        return response()->json([
            'message' => 'Se listaron los detalles de venta correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un detalle de venta
    public function store(DetalleVentaRequest $request)
    {
        $registro = $this->detalleVentaService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'El detalle de venta se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer un detalle de venta por ID
    public function show(string $id)
    {
        $registro = $this->detalleVentaService->getById($id);

        return response()->json([
            'message' => 'Se listó el detalle de venta correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un detalle de venta
    public function update(DetalleVentaRequest $request, string $id)
    {
        $registroActualizado = $this->detalleVentaService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'El detalle de venta se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un detalle de venta
    public function destroy(string $id)
    {
        $this->detalleVentaService->delete($id);

        return response()->json([
            'message' => 'El detalle de venta se eliminó correctamente'
        ], 200);
    }

    // Buscar por venta
    public function findByVenta(int $id_venta)
    {
        $registros = $this->detalleVentaService->findByVenta($id_venta);

        return response()->json([
            'message' => 'Se listaron los detalles por venta',
            'data' => $registros
        ], 200);
    }

    // Buscar por producto
    public function findByProducto(int $id_producto)
    {
        $registros = $this->detalleVentaService->findByProducto($id_producto);

        return response()->json([
            'message' => 'Se listaron los detalles por producto',
            'data' => $registros
        ], 200);
    }

    // Buscar por cantidad
    public function findByCantidad(int $cantidad)
    {
        $registros = $this->detalleVentaService->findByCantidad($cantidad);

        return response()->json([
            'message' => 'Se listaron los detalles por cantidad',
            'data' => $registros
        ], 200);
    }

    // Buscar por precio unitario
    public function findByPrecioUnitario(float $precioUnitario)
    {
        $registros = $this->detalleVentaService->findByPrecioUnitario(
            $precioUnitario
        );

        return response()->json([
            'message' => 'Se listaron los detalles por precio unitario',
            'data' => $registros
        ], 200);
    }

    // Buscar por subtotal
    public function findBySubtotal(float $subtotal)
    {
        $registros = $this->detalleVentaService->findBySubtotal($subtotal);

        return response()->json([
            'message' => 'Se listaron los detalles por subtotal',
            'data' => $registros
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\DetalleCompraService;
use App\Http\Requests\DetalleCompraRequest;

class DetalleCompraController extends Controller
{
    public function __construct(
        private DetalleCompraService $detalleCompraService
    ) {
    }

    // Traer todos los detalles de compra
    public function index()
    {
        $registros = $this->detalleCompraService->getAll();

        return response()->json([
            'message' => 'Se listaron los detalles de compra correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un detalle de compra
    public function store(DetalleCompraRequest $request)
    {
        $registro = $this->detalleCompraService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'El detalle de compra se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer un detalle de compra por ID
    public function show(string $id)
    {
        $registro = $this->detalleCompraService->getById($id);

        return response()->json([
            'message' => 'Se listó el detalle de compra correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un detalle de compra
    public function update(DetalleCompraRequest $request, string $id)
    {
        $registroActualizado = $this->detalleCompraService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'El detalle de compra se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un detalle de compra
    public function destroy(string $id)
    {
        $this->detalleCompraService->delete($id);

        return response()->json([
            'message' => 'El detalle de compra se eliminó correctamente'
        ], 200);
    }

    // Buscar por compra
    public function findByCompra(int $id_compra)
    {
        $registros = $this->detalleCompraService->findByCompra($id_compra);

        return response()->json([
            'message' => 'Se listaron los detalles por compra',
            'data' => $registros
        ], 200);
    }

    // Buscar por producto
    public function findByProducto(int $id_producto)
    {
        $registros = $this->detalleCompraService->findByProducto($id_producto);

        return response()->json([
            'message' => 'Se listaron los detalles por producto',
            'data' => $registros
        ], 200);
    }

    // Buscar por cantidad
    public function findByCantidad(int $cantidad)
    {
        $registros = $this->detalleCompraService->findByCantidad($cantidad);

        return response()->json([
            'message' => 'Se listaron los detalles por cantidad',
            'data' => $registros
        ], 200);
    }

    // Buscar por precio de compra
    public function findByPrecioCompra(float $precioCompra)
    {
        $registros = $this->detalleCompraService->findByPrecioCompra(
            $precioCompra
        );

        return response()->json([
            'message' => 'Se listaron los detalles por precio de compra',
            'data' => $registros
        ], 200);
    }

    // Buscar por subtotal
    public function findBySubtotal(float $subtotal)
    {
        $registros = $this->detalleCompraService->findBySubtotal($subtotal);

        return response()->json([
            'message' => 'Se listaron los detalles por subtotal',
            'data' => $registros
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\VentaService;
use App\Http\Requests\VentaRequest;

class VentaController extends Controller
{
    public function __construct(private VentaService $ventaService)
    {
    }

    // Traer todas las ventas
    public function index()
    {
        $registros = $this->ventaService->getAll();

        return response()->json([
            'message' => 'Se listaron las ventas correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear una venta
    public function store(VentaRequest $request)
    {
        $registro = $this->ventaService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'La venta se creó correctamente',
            'datosRegistrados' => $registro
        ], 201);
    }

    // Traer una venta por ID
    public function show(string $id)
    {
        $registro = $this->ventaService->getById($id);

        return response()->json([
            'message' => 'Se listó la venta correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar una venta
    public function update(VentaRequest $request, string $id)
    {
        $registroActualizado = $this->ventaService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'La venta se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar una venta
    public function destroy(string $id)
    {
        $this->ventaService->delete($id);

        return response()->json([
            'message' => 'La venta se eliminó correctamente'
        ], 200);
    }

    // Buscar por nombre de factura
    public function findByNombreFactura(string $nombreFactura)
    {
        $registros = $this->ventaService->findByNombreFactura($nombreFactura);

        return response()->json([
            'message' => 'Se listaron las ventas por nombre de factura',
            'data' => $registros
        ], 200);
    }

    // Buscar por descuento
    public function findByDescuento(float $descuento)
    {
        $registros = $this->ventaService->findByDescuento($descuento);

        return response()->json([
            'message' => 'Se listaron las ventas por descuento',
            'data' => $registros
        ], 200);
    }

    // Buscar por IVA
    public function findByIva(float $iva)
    {
        $registros = $this->ventaService->findByIva($iva);

        return response()->json([
            'message' => 'Se listaron las ventas por IVA',
            'data' => $registros
        ], 200);
    }

    // Buscar por total
    public function findByTotal(float $total)
    {
        $registros = $this->ventaService->findByTotal($total);

        return response()->json([
            'message' => 'Se listaron las ventas por total',
            'data' => $registros
        ], 200);
    }

    // Buscar por estado
    public function findByEstado(string $estado)
    {
        $registros = $this->ventaService->findByEstado($estado);

        return response()->json([
            'message' => 'Se listaron las ventas por estado',
            'data' => $registros
        ], 200);
    }

    // Buscar por usuario
    public function findByIdUsuario(int $id_usuario)
    {
        $registros = $this->ventaService->findByIdUsuario($id_usuario);

        return response()->json([
            'message' => 'Se listaron las ventas por usuario',
            'data' => $registros
        ], 200);
    }
}

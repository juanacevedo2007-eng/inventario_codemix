<?php

namespace App\Http\Controllers;

use App\Services\ProductoService;
use App\Http\Requests\ProductoRequest;
use Carbon\Carbon;

class ProductoController extends Controller
{
    public function __construct(private ProductoService $productoService)
    {
    }

    // Traer todos los registros
    public function index()
    {
        $registros = $this->productoService->getAll();

        return response()->json([
            'message' => 'Se listaron los productos correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(ProductoRequest $request)
    {
        $registroProducto = $this->productoService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'El producto se creó correctamente',
            'datosRegistrados' => $registroProducto
        ], 201);
    }

    // Traer un registro por ID
    public function show(string $id)
    {
        $registro = $this->productoService->getById($id);

        return response()->json([
            'message' => 'Se listó el producto correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un registro
    public function update(ProductoRequest $request, string $id)
    {
        $registroActualizado = $this->productoService->update(
            $id,
            $request->validated()
        );

        return response()->json([
            'message' => 'El producto se actualizó correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->productoService->delete($id);

        return response()->json([
            'message' => 'El producto se eliminó correctamente'
        ], 200);
    }

    // Buscar por código
    public function findByCodigo(string $codigo)
    {
        $registros = $this->productoService->findByCodigo($codigo);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por código',
            'data' => $registros
        ], 200);
    }

    // Buscar por nombre
    public function findByNombre(string $nombre)
    {
        $registros = $this->productoService->findByNombre($nombre);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por nombre',
            'data' => $registros
        ], 200);
    }

    // Buscar por descripción
    public function findByDescripcion(string $descripcion)
    {
        $registros = $this->productoService->findByDescripcion($descripcion);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por descripción',
            'data' => $registros
        ], 200);
    }

    // Buscar por marca
    public function findByMarca(string $marca)
    {
        $registros = $this->productoService->findByMarca($marca);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por marca',
            'data' => $registros
        ], 200);
    }

    // Buscar por precio de compra
    public function findByPrecioCompra(float $precioCompra)
    {
        $registros = $this->productoService->findByPrecioCompra($precioCompra);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por precio de compra',
            'data' => $registros
        ], 200);
    }

    // Buscar por precio de venta
    public function findByPrecioVenta(float $precioVenta)
    {
        $registros = $this->productoService->findByPrecioVenta($precioVenta);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por precio de venta',
            'data' => $registros
        ], 200);
    }

    // Buscar por stock actual
    public function findByStockActual(int $stockActual)
    {
        $registros = $this->productoService->findByStockActual($stockActual);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por stock actual',
            'data' => $registros
        ], 200);
    }

    // Buscar por stock mínimo
    public function findByStockMinimo(int $stockMinimo)
    {
        $registros = $this->productoService->findByStockMinimo($stockMinimo);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por stock mínimo',
            'data' => $registros
        ], 200);
    }

    // Buscar por fecha de vencimiento
    public function findByFechaVencimiento(string $fechaVencimiento)
    {
        $fecha = Carbon::parse($fechaVencimiento);

        $registros = $this->productoService->findByFechaVencimiento($fecha);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por fecha de vencimiento',
            'data' => $registros
        ], 200);
    }

    // Buscar por estado
    public function findByEstado(string $estado)
    {
        $registros = $this->productoService->findByEstado($estado);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por estado',
            'data' => $registros
        ], 200);
    }

    // Buscar por categoría
    public function findByCategoria(int $id_categoria)
    {
        $registros = $this->productoService->findByCategoria($id_categoria);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por categoría',
            'data' => $registros
        ], 200);
    }

    // Buscar por proveedor
    public function findByProveedor(int $id_proveedor)
    {
        $registros = $this->productoService->findByProveedor($id_proveedor);

        return response()->json([
            'message' => 'Se listaron los productos correctamente por proveedor',
            'data' => $registros
        ], 200);
    }
}

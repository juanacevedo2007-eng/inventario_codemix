
<?php

namespace App\Services;

use App\Interfaces\ProductoInterface;
use App\Interfaces\CategoriaInterface;
use App\Interfaces\ProveedorInterface;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class ProductoService
{
    protected ProductoInterface $productoRepository;
    protected CategoriaInterface $categoriaRepository;
    protected ProveedorInterface $proveedorRepository;

    public function __construct(
        ProductoInterface $productoRepository,
        CategoriaInterface $categoriaRepository,
        ProveedorInterface $proveedorRepository
    ) {
        $this->productoRepository = $productoRepository;
        $this->categoriaRepository = $categoriaRepository;
        $this->proveedorRepository = $proveedorRepository;
    }

    // Listar todos los productos
    public function getAll()
    {
        return $this->productoRepository->getAll();
    }

    // Buscar un producto por su ID
    public function getById(int $id)
    {
        $producto = $this->productoRepository->findById($id);

        if (!$producto) {
            throw ValidationException::withMessages([
                'producto' => 'El producto no existe.'
            ]);
        }

        return $producto;
    }

    // Registrar un producto
    public function create(array $data)
    {
        $this->validarDatosProducto($data);
        $this->validarCodigoUnico($data['codigo']);

        return $this->productoRepository->create($data);
    }

    // Actualizar un producto
    public function update(int $id, array $data)
    {
        $this->getById($id);

        $this->validarDatosProducto($data);

        if (isset($data['codigo'])) {
            $this->validarCodigoUnico($data['codigo'], $id);
        }

        return $this->productoRepository->update($id, $data);
    }

    // Eliminar un producto
    public function delete(int $id)
    {
        $this->getById($id);

        return $this->productoRepository->delete($id);
    }

    // Buscar por código
    public function findByCodigo(string $codigo)
    {
        return $this->productoRepository->findByCodigo($codigo);
    }

    // Buscar por nombre
    public function findByNombre(string $nombre)
    {
        return $this->productoRepository->findByNombre($nombre);
    }

    // Buscar por descripción
    public function findByDescripcion(string $descripcion)
    {
        return $this->productoRepository->findByDescripcion($descripcion);
    }

    // Buscar por marca
    public function findByMarca(string $marca)
    {
        return $this->productoRepository->findByMarca($marca);
    }

    // Buscar por precio de compra
    public function findByPrecioCompra(float $precioCompra)
    {
        return $this->productoRepository->findByPrecioCompra($precioCompra);
    }

    // Buscar por precio de venta
    public function findByPrecioVenta(float $precioVenta)
    {
        return $this->productoRepository->findByPrecioVenta($precioVenta);
    }

    // Buscar por stock actual
    public function findByStockActual(int $stockActual)
    {
        return $this->productoRepository->findByStockActual($stockActual);
    }

    // Buscar por stock mínimo
    public function findByStockMinimo(int $stockMinimo)
    {
        return $this->productoRepository->findByStockMinimo($stockMinimo);
    }

    // Buscar por fecha de vencimiento
    public function findByFechaVencimiento(Carbon $fechaVencimiento)
    {
        return $this->productoRepository->findByFechaVencimiento(
            $fechaVencimiento
        );
    }

    // Buscar por estado
    public function findByEstado(string $estado)
    {
        return $this->productoRepository->findByEstado($estado);
    }

    // Buscar por categoría
    public function findByCategoria(int $id_categoria)
    {
        return $this->productoRepository->findByCategoria($id_categoria);
    }

    // Buscar por proveedor
    public function findByProveedor(int $id_proveedor)
    {
        return $this->productoRepository->findByProveedor($id_proveedor);
    }

    // Validar los datos del producto
    private function validarDatosProducto(array $data): void
    {
        if (isset($data['precio_compra']) &&
            (!is_numeric($data['precio_compra']) || $data['precio_compra'] < 0)) {
            throw ValidationException::withMessages([
                'precio_compra' => 'El precio de compra no puede ser negativo.'
            ]);
        }

        if (isset($data['precio_venta']) &&
            (!is_numeric($data['precio_venta']) || $data['precio_venta'] < 0)) {
            throw ValidationException::withMessages([
                'precio_venta' => 'El precio de venta no puede ser negativo.'
            ]);
        }

        foreach (['stock_actual', 'stock_minimo'] as $campo) {
            if (isset($data[$campo]) &&
                (!filter_var($data[$campo], FILTER_VALIDATE_INT) ||
                $data[$campo] < 0)) {
                throw ValidationException::withMessages([
                    $campo => 'La cantidad debe ser un número entero igual o mayor que cero.'
                ]);
            }
        }

        if (isset($data['estado']) &&
            !in_array($data['estado'], ['Activo', 'Inactivo'], true)) {
            throw ValidationException::withMessages([
                'estado' => 'El estado debe ser Activo o Inactivo.'
            ]);
        }

        if (isset($data['id_categoria']) &&
            !$this->categoriaRepository->getById((int) $data['id_categoria'])) {
            throw ValidationException::withMessages([
                'id_categoria' => 'La categoría seleccionada no existe.'
            ]);
        }

        if (isset($data['id_proveedor']) &&
            !$this->proveedorRepository->getById((int) $data['id_proveedor'])) {
            throw ValidationException::withMessages([
                'id_proveedor' => 'El proveedor seleccionado no existe.'
            ]);
        }

        if (isset($data['fecha_vencimiento']) &&
            $data['fecha_vencimiento'] !== null) {
            try {
                Carbon::parse($data['fecha_vencimiento']);
            } catch (\Exception $e) {
                throw ValidationException::withMessages([
                    'fecha_vencimiento' => 'La fecha de vencimiento no es válida.'
                ]);
            }
        }
    }

    // Comprobar que el código no esté repetido
    private function validarCodigoUnico(string $codigo, ?int $idExcluir = null): void
    {
        $productos = $this->productoRepository->findByCodigo($codigo);

        foreach ($productos as $producto) {
            if ($producto->id_producto != $idExcluir) {
                throw ValidationException::withMessages([
                    'codigo' => 'Ya existe un producto registrado con ese código.'
                ]);
            }
        }
    }
}

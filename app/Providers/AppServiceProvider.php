<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Interfaces
use App\Interfaces\AccesoInterface;
use App\Interfaces\CategoriaInterface;
use App\Interfaces\CompraInterface;
use App\Interfaces\DetalleCompraInterface;
use App\Interfaces\DetalleVentaInterface;
use App\Interfaces\MovimientoStockInterface;
use App\Interfaces\NotificacionInterface;
use App\Interfaces\ProductoInterface;
use App\Interfaces\ProveedorInterface;
use App\Interfaces\RecuperacionContraseñaInterface;
use App\Interfaces\RolInterface;
use App\Interfaces\UsuarioInterface;
use App\Interfaces\VentaInterface;

// Repositorios
use App\Repositories\AccesoRepository;
use App\Repositories\CategoriaRepository;
use App\Repositories\CompraRepository;
use App\Repositories\DetalleCompraRepository;
use App\Repositories\DetalleVentaRepository;
use App\Repositories\MovimientoStockRepository;
use App\Repositories\NotificacionRepository;
use App\Repositories\ProductoRepository;
use App\Repositories\ProveedorRepository;
use App\Repositories\RecuperacionContraseñaRepository;
use App\Repositories\RolRepository;
use App\Repositories\UsuarioRepository;
use App\Repositories\VentaRepository;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        // Accesos
        $this->app->bind(
            AccesoInterface::class,
            AccesoRepository::class
        );

        // Categorías
        $this->app->bind(
            CategoriaInterface::class,
            CategoriaRepository::class
        );

        // Compras
        $this->app->bind(
            CompraInterface::class,
            CompraRepository::class
        );

        // Detalles de compra
        $this->app->bind(
            DetalleCompraInterface::class,
            DetalleCompraRepository::class
        );

        // Detalles de venta
        $this->app->bind(
            DetalleVentaInterface::class,
            DetalleVentaRepository::class
        );

        // Movimientos de stock
        $this->app->bind(
            MovimientoStockInterface::class,
            MovimientoStockRepository::class
        );

        // Notificaciones
        $this->app->bind(
            NotificacionInterface::class,
            NotificacionRepository::class
        );

        // Productos
        $this->app->bind(
            ProductoInterface::class,
            ProductoRepository::class
        );

        // Proveedores
        $this->app->bind(
            ProveedorInterface::class,
            ProveedorRepository::class
        );

        // Recuperación de contraseña
        $this->app->bind(
            RecuperacionContraseñaInterface::class,
            RecuperacionContraseñaRepository::class
        );

        // Roles
        $this->app->bind(
            RolInterface::class,
            RolRepository::class
        );

        // Usuarios
        $this->app->bind(
            UsuarioInterface::class,
            UsuarioRepository::class
        );

        // Ventas
        $this->app->bind(
            VentaInterface::class,
            VentaRepository::class
        );
    }

    
    public function boot(): void
    {
        //
    }
}

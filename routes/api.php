<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccesosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\MovimientosStockController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RecuperacionContraseñaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;


/*
|--------------------------------------------------------------------------
| RUTAS PERSONALIZADAS
|--------------------------------------------------------------------------
| Se colocan antes de apiResource para evitar conflictos.
*/


// ACCESOS
Route::prefix('accesos/buscar')->group(function () {
    Route::get('/usuario/{id_usuario}', [AccesosController::class, 'findByUsuario']);
    Route::get('/dispositivo/{dispositivo}', [AccesosController::class, 'findByDispositivo']);
    Route::get('/navegador/{navegador}', [AccesosController::class, 'findByNavegador']);
    Route::get('/ubicacion/{ubicacion}', [AccesosController::class, 'findByUbicacion']);
    Route::get('/fecha/{fechaIngreso}/{fechaSalida}', [AccesosController::class, 'findByFecha']);
    Route::get('/estado/{estado}', [AccesosController::class, 'findByEstado']);
});


// CATEGORÍAS
Route::prefix('categorias/buscar')->group(function () {
    Route::get('/nombre/{nombreCategoria}', [CategoriaController::class, 'findByNombreCategoria']);
    Route::get('/descripcion/{descripcion}', [CategoriaController::class, 'findByDescripcion']);
    Route::get('/estado/{estado}', [CategoriaController::class, 'findByEstado']);
});


// COMPRAS
Route::prefix('compras/buscar')->group(function () {
    Route::get('/total/{total}', [CompraController::class, 'findByTotal']);
    Route::get('/estado/{estado}', [CompraController::class, 'findByEstado']);
    Route::get('/usuario/{id_usuario}', [CompraController::class, 'findByUsuario']);
    Route::get('/proveedor/{id_proveedor}', [CompraController::class, 'findByProveedor']);
});


// DETALLES DE COMPRA
Route::prefix('detalles-compras/buscar')->group(function () {
    Route::get('/compra/{id_compra}', [DetalleCompraController::class, 'findByCompra']);
    Route::get('/producto/{id_producto}', [DetalleCompraController::class, 'findByProducto']);
    Route::get('/cantidad/{cantidad}', [DetalleCompraController::class, 'findByCantidad']);
    Route::get('/precio-compra/{precioCompra}', [DetalleCompraController::class, 'findByPrecioCompra']);
    Route::get('/subtotal/{subtotal}', [DetalleCompraController::class, 'findBySubtotal']);
});


// DETALLES DE VENTA
Route::prefix('detalles-ventas/buscar')->group(function () {
    Route::get('/venta/{id_venta}', [DetalleVentaController::class, 'findByVenta']);
    Route::get('/producto/{id_producto}', [DetalleVentaController::class, 'findByProducto']);
    Route::get('/cantidad/{cantidad}', [DetalleVentaController::class, 'findByCantidad']);
    Route::get('/precio-unitario/{precioUnitario}', [DetalleVentaController::class, 'findByPrecioUnitario']);
    Route::get('/subtotal/{subtotal}', [DetalleVentaController::class, 'findBySubtotal']);
});


// MOVIMIENTOS DE STOCK
Route::prefix('movimientos-stock/buscar')->group(function () {
    Route::get('/producto/{id_producto}', [MovimientosStockController::class, 'findByProducto']);
    Route::get('/usuario/{id_usuario}', [MovimientosStockController::class, 'findByUsuario']);
    Route::get('/proveedor/{id_proveedor}', [MovimientosStockController::class, 'findByProveedor']);
    Route::get('/compra/{id_compra}', [MovimientosStockController::class, 'findByCompra']);
    Route::get('/venta/{id_venta}', [MovimientosStockController::class, 'findByVenta']);
    Route::get('/tipo/{tipoMovimiento}', [MovimientosStockController::class, 'findByTipoMovimiento']);
    Route::get('/cantidad/{cantidad}', [MovimientosStockController::class, 'findByCantidad']);
    Route::get('/stock-antes/{stockAntes}', [MovimientosStockController::class, 'findByStockAntes']);
    Route::get('/stock-despues/{stockDespues}', [MovimientosStockController::class, 'findByStockDespues']);
    Route::get('/motivo/{motivo}', [MovimientosStockController::class, 'findByMotivo']);
});


// NOTIFICACIONES
Route::prefix('notificaciones/buscar')->group(function () {
    Route::get('/usuario/{id_usuario}', [NotificacionesController::class, 'findByIdUsuario']);
    Route::get('/titulo/{titulo}', [NotificacionesController::class, 'findByTitulo']);
    Route::get('/mensaje/{mensaje}', [NotificacionesController::class, 'findByMensaje']);
    Route::get('/leido/{leido}', [NotificacionesController::class, 'findByLeido']);
    Route::get('/producto/{id_producto}', [NotificacionesController::class, 'findByIdProducto']);
    Route::get('/fecha/{fecha}', [NotificacionesController::class, 'findByFecha']);
    Route::get('/tipo-alerta/{tipo_alerta}', [NotificacionesController::class, 'findByTipoAlerta']);
});


// PRODUCTOS
Route::prefix('productos/buscar')->group(function () {
    Route::get('/codigo/{codigo}', [ProductoController::class, 'findByCodigo']);
    Route::get('/nombre/{nombre}', [ProductoController::class, 'findByNombre']);
    Route::get('/descripcion/{descripcion}', [ProductoController::class, 'findByDescripcion']);
    Route::get('/marca/{marca}', [ProductoController::class, 'findByMarca']);
    Route::get('/precio-compra/{precioCompra}', [ProductoController::class, 'findByPrecioCompra']);
    Route::get('/precio-venta/{precioVenta}', [ProductoController::class, 'findByPrecioVenta']);
    Route::get('/stock-actual/{stockActual}', [ProductoController::class, 'findByStockActual']);
    Route::get('/stock-minimo/{stockMinimo}', [ProductoController::class, 'findByStockMinimo']);
    Route::get('/fecha-vencimiento/{fechaVencimiento}', [ProductoController::class, 'findByFechaVencimiento']);
    Route::get('/estado/{estado}', [ProductoController::class, 'findByEstado']);
    Route::get('/categoria/{id_categoria}', [ProductoController::class, 'findByCategoria']);
    Route::get('/proveedor/{id_proveedor}', [ProductoController::class, 'findByProveedor']);
});


// PROVEEDORES
Route::prefix('proveedores/buscar')->group(function () {
    Route::get('/nombre/{nombre}', [ProveedorController::class, 'findByNombre']);
    Route::get('/contacto/{contacto}', [ProveedorController::class, 'findByContacto']);
    Route::get('/correo/{correo}', [ProveedorController::class, 'findByCorreo']);
    Route::get('/telefono/{telefono}', [ProveedorController::class, 'findByTelefono']);
    Route::get('/direccion/{direccion}', [ProveedorController::class, 'findByDireccion']);
    Route::get('/estado/{estado}', [ProveedorController::class, 'findByEstado']);
});


// RECUPERACIÓN DE CONTRASEÑA
Route::prefix('recuperacion-contrasenas/buscar')->group(function () {
    Route::get('/usuario/{id_usuario}', [RecuperacionContrasenaController::class, 'findByUsuario']);
    Route::get('/codigo/{codigo}', [RecuperacionContrasenaController::class, 'findByCodigo']);
    Route::get('/fecha-expiracion/{fechaExpiracion}', [RecuperacionContrasenaController::class, 'findByFechaExpiracion']);
    Route::get('/usado/{usado}', [RecuperacionContrasenaController::class, 'findByUsado']);
});


// ROLES
Route::prefix('roles/buscar')->group(function () {
    Route::get('/nombre/{nombreRol}', [RolController::class, 'findByNombreRol']);
    Route::get('/descripcion/{descripcion}', [RolController::class, 'findByDescripcionRol']);
});


// USUARIOS
Route::prefix('usuarios/buscar')->group(function () {
    Route::get('/nombre/{nombre}', [UsuarioController::class, 'findByNombre']);
    Route::get('/email/{correo}', [UsuarioController::class, 'findByEmail']);
    Route::get('/estado/{estado}', [UsuarioController::class, 'findByEstado']);
    Route::get('/intentos/{intentos}', [UsuarioController::class, 'findByIntentos']);
    Route::get('/rol/{id_rol}', [UsuarioController::class, 'findByRol']);
});


// VENTAS
Route::prefix('ventas/buscar')->group(function () {
    Route::get('/nombre-factura/{nombreFactura}', [VentaController::class, 'findByNombreFactura']);
    Route::get('/descuento/{descuento}', [VentaController::class, 'findByDescuento']);
    Route::get('/iva/{iva}', [VentaController::class, 'findByIva']);
    Route::get('/total/{total}', [VentaController::class, 'findByTotal']);
    Route::get('/estado/{estado}', [VentaController::class, 'findByEstado']);
    Route::get('/usuario/{id_usuario}', [VentaController::class, 'findByIdUsuario']);
});


/*
|--------------------------------------------------------------------------
| RUTAS CRUD
|--------------------------------------------------------------------------
*/


Route::apiResource('accesos', AccesosController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('compras', CompraController::class);
Route::apiResource('detalles-compras', DetalleCompraController::class);
Route::apiResource('detalles-ventas', DetalleVentaController::class);
Route::apiResource('movimientos-stock', MovimientosStockController::class);
Route::apiResource('notificaciones', NotificacionesController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('proveedores', ProveedorController::class);
Route::apiResource('recuperacion-contrasenas', RecuperacionContrasenaController::class);
Route::apiResource('roles', RolController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('ventas', VentaController::class);

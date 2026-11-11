<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_productos AS
            SELECT
                p.id_producto,
                p.codigo,
                p.nombre,
                p.descripcion,
                p.marca,
                p.precio_compra,
                p.precio_venta,
                p.stock_actual,
                p.stock_minimo,
                p.fecha_vencimiento,
                p.estado,
                p.id_categoria,
                c.nombre_categoria,
                p.id_proveedor,
                pr.nombre_proveedor
            FROM productos p
            LEFT JOIN categorias c ON p.id_categoria = c.id_categoria
            LEFT JOIN proveedores pr ON p.id_proveedor = pr.id_proveedor
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_productos");
    }
};
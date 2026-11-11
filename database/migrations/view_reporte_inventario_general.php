<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
           CREATE OR REPLACE VIEW view_reporte_inventario_general AS
           SELECT
              p.id_producto,
              p.codigo,
              p.nombre,
              c.nombre_categoria,
              p.stock_actual,
              p.stock_minimo,
              p.precio_compra,
              p.precio_venta,
              (p.stock_actual * p.precio_compra) AS valor_inventario
            FROM productos p
            LEFT JOIN categorias c ON p.id_categoria = c.id_categoria;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_inventario_general");
    }
};
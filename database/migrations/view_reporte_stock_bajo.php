<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_reporte_stock_bajo AS
            SELECT
                p.id_producto,
                p.codigo,
                p.nombre,
                c.nombre_categoria,
                p.stock_actual,
                p.stock_minimo
            FROM productos p
            LEFT JOIN categorias c ON p.id_categoria = c.id_categoria
            WHERE p.stock_actual <= p.stock_minimo
              AND p.stock_actual > 0
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_stock_bajo");
    }
};
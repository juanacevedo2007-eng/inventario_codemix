<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_reporte_inventario_por_categoria AS
            SELECT
                c.id_categoria,
                c.nombre_categoria,
                COUNT(p.id_producto) AS cantidad_productos,
                COALESCE(SUM(p.stock_actual), 0) AS unidades_disponibles
            FROM categorias c
            LEFT JOIN productos p ON c.id_categoria = p.id_categoria
            GROUP BY c.id_categoria, c.nombre_categoria
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_inventario_por_categoria");
    }
};
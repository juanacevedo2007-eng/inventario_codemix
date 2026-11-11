<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_dashboard_indicadores AS
            SELECT
                (SELECT COUNT(*) FROM productos) AS total_productos,
                (SELECT COUNT(*) FROM proveedores) AS total_proveedores,
                (SELECT COUNT(*) FROM usuarios) AS total_usuarios,
                (SELECT COUNT(*) FROM ventas) AS total_ventas,
                (SELECT COALESCE(SUM(total), 0) FROM ventas) AS ingresos_totales,
                (SELECT COUNT(*) FROM productos
                 WHERE stock_actual <= stock_minimo) AS productos_bajo_stock
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_dashboard_indicadores");
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_reporte_ventas_mensuales AS
            SELECT
                YEAR(created_at) AS anio,
                MONTH(created_at) AS mes,
                COUNT(*) AS cantidad_ventas,
                SUM(total) AS total_ventas
            FROM ventas
            GROUP BY YEAR(created_at), MONTH(created_at)
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_ventas_mensuales");
    }
};
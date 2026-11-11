<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
        CREATE OR REPLACE VIEW view_reporte_ventas_mensuales AS
        SELECT
         EXTRACT(YEAR FROM created_at)::integer AS anio,
         EXTRACT(MONTH FROM created_at)::integer AS mes,
         COUNT(*) AS cantidad_ventas,
         SUM(total) AS total_ventas
        FROM ventas
        GROUP BY
        EXTRACT(YEAR FROM created_at),
        EXTRACT(MONTH FROM created_at);
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_ventas_mensuales");
    }
};
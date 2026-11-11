<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
        CREATE OR REPLACE VIEW view_reporte_ventas_diarias AS
        SELECT
           created_at::date AS fecha,
           COUNT(*) AS cantidad_ventas,
           SUM(total) AS total_ventas
        FROM ventas
        GROUP BY created_at::date;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_ventas_diarias");
    }
};
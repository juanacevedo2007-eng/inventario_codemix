<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
         CREATE OR REPLACE VIEW view_dashboard_ventas_ultimos_7_dias AS
           SELECT
             created_at::date AS fecha,
             COUNT(*) AS cantidad_ventas,
             SUM(total) AS total_ventas
            FROM ventas
            WHERE created_at >= CURRENT_DATE - INTERVAL '6 days'
            GROUP BY created_at::date;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_dashboard_ventas_ultimos_7_dias");
    }
};
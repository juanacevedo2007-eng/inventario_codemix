<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_reporte_ventas_diarias AS
            SELECT
                DATE(created_at) AS fecha,
                COUNT(*) AS cantidad_ventas,
                SUM(total) AS total_ventas
            FROM ventas
            GROUP BY DATE(created_at)
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_ventas_diarias");
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_dashboard_ventas_ultimos_7_dias AS
            SELECT
                DATE(created_at) AS fecha,
                COUNT(*) AS cantidad_ventas,
                SUM(total) AS total_ventas
            FROM ventas
            WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
            GROUP BY DATE(created_at)
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_dashboard_ventas_ultimos_7_dias");
    }
};
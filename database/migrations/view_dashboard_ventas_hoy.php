<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_dashboard_ventas_hoy AS
            SELECT
                COUNT(*) AS cantidad_ventas,
                COALESCE(SUM(total), 0) AS total_ventas
            FROM ventas
            WHERE DATE(created_at) = CURDATE()
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_dashboard_ventas_hoy");
    }
};
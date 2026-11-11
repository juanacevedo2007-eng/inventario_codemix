<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_reporte_productos_vencimiento AS
            SELECT
                p.id_producto,
                p.codigo,
                p.nombre,
                p.fecha_vencimiento,
                p.stock_actual
            FROM productos p
            WHERE p.fecha_vencimiento IS NOT NULL
            ORDER BY p.fecha_vencimiento ASC
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_productos_vencimiento");
    }
};
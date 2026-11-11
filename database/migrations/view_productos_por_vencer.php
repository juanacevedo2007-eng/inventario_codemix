<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
        CREATE OR REPLACE VIEW view_productos_por_vencer AS
        SELECT
            id_producto,
            codigo,
            nombre,
            fecha_vencimiento,
            stock_actual
        FROM productos
        WHERE fecha_vencimiento IS NOT NULL
        AND fecha_vencimiento BETWEEN CURRENT_DATE
        AND CURRENT_DATE + INTERVAL '30 days';
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_productos_por_vencer");
    }
};
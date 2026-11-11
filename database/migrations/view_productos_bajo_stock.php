<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
        CREATE OR REPLACE VIEW view_productos_bajo_stock AS
        SELECT
            id_producto,
            codigo,
            nombre,
            stock_actual,
            stock_minimo,
            precio_venta
        FROM productos
        WHERE stock_actual <= stock_minimo
        AND stock_actual > 0;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_productos_bajo_stock");
    }
};
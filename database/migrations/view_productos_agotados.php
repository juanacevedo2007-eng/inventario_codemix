<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_productos_agotados AS
            SELECT
                id_producto,
                codigo,
                nombre,
                stock_actual,
                stock_minimo
            FROM productos
            WHERE stock_actual = 0
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_productos_agotados");
    }
};
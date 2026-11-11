<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_ventas AS
            SELECT
                v.id_venta,
                v.nombre_factura,
                v.descuento,
                v.iva,
                v.total,
                v.estado,
                v.id_usuario,
                u.nombre AS nombre_usuario
            FROM ventas v
            LEFT JOIN usuarios u ON v.id_usuario = u.id_usuario
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_ventas");
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
        CREATE OR REPLACE VIEW view_dashboard_movimientos_recientes AS
        SELECT
            m.id_movimiento_stock,
            p.nombre AS nombre_producto,
            u.nombre AS nombre_usuario,
            m.tipo_movimiento,
            m.cantidad,
            m.motivo
        FROM movimientos_stock m
        INNER JOIN productos p ON m.id_producto = p.id_producto
        LEFT JOIN usuarios u ON m.id_usuario = u.id_usuario;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_dashboard_movimientos_recientes");
    }
};
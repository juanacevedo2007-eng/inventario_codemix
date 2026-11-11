<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
        CREATE OR REPLACE VIEW view_detalles_ventas AS
        SELECT
            dv.id_detalle_venta,
            dv.id_venta,
            dv.id_producto,
            p.nombre AS nombre_producto,
            dv.cantidad,
            dv.precio_unitario,
            dv.subtotal
        FROM detalles_venta dv
        INNER JOIN productos p ON dv.id_producto = p.id_producto;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_detalles_ventas");
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_detalles_compras AS
            SELECT
                dc.id_detalle_compra,
                dc.id_compra,
                dc.id_producto,
                p.nombre AS nombre_producto,
                dc.cantidad,
                dc.precio_compra,
                dc.subtotal
            FROM detalles_compra dc
            INNER JOIN productos p ON dc.id_producto = p.id_producto
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_detalles_compras");
    }
};
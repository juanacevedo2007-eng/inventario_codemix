<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_dashboard_compras_recientes AS
            SELECT
                c.id_compra,
                p.nombre_proveedor,
                u.nombre AS nombre_usuario,
                c.total,
                c.estado
            FROM compras c
            INNER JOIN proveedores p ON c.id_proveedor = p.id_proveedor
            LEFT JOIN usuarios u ON c.id_usuario = u.id_usuario
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_dashboard_compras_recientes");
    }
};
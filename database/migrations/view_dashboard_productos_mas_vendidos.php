<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
         CREATE OR REPLACE VIEW view_dashboard_productos_mas_vendidos AS
          SELECT
             p.id_producto,
             p.nombre,
             SUM(dv.cantidad) AS cantidad_vendida,
             SUM(dv.subtotal) AS total_vendido
            FROM detalles_venta dv
            INNER JOIN productos p ON dv.id_producto = p.id_producto
            GROUP BY p.id_producto, p.nombre;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_dashboard_productos_mas_vendidos");
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
           CREATE OR REPLACE VIEW view_reporte_productos_menos_vendidos AS
           SELECT
              p.id_producto,
              p.codigo,
              p.nombre,
              COALESCE(SUM(dv.cantidad), 0) AS cantidad_vendida
            FROM productos p
            LEFT JOIN detalles_venta dv ON p.id_producto = dv.id_producto
            GROUP BY p.id_producto, p.codigo, p.nombre;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_productos_menos_vendidos");
    }
};
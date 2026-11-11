<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
           CREATE OR REPLACE VIEW view_reporte_compras_por_proveedor AS
           SELECT
              p.id_proveedor,
              p.nombre_proveedor,
              COUNT(c.id_compra) AS cantidad_compras,
              COALESCE(SUM(c.total), 0) AS total_compras
           FROM proveedores p
           LEFT JOIN compras c ON p.id_proveedor = c.id_proveedor
           GROUP BY p.id_proveedor, p.nombre_proveedor;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_reporte_compras_por_proveedor");
    }
};
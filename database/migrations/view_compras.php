<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW view_compras AS
            SELECT
              c.id_compra,
              c.id_proveedor,
              p.nombre_proveedor,
              c.id_usuario,
              u.nombre AS nombre_usuario,
              c.total,
              c.estado
            FROM compras c
            INNER JOIN proveedores p ON c.id_proveedor = p.id_proveedor
            LEFT JOIN usuarios u ON c.id_usuario = u.id_usuario;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_compras");
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
          CREATE OR REPLACE VIEW view_proveedores AS
          SELECT
            id_proveedor,
            nombre_proveedor,
            contacto,
            telefono,
            correo,
            direccion,
            estado
          FROM proveedores;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_proveedores");
    }
};
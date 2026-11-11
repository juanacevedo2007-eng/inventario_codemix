<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW view_accesos AS
            SELECT
              a.id_acceso,
              a.id_usuario,
              u.nombre,
              a.dispositivo,
              a.navegador,
              a.ubicacion,
              a.fecha_ingreso,
              a.fecha_salida,
              a.estado
            FROM accesos a
            INNER JOIN usuarios u ON a.id_usuario = u.id_usuario;
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_accesos");
    }
};
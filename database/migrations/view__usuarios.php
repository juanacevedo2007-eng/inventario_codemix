
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_usuarios AS
            SELECT
                u.id_usuario,
                u.nombre,
                u.email,
                u.estado,
                u.intentos,
                u.id_rol,
                r.nombre_rol
            FROM usuarios u
            INNER JOIN roles r
                ON u.id_rol = r.id_rol
        ");
    }

    public function down(): void
    {
        DB::statement("
            DROP VIEW IF EXISTS view_usuarios
        ");
    }
};

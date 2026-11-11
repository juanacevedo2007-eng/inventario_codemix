<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_notificaciones AS
            SELECT
                n.id_notificacion,
                n.id_usuario,
                u.nombre AS nombre_usuario,
                n.id_producto,
                p.nombre AS nombre_producto,
                n.titulo,
                n.mensaje,
                n.leido,
                n.fecha,
                n.tipo_alerta
            FROM notificaciones n
            LEFT JOIN usuarios u ON n.id_usuario = u.id_usuario
            LEFT JOIN productos p ON n.id_producto = p.id_producto
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_notificaciones");
    }
};
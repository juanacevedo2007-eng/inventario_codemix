<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->decimal('total', 12, 2)->default(0);
            $table->enum('estado',['Pendiente','Recibido','Anulada'])->default('Pendiente');
            $table->unsignedBigInteger('id_proveedor');
            $table->unsignedBigInteger('id_usuario');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores')->onDelete('restrict');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('compras');
    }
};

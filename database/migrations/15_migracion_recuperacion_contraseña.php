<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recuperacion_contraseña', function (Blueprint $table) {
            $table->id(id_recuperacion_contraseña);
            $table->unsignedBigInteger('id_usuario');
            $table->string('codigo', 255);
            $table->dateTime('fecha_expiracion');
            $table->boolean('usado')->default(false);
            

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('recuperacion_contraseña');
    }
};

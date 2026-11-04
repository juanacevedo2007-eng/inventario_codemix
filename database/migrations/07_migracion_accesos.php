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
        Schema::create('accesos', function (Blueprint $table) {
            $table->id('id_acceso');
            $table->unsignedBigInteger('id_usuario');
            $table->string('dispositivo', 100)->nullable();
            $table->string('navegador', 100)->nullable();
            $table->string('ubicacion', 100)->nullable();
            $table->date('fecha_ingreso');
            $table->date('fecha_salida')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_usuario')->references('id')->on('id_usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accesos');
    }
};
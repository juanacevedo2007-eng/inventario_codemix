<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id('id_reporte');
            $table->string('tipo_reporte', 100);
            $table->enum('formato', ['pdf', 'excel']);
            $table->dateTime('fecha_descarga')->nullable();
            $table->unsignedBigInteger('id_usuario');
            
            
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('reportes');   
    }
};

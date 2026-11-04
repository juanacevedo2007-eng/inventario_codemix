<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('alertas', function (Blueprint $table){
            $table->id('id_alerta');
            $table->unsignedBigInteger('id_producto');
            $table->enum('tipo_alerta', ['Bajo Stock', 'Agotado', 'Proximo Vencimiento']);
            $table->string('mensaje', 255);
            $table->enum('estado', ['Pendiente', 'Leida', 'Atendida'])->default('Pendiente');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('alertas');
        
    }
};

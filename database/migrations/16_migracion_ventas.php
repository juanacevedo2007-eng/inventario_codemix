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
        Schema::create('ventas',function(Blueprint $table){     

         $table->id('id_venta');
         $table->string('nombre_factura',100)->unique();
         $table->decimal('descuento', 12, 2);
         $table->decimal('iva', 12, 2);
         $table->decimal('total', 12, 2);
         $table->enum('estado', ['Pendiente', 'Pagado', 'Anulada'])->default('Pendiente');
         $table->unsignedBigInteger('id_usuario');
        
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
        schema::dropIfExists('ventas');
    }
};

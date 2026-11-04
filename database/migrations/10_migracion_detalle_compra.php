<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
         Schema::create('detalles_compra', function (Blueprint $table) {

         $table->id('id_detalle_compra');
         $table->unsignedBigInteger('id_compra');
         $table->unsignedBigInteger('id_producto');
         $table->unsignedInteger('cantidad');
         $table->decimal('precio_compra', 12, 2);
         $table->decimal('subtotal', 12, 2);

         $table->timestamps();
         $table->softDeletes();

         $table->foreign('id_compra')->references('id_compra')->on('compras')->onDelete('cascade');
         $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
         });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    schema::dropIfExists('detalles_compra');

    }
};

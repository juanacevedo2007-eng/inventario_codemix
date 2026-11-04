<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalles_venta', function (Blueprint $table) {
            $table->id('id_detalle_venta');
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('cantidad');
            $table->decimal('precio_unitario', 12, 2);
            $table->decimal('subtotal', 12, 2);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_venta')->references('id_venta')->on('ventas')->onDelete('restrict');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('restrict');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('detalles_venta');
    }
};

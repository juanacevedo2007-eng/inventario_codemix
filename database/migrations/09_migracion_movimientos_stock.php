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
        Schema::create('movimientos_stock', function (Blueprint $table) {
            $table->id(id_movimiento_stock);
            $table->unsignedBigInteger(id_producto);
            $table->unsignedBigInteger(id_usuario);
            $table->unsignedBigInteger(id_proveedor);
            $table->unsignedBigInteger(id_compra);
            $table->unsignedBigInteger(id_venta);
            $table->enum('tipo_movimiento', ['Entrada', 'Salida', 'Ajuste']);
            $table->unsignedInteger('cantidad');
            $table->string('stock_antes', 100);
            $table->string('stock_despues', 100);
            $table->string('motivo', 255)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores')->onDelete('cascade');
            $table->foreign('id_compra')->references('id_compra')->on('compras')->onDelete('cascade');
            $table->foreign('id_venta')->references('id_venta')->on('ventas')->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('movimientos_stock');
    }
};

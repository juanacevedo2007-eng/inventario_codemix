<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
        $table->id('id_producto');
        $table->string('codigo', 30)->unique();
        $table->string('nombre', 120);
        $table->string('descripcion', 255)->nullable();
        $table->string('marca', 100)->nullable();
        $table->decimal('precio_compra', 12, 2);
        $table->decimal('precio_venta', 12, 2);
        $table->unsignedBigInteger('stock_actual');
        $table->unsignedBigInteger('stock_minimo');
        $table->dateTime('fecha_vencimiento')->nullable();
        $table->enum('estado', ['Activo', 'Inactivo']);
        $table->unsignedBigInteger('id_categoria');
        $table->unsignedBigInteger('id_proveedor');

        $table->timestamps();
        $table->softDeletes();

        $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade');
        $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    schema::dropIfExists('productos');

    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id(id_proveedor);
            $table->string('nombre_proveedor', 120);
            $table->string('contacto', 120)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('correo', 120)->nullable();
            $table->string('direccion', 200)->nullable();
            $table->enum('estado', ['Activo', 'Inactivo'])->default(activo);

            $table->timestamps();
            $table->softDeletes();

        });
    }


    public function down(): void
    {
     schema::dropIfExists('proveedores');

    }
};

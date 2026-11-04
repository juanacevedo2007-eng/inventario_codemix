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
        Schema::create('configuraciones', function (Blueprint $table){
            $table->id('id_configuracion');
            $table->string('nombre_empresa', 100)->default('Las 4 Barajas');
            $table->string('nit',30)->nullable();
            $table->string('direccion', 225);
            $table->string('telefono', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('pagina_web', 100)->nullable();
            $table->string('moneda', 20)->default('COP');
            $table->string('zona_horaria', 50)->default('America/Bogota');
            $table->string('formato_fecha', 20)->default('d/m/Y');
            $table->string('formato_hora', 20)->default('H:i:s');
            $table->unsignedSmallInteger('intentos_maximos')->default(5);
            $table->unsignedSmallInteger('tiempo_inactividad')->default(30);
            $table->boolean('productos_vencer')->default(true);
            $table->boolean('productos_agotados')->default(true);
            $table->boolean('bajo_stock')->default(true);
            $table->boolean('movimientos_stock')->default(true);
            $table->boolean('ventas_dia')->default(true);
            $table->boolean('respaldo')->default(true);
            $table->string('version_sistema', 20)->nullable();
            $table->string('licencia', 100)->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuraciones');
    }
};

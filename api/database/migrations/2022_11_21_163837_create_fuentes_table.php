<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuentes', function (Blueprint $table) {
            $table->id();
            $table->text('nombre')->default('MercadoPublico');
            $table->text('link')->default('https://www.mercadopublico.cl/Home/BusquedaLicitacion');
            $table->string('alias_portal', 10)->default('MP');
            $table->string('icon', 80)->default('www.mercadopublico.cl/Home/Imagenes/NuevoHome/logo-chilecompra-original.png');
            $table->string('color', 10)->default('#0667B4')->comment('El color debe ser hexadecimal, ejemplo: "#000000"');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuentes');
    }
};

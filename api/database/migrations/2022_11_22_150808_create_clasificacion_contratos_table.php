<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasificacionContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clasificacion_contratos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_contrato')->nullable();
            $table->foreign('id_contrato')
                ->references('id')
                ->on('contratos')
                ->onDelete('set null');
            
            
            $table->unsignedBigInteger('id_sub_categoria')->nullable();
            $table->foreign('id_sub_categoria')
                ->references('id')
                ->on('sub_categorias')
                ->onDelete('set null');

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
        Schema::dropIfExists('clasificacion_contratos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_seguimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->foreign('id_usuario')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
            $table->unsignedBigInteger('id_contrato')->nullable();
            $table->foreign('id_contrato')
                ->references('id')
                ->on('contratos')
                ->onDelete('set null');
            $table->boolean('is_novedades');
            $table->integer('numero_documentos')->comment('Numero de documentos del proceso cuando se agrego a seguimiento');
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
        Schema::dropIfExists('contratos_seguimientos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoHasPerfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_has_perfiles', function (Blueprint $table) {
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
            $table->unsignedBigInteger('id_perfil')->nullable();
            $table->foreign('id_perfil')
                ->references('id')
                ->on('grupo_filtro_usuarios')
                ->onDelete('set null');
            $table->string('leido', '1');//Cambiar a bite
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
        Schema::dropIfExists('contrato_has_perfiles');
    }
}

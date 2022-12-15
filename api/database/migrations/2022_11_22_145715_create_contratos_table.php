<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->text('entidad_contratante');
            $table->text('codigo_proceso')->comment('Numero del proceso');
            $table->text('objeto');
            $table->text('modalidad')->comment('Modalidad del proceso');
            $table->text('ubicacion')->comment('Ubicacion concatenando departamento:municipio');
            $table->text('link')->comment('Link de la fuente');
            $table->text('random')->nullable();
            $table->string('estado_agrupado')->comment('Estado agrupado de Licitaciones');
            $table->integer('unspsc');
            $table->string('unspsc_adicionales')->comment('Unspsc adicionales separados por coma');
            $table->integer('numero_documentos');
            $table->bigInteger('valor')->nullable();
            $table->string('valor_texto')->nullable();
            $table->date('fecha_actualizacion_estado')->comment('Esta fecha solo debe actualizarse cuando cambie el estado_agrupado');
            $table->date('fecha_last_update_seguimiento')->comment('Fecha utilizada para manejar el seguimiento, con esto sabemos la ultima vez que se miro el contrato desde seguimiento');
            $table->date('fecha_publicacion');
            $table->date('fecha_vencimiento')->comment('Fecha maxima para postularse');
            $table->string('estado_proceso')->comment('Texto del campo estado del proceso de la fuente');

            $table->unsignedBigInteger('id_user_clasificador')->nullable();
            $table->foreign('id_user_clasificador')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->unsignedBigInteger('id_fuente_contract')->nullable();
            $table->foreign('id_fuente_contract')
                ->references('id')
                ->on('fuentes')
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
        Schema::dropIfExists('contratos');
    }
}

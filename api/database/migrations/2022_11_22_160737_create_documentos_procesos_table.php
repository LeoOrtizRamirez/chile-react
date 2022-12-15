<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosProcesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_procesos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_contrato')->nullable();
            $table->foreign('id_contrato')
                ->references('id')
                ->on('contratos')
                ->onDelete('set null');
            $table->text('identificador_fuente')->comment('Fecha utilizada para manejar el seguimiento, con esto sabemos la ultima vez que se miro el contrato desde seguimiento')->default(null);
            $table->text('namedoc');
            $table->text('descripcion')->default(null);
            $table->text('ruta');
            $table->date('fecha_fuente')->default(null);
            $table->json('json_adicional')->comment('Este campo contiene data adicional del documento: constancia, token, fecha original, ip_captura, cookies, etc...')->default(null);
            $table->string('extension')->comment('Extension del archivo: pdf, xls, etc..')->default(null);
            $table->string('size')->comment('Peso del archivo en bytes')->default(null);
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
        Schema::dropIfExists('documentos_procesos');
    }
}

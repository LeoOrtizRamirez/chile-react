<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtmlContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('html_contratos', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_contrato')->nullable();
            $table->foreign('id_contrato')
                ->references('id')
                ->on('contratos')
                ->onDelete('set null');

            $table->longtext('html');
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
        Schema::dropIfExists('html_contratos');
    }
}

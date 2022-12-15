<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categorias', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('descripcion')->nullable();
            $table->text('observaciones')->nullable();

            $table->unsignedBigInteger('id_padre_sub_categoria')->nullable();
            $table->foreign('id_padre_sub_categoria')
                ->references('id')
                ->on('sub_categorias')
                ->onDelete('set null');

            $table->string('adt_usuario_modificacion')->nullable();
            $table->date('adt_fecha_modificacion')->nullable();
            $table->string('icon')->nullable();
            $table->integer('orden')->nullable();
            $table->boolean('is_oculto')->nullable();
            
            $table->integer('id_region')->nullable();

            $table->integer('tipo_categoria')->comment('1 = Actividad Economica, 2 = Modalidad , 3 = Ubicación');

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
        Schema::dropIfExists('sub_categorias');
    }
}

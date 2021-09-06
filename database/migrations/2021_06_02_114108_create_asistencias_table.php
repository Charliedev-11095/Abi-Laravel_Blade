<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_asistencia');
            $table->char('asistencia',10)->nullable()->default('Marcada');
            
            $table->bigInteger('relacion_grupo_alumnos')->unsigned()->index()->nullable();
            $table->timestamp('updated_at')->nullable();

            //Forma de referenciar las llaves foraneas
            $table->foreign('relacion_grupo_alumnos')->references('id')->on('grupo_alumnos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
}

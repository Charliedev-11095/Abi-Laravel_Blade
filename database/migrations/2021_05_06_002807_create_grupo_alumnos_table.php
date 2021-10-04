<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_alumnos', function (Blueprint $table) {
            $table->id();
  
            
// Se crean primero las columnas y luego se referencian
//Se crea con bigInteger, por que asi estaban las llaves primarias
            $table->bigInteger('grupos_id')->unsigned()->index()->nullable();
            $table->bigInteger('alumnos_id')->unsigned()->index()->nullable();
            $table->bigInteger('entrenadores_id')->unsigned()->index()->nullable();
            $table->Integer('asistencias')->unsigned()->nullable();
            $table->float('calificacion_asistencias')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->char('estado', 8);


//Forma de referenciar las llaves foraneas
            $table->foreign('grupos_id')->references('id')->on('grupos');
            $table->foreign('alumnos_id')->references('id')->on('alumnos');
            $table->foreign('entrenadores_id')->references('id')->on('entrenadores');
          

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_alumnos');
    }
}

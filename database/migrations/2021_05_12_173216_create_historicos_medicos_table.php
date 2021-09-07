<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricosMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos_medicos', function (Blueprint $table) {
            $table->id();
            $table->float('estatura');
            $table->float('peso');
            $table->float('presion_arterial')->nullable();
           
            $table->char('comentarios', 100)->nullable();
            $table->bigInteger('alumnos_id')->unsigned()->index()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->date('fecha_creacion')->nullable();

//Referencia a la llave foranea
            $table->foreign('alumnos_id')->references('id')->on('alumnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historicos_medicos');
    }
}

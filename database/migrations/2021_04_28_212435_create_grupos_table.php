<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->char('grado', 2);
            $table->char('seccion', 1);
            $table->char('nivel', 10);
            $table->char('descripcion', 100);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->char('lunes', 8)->default('Inactiva')->nullable();
            $table->char('martes', 8)->default('Inactiva')->nullable();
            $table->char('miercoles', 8)->default('Inactiva')->nullable();
            $table->char('jueves', 8)->default('Inactiva')->nullable();
            $table->char('viernes', 8)->default('Inactiva')->nullable();
            $table->char('sabado', 8)->default('Inactiva')->nullable();
            $table->char('domingo', 8)->default('Inactiva')->nullable();

            $table->integer('dias_entrenamiento')->nullable();
            $table->integer('evaluaciones_maximo')->nullable();

            $table->char('estado', 8);
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('alta_usuario')->unsigned()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}

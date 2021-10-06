<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateHistoricosDeportivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos_deportivos', function (Blueprint $table) {
            $table->id();
            //LIDERAZGO, VALORES Y ACTITUDES
            $table->char('comunicacion', 10);
            $table->char('liderazgo', 10);
            $table->char('respeto', 10);
            $table->char('responsabilidad', 10);
            $table->char('participacion', 10);
            $table->char('actitud', 10);
            $table->char('constancia', 10);
            $table->char('compromiso', 10);
            $table->char('trabajo_en_equipo', 10);

           
            //MANEJO DE BALON
            $table->char('mirada_al_frente', 10);
            $table->char('coordinacion_manos_balon', 10);
            $table->char('decision_bajo_presion', 10);
            $table->char('acertividad_en_balon', 10);
            

            //PASES
            $table->char('coordinacion_manos_pase', 10);
            $table->char('rapidez_en_pase', 10);
            $table->char('pase_al_poste', 10);
            $table->char('acertividad_en_pase', 10);
           

            //TRABAJO DE PIES
            $table->char('balance_pies', 10);
            $table->char('pivote', 10);


            //LANZAMIENTO
            $table->char('balance_objetivo', 10);
            $table->char('agarre_balon', 10);
            $table->char('alineacion_al_aro', 10);
            $table->char('entradas_manos', 10);


            //DEFENSA
            $table->char('posicion_cuerpo', 10);
            $table->char('presion_balon', 10);
            $table->char('bloqueo_oponente', 10);
            $table->char('contesta_lanzamiento', 10);


            $table->char('observaciones', 100);
            $table->bigInteger('alumnos_id')->unsigned()->index()->nullable();
            $table->bigInteger('relacion_grupo_alumnos')->unsigned()->index()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->date('fecha_creacion')->nullable();

            //Columnas para alimentar las estadisticas
            $table->int('seccionliderazgo')->nullable();
            $table->int('seccionmanejobalon')->nullable();
            $table->int('seccionpases')->nullable();
            $table->int('seccionpies')->nullable();
            $table->int('seccionlanzamiento')->nullable();
            $table->int('secciondefensa')->nullable();
            $table->int('total_historico')->nullable();

            //Referencia a la llave foranea
            $table->foreign('alumnos_id')->references('id')->on('alumnos');
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
        Schema::dropIfExists('historicos_deportivos');
    }
}

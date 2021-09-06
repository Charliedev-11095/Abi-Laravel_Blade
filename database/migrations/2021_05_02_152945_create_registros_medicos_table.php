<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_medicos', function (Blueprint $table) {
            $table->id();
            $table->float('estatura');
            $table->float('peso');
            $table->float('presion_arterial');
            $table->string('tipo_sanguineo',3);
            $table->integer('edad');
            $table->string('padecimiento',100);
            $table->string('tratamiento',100);
            $table->string('alergia',100);
            $table->string('conducta',60);
            $table->string('impedimento_fisico',150);
            $table->string('condicion_fisica',150);

            $table->bigInteger('alumnos_id')->unsigned()->index()->nullable();


            $table->timestamps();

//Forma de referenciar las llaves foraneas
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
        Schema::dropIfExists('registros_medicos');
    }
}

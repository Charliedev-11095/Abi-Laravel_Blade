<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',30);
            $table->string('apellido_paterno',15);
            $table->string('apellido_materno',15);
            $table->string('calle',30);
            $table->string('numero_interior',7);
            $table->string('numero_exterior',7);
            $table->string('colonia',30);
            $table->string('ciudad',30);
            $table->string('estado',25);
            $table->integer('codigo_postal');
            $table->string('email')->unique();
            $table->string('curp',19);
            $table->date('fecha_de_nacimiento');
            $table->char('telefono',15);
            $table->bigInteger('alta_usuario')->unsigned()->nullable();

            $table->bigInteger('tutores_id')->unsigned()->index()->nullable();

            $table->timestamps();

//Forma de referenciar las llaves foraneas
$table->foreign('tutores_id')->references('id')->on('tutores');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}

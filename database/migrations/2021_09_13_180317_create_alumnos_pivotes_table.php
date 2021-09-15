<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosPivotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos_pivotes', function (Blueprint $table) {
            $table->id();


            $table->bigInteger('alumnos_id')->unsigned()->index()->nullable();
            $table->bigInteger('users_id')->unsigned()->index()->nullable();

            $table->timestamps();


//Forma de referenciar las llaves foraneas
$table->foreign('alumnos_id')->references('id')->on('alumnos');
$table->foreign('users_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos_pivotes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrenadoresPivotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrenadores_pivotes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->index()->nullable();
            $table->bigInteger('entrenadores_id')->unsigned()->index()->nullable();
            
            $table->timestamps();

//Forma de referenciar las llaves foraneas
$table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('entrenadores_pivotes');
    }
}

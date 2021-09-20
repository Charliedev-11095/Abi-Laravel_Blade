<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamEntrenadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_entrenadores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teams_id')->unsigned()->index()->nullable();
            $table->bigInteger('entrenadores_id')->unsigned()->index()->nullable();
            $table->char('status', 8);
            $table->bigInteger('alta_usuario')->unsigned()->nullable();
            $table->timestamps();


            //Forma de referenciar las llaves foraneas
            $table->foreign('teams_id')->references('id')->on('teams');
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
        Schema::dropIfExists('team_entrenadores');
    }
}

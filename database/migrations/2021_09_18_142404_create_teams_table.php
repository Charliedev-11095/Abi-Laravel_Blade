<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->char('nombre', 30);
            $table->char('descripcion', 100);
            $table->string('calle',30)->nullable();
            $table->string('numero_interior',7)->nullable();
            $table->string('numero_exterior',7)->nullable();
            $table->string('colonia',30)->nullable();
            $table->string('ciudad',30)->nullable();
            $table->string('estado',25)->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->string('email_contacto');
            $table->char('telefono',15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}

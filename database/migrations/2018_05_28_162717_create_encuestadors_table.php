<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestadors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cargo');
            $table->integer('localidad_id')->unsigned();
            $table->string('apellido');
            $table->string('nombre');
            $table->integer('dni')->unsigned();
            $table->string('encuesta');
            $table->string('img');
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
        Schema::dropIfExists('encuestadors');
    }
}

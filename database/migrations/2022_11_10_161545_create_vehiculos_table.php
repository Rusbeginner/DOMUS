<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipoequipo_id')->unsigned();
            $table->string('modelo');
            $table->string('chapa');
            $table->integer('numotor');
            $table->integer('numcarroceria');
            $table->integer('ton');
            $table->date('fechafabric');
            $table->double('importe');
            $table->string('numediobasico');
            $table->integer('chofer_id')->unsigned();
            $table->timestamps();
            $table->foreign('tipoequipo_id')->references('id')->on('tipoequipos');
            $table->foreign('chofer_id')->references('id')->on('chofers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehiculos');
    }
};

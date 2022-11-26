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
        Schema::create('aslubricantes', function (Blueprint $table) {
            $table->id('id');
            $table->integer('vehiculo_id')->unsigned();
            $table->integer('lubricante_id')->unsigned();
            $table->double('asignacion');
            $table->date('fechaini');
            $table->date('fechafin');
            $table->timestamps();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->foreign('lubricante_id')->references('id')->on('lubricantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aslubricantes');
    }
};

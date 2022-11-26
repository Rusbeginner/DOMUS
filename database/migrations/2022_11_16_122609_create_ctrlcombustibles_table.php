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
        Schema::create('ctrlcombustibles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehiculo_id')->unsigned();
            $table->integer('combustible_id')->unsigned();
            $table->double('plan');
            $table->double('real')->default(0);
            $table->date('fechaini');
            $table->date('fechafin');
            $table->timestamps();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->foreign('combustible_id')->references('id')->on('combustibles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ctrlcombustibles');
    }
};

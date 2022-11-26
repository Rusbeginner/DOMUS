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
        Schema::create('tarjetamagneticas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notarjeta',11);
            $table->date('fechavenc');
            $table->integer('combustible_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('combustible_id')
                        ->references('id')
                        ->on('combustibles')
                        ->oncascade('setnull');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tarjetamagneticas');
    }
};

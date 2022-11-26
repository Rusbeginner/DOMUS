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
        Schema::create('ctrlicenciaconducs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chofer_id')->unsigned();
            $table->string('numlicencia');
            $table->date('fechaemi');
            $table->date('fechavenc');
            $table->string('estadopunt');
            $table->timestamps();
            $table->foreign('chofer_id')->references('id')->on('chofers')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ctrlicenciaconducs');
    }
};

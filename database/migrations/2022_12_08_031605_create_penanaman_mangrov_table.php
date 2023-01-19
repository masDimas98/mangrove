<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenanamanMangrovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penanaman_mangrov', function (Blueprint $table) {
            $table->id('idtanam')->autoIncrement();
            $table->foreignId('idmangrove');
            $table->integer('jmltanam');
            $table->integer('statustanam');
            $table->dateTime('dataakses');
            $table->foreignId('userid');
            $table->foreignId('idlahan');
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
        Schema::dropIfExists('penanaman_mangrov');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangrovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangrov', function (Blueprint $table) {
            $table->id('idmangrove')->autoIncrement();
            $table->foreignId('idjenis');
            $table->string('mangrovelatin');
            $table->string('mangroveindo');
            $table->dateTime('dataakses');
            $table->foreignId('userid');
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
        Schema::dropIfExists('mangrov');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisMangrovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_mangrov', function (Blueprint $table) {
            $table->id('idjenis', 35)->autoIncrement();
            $table->string('namajenislatin', 35);
            $table->string('namajenisindo', 35);
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
        Schema::dropIfExists('jenis_mangrov');
    }
}

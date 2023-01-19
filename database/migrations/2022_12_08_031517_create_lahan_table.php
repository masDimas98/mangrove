<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lahan', function (Blueprint $table) {
            $table->id('idlahan', 6)->autoIncrement();
            $table->foreignId('iddesa', 6);
            $table->string('namalahan', 35);
            $table->string('kepemilikan', 50);
            $table->double('luas');
            $table->double('latitude');
            $table->double('longitude');
            $table->dateTime('dataakses');
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
        Schema::dropIfExists('lahan');
    }
}

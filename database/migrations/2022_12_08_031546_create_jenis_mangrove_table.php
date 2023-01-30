<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisMangroveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_mangrove', function (Blueprint $table) {
            $table->id('idjenis', 35)->autoIncrement();
            $table->string('namajenislatin', 35);
            $table->string('namajenisindo', 35);
            $table->dateTime('dataakses')->useCurrent()->useCurrentOnUpdate();
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
        Schema::dropIfExists('jenis_mangrove');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonevMangrovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monev_mangrov', function (Blueprint $table) {
            $table->id('idmonev')->autoIncrement();
            $table->foreignId('idmangrovesat');
            $table->dateTime('tglmonev');
            $table->integer('tinggi');
            $table->string('lebarbatang');
            $table->integer('statusmonev');
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
        Schema::dropIfExists('monev_mangrov');
    }
}

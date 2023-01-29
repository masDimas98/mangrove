<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibitMangroveMonevTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibit_mangrove_monev', function (Blueprint $table) {
            $table->id('idmonevbibit')->autoIncrement();
            $table->foreignId('idbibit');
            $table->date('tglmonev');
            $table->integer('tinggibibit');
            $table->integer('jml_daun');
            $table->dateTime('dataakses')->useCurrent()->useCurrentOnUpdate();
            $table->foreignId('userid');
            $table->string('foto');
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
        Schema::dropIfExists('bibit_mangrove_monev');
    }
}

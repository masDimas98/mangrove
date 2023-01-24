<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibitMangroveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibit_mangrove', function (Blueprint $table) {
            $table->id('idbibit')->autoIncrement();
            $table->foreignId('idmangrove');
            $table->dateTime('tgltanam');
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
        Schema::dropIfExists('bibit_mangrove');
    }
}

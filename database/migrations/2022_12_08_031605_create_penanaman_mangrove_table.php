<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenanamanMangroveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penanaman_mangrove', function (Blueprint $table) {
            $table->id('idtanam')->autoIncrement();
            $table->foreignId('idmangrove');
            $table->date('tgltanam');
            $table->string('blok_lahan');
            $table->integer('jmltanam');
            $table->string('pihak_tanam');
            $table->integer('statustanam');
            $table->dateTime('dataakses')->useCurrent()->useCurrentOnUpdate();
            $table->foreignId('userid');
            $table->foreignId('idlahan');
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
        Schema::dropIfExists('penanaman_mangrove');
    }
}

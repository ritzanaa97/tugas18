<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerimabarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terimabarang', function (Blueprint $table) {
            $table->increments('id_terimabarang');

            $table->string('id_serahbrg',25);
            $table->foreign('id_serahbrg')->references('id_serahbrg')->on('serahbarang')->onUpdate('cascade');

            $table->integer('id_detailserahbrg')->unsigned();
            $table->foreign('id_detailserahbrg')->references('id_detailserahbrg')->on('detailserahbrg')->onUpdate('cascade');

            $table->date('tanggal_terimabarang');

            $table->integer('jumlahditerima');
            
            $table->integer('jumlahblmditerima');


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
        Schema::dropIfExists('terimabarang');
    }
}

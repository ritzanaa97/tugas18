<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailserahbrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailserahbrg', function (Blueprint $table) {
            $table->increments('id_detailserahbrg');

            $table->string('id_serahbrg',25);
            $table->foreign('id_serahbrg')->references('id_serahbrg')->on('serahbarang')->onUpdate('cascade');

            $table->string('id_barang',25);
            $table->foreign('id_barang')->references('id_barang')->on('detailpengajuanbrg')->onUpdate('cascade');

            $table->string('id_pengajuanbrg',25);
            $table->foreign('id_pengajuanbrg')->references('id_pengajuanbrg')->on('pengajuanbarang')->onUpdate('cascade');

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
        Schema::dropIfExists('detailserahbrg');
    }
}

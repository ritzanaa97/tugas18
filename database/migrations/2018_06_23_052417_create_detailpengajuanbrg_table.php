<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpengajuanbrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpengajuanbrg', function (Blueprint $table) {
            $table->increments('id_detailpengajuanbrg');

            $table->string('id_barang',25);
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onUpdate('cascade');

            $table->integer('jumlahpengajuan');

            $table->string('id_pengajuanbrg',25);
            $table->foreign('id_pengajuanbrg')->references('id_pengajuanbrg')->on('pengajuanbarang')->onUpdate('cascade');

            $table->integer('jumlahserah');

            $table->enum('status',['tolak','terima']);

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
        Schema::dropIfExists('detailpengajuanbrg');
    }
}

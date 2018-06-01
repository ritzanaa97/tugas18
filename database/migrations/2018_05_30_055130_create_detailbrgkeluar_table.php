<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailbrgkeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailbrgkeluar', function (Blueprint $table) {
            $table->increments('id_detailbrgkeluar');

            $table->string('id_barang');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onUpdate('cascade');

            $table->string('id_brgkeluar');
            $table->foreign('id_brgkeluar')->references('id_brgkeluar')->on('barangkeluar')->onUpdate('cascade');

            $table->integer('jumlahbrgkeluar');
            $table->integer('totalbarang');

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
        Schema::dropIfExists('detailbrgkeluar');
    }
}

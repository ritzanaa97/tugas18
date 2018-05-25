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
            $table->string('id_detailbrgkeluar',25)->primary();

            $table->string('id_barang');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onUpdate('cascade');

            $table->string('id_brgkeluar');
            $table->foreign('id_brgkeluar')->references('id_brgkeluar')->on('brgkeluar')->onUpdate('cascade');

            $table->integer('jumlah_brgkeluar');

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

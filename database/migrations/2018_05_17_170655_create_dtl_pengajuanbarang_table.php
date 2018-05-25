<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDtlPengajuanbarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtl_pengajuanbarang', function (Blueprint $table) {
            $table->string('dtl_pengajuanbarang',25)->primary();

            $table->string('id_barang',25);
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onUpdate('cascade');

            $table->integer('jumlah');

            $table->string('id_pengajuanbarang',25);
            $table->foreign('id_pengajuanbarang')->references('id_pengajuanbarang')->on('pengajuanbarang')->onUpdate('cascade');


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
        Schema::dropIfExists('dtl_pengajuanbarang');
    }
}

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
            $table->string('id_terimabarang',25)->primary();
            $table->integer('jumlahterima');
            
            $table->string('id_barang',25);
            $table->foreign('id_barang')->references('id_barang')->on('dtl_pengajuanbarang')->onUpdate('cascade');
            
            $table->integer('sisa');

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

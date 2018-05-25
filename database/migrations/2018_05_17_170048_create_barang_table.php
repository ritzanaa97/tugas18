<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('id_barang',25)->primary();
            $table->string('nama_barang',100);
            $table->integer('jumlah');

            $table->string('id_jenisbarang',25);
            $table->foreign('id_jenisbarang')->references('id_jenisbarang')->on('jenisbarang')->onUpdate('cascade');
            
            $table->integer('id_satuan')->unsigned();
            $table->foreign('id_satuan')->references('id_satuan')->on('satuan')->onUpdate('cascade');

            $table->text('keterangan');
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
        Schema::dropIfExists('barang');
    }
}

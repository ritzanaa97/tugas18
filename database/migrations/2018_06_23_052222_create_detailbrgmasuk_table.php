<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailbrgmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailbrgmasuk', function (Blueprint $table) {
            $table->increments('id_detailbrgmasuk');

            $table->string('id_brgmasuk',25);
            $table->foreign('id_brgmasuk')->references('id_brgmasuk')->on('barangmasuk')->onUpdate('cascade');
            
            $table->string('id_barang',25);
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onUpdate('cascade');

            $table->integer('jumlahbrgmsk');

            $table->timestamps();

            $table->string('created_by');
            $table->string('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailbrgmasuk');
    }
}

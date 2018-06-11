<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerahbarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serahbarang', function (Blueprint $table) {
            $table->string('id_serahbrg',25)->primary();

            $table->string('id_pengajuanbrg',25);
            $table->foreign('id_pengajuanbrg')->references('id_pengajuanbrg')->on('pengajuanbarang')->onUpdate('cascade');

            $table->date('tanggal_serahbarang');

            $table->string('nip',20);
            $table->foreign('nip')->references('nip')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serahbarang');
    }
}

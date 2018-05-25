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
            $table->string('id_serahbarang',25)->primary();

            $table->string('id_pengajuanbarang',25);
            $table->foreign('id_pengajuanbarang')->references('id_pengajuanbarang')->on('pengajuanbarang')->onUpdate('cascade');

            $table->date('tanggal_serah');

            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id_users')->on('users')->onUpdate('cascade');
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

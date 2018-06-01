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

            $table->integer('id_detailpengajuanbrg')->unsigned();
            $table->foreign('id_detailpengajuanbrg')->references('id_detailpengajuanbrg')->on('detailpengajuanbrg')->onUpdate('cascade');

            $table->date('tanggal_serahbrg');

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

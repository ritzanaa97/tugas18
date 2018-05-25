<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanbidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuanbarang', function (Blueprint $table) {
            $table->string('id_pengajuanbarang',25)->primary();

            $table->string('id_bidang',25);
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang')->onUpdate('cascade');

            $table->date('tanggal_pengajuan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuanbarang');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgkeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgkeluar', function (Blueprint $table) {
            $table->string('id_brgkeluar',25)->primary();

            $table->string('id_bidang',25);
            $table->foreign('id_bidang')->references('id_bidang')->on('users')->onUpdate('cascade');

            $table->date('tanggal_keluar');

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
        Schema::dropIfExists('brgkeluar');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanbarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuanbarang', function (Blueprint $table) {
            $table->string('id_pengajuanbrg',25)->primary();

            $table->string('nip',25);
            $table->foreign('nip')->references('nip')->on('users')->onUpdate('cascade');

            $table->date('tanggal_pengajuan');

            $table->enum('status',['terima','tolak']);
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

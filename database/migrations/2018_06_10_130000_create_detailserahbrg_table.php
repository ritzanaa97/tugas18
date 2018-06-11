<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailserahbrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailserahbrg', function (Blueprint $table) {
            $table->increments('id_detailserahbrg');

            $table->string('id_serahbrg',25);
            $table->foreign('id_serahbrg')->references('id_serahbrg')->on('serahbarang')->onUpdate('cascade');

            $table->integer('id_detailpengajuanbrg')->unsigned();
            $table->foreign('id_detailpengajuanbrg')->references('id_detailpengajuanbrg')->on('detailpengajuanbrg')->onUpdate('cascade');

            $table->integer('jumlahserahbarang');

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
        Schema::dropIfExists('detailserahbrg');
    }
}

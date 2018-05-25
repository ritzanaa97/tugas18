<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrgmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgmasuk', function (Blueprint $table) {
            $table->string('id_brgmasuk',25)->primary();
            
            $table->integer('id_supplier')->unsigned();
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier')->onUpdate('cascade');

            $table->date('tanggal_masuk');
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
        Schema::dropIfExists('brgmasuk');
    }
}

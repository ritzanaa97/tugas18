<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_users');
            $table->string('nama',25);
            $table->string('nama_lengkap',50);
            $table->string('nip',20);
            $table->string('instansi')->default('Kantor Regional I BKN Yogyakarta');

            $table->string('id_bidang',25);
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang')->onUpdate('cascade');
            
            $table->string('username',25);
            $table->string('password');
            $table->enum('level',['Admin','Kepala Bidang']);
            $table->enum('status',['Aktif','Tidak Aktif']);
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
        Schema::dropIfExists('users');
    }
}

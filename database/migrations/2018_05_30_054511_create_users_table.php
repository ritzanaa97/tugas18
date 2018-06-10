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
            $table->string('nip',20)->primary();
            $table->string('nama_lengkap',50);

            $table->integer('id_bidang')->unsigned();
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang')->onUpdate('cascade');

            $table->string('password');
            $table->enum('level',['admin','bidang']);
            $table->enum('status',['aktif','tidak aktif']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

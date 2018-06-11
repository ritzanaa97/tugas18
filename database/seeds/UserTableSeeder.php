<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
           'nip' => '123',
            'nama_lengkap' => 'Admin',
            'id_bidang' => 1,
            'password' => bcrypt('contoh'),
            'level' => 'admin',
            'status' => 'aktif',
            'created_by' => 'admin',
            'updated_by' => 'admin'
        ]);
    }
}

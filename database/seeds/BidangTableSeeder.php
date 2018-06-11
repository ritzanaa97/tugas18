<?php

use Illuminate\Database\Seeder;

class BidangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bidang')->insert([
           'nama_bidang' => 'Tata Usaha dan Rumah Tangga'
        ]);
    }
}

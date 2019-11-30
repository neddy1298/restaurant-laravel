<?php

use Illuminate\Database\Seeder;

class Masakans extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_masakans')->insert([
            'id_masakan' => '1',
            'nama_masakan' => 'Sate',
            'harga' => '10000',
            'status_masakan' => 'Status',
        ]);
    }
}

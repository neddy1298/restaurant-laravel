<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Levels extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_levels')->insert([[
            'id_level' => '1',
            'nama_level' => 'administrator',
        ], [
            'id_level' => '2',
            'nama_level' => 'waiter',
        ], [
            'id_level' => '3',
            'nama_level' => 'owner',
        ], [
            'id_level' => '4',
            'nama_level' => 'pelanggan',
        ]]);
    }
}

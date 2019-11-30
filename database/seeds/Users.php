<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'email' => 'admin@resto.com',
            'password' => Hash::make('admin'),
            'name' => 'Administrator',
            'id_level' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'email' => 'waiter@resto.com',
            'password' => Hash::make('waiter'),
            'name' => 'waiter',
            'id_level' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'email' => 'kasir@resto.com',
            'password' => Hash::make('kasir'),
            'name' => 'kasir',
            'id_level' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'email' => 'owner@resto.com',
            'password' => Hash::make('owner'),
            'name' => 'owner',
            'id_level' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'email' => 'pelanggan@resto.com',
            'password' => Hash::make('pelanggan'),
            'name' => 'pelanggan',
            'id_level' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]]);
    }
}

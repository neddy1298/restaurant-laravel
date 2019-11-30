<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([Levels::class]);
        $this->call([Users::class]);
        $this->call([Masakans::class]);
    }
}

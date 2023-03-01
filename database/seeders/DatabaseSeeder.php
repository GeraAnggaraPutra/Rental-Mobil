<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(MerkSeeder::class);
        $this->call(SupirSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(MobilSeeder::class);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merk = new \App\Models\Merk();
        $merk->merk = "Cheverolet";
        $merk->save();
        
        $merk = new \App\Models\Merk();
        $merk->merk = "Subaru";
        $merk->save();

        $merk = new \App\Models\Merk();
        $merk->merk = "Honda";
        $merk->save();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //supir
        $supir = new \App\Models\Supir();
        $supir->nama = "Asep";
        $supir->jenis_kelamin = "Laki-Laki";
        $supir->no_telp = '09888';
        $supir->alamat = "Bandung";
        $supir->status = "Online";
        $supir->save();

        $supir = new \App\Models\Supir();
        $supir->nama = "Nana";
        $supir->jenis_kelamin = "Perempuan";
        $supir->no_telp = '09848656';
        $supir->alamat = "Cibaduyut";
        $supir->status = "Offline";
        $supir->save();

        $supir = new \App\Models\Supir();
        $supir->nama = "Ujang";
        $supir->jenis_kelamin = "Laki-Laki";
        $supir->no_telp = '09545678';
        $supir->alamat = "Buah Batu";
        $supir->status = "Online";
        $supir->save();

        $supir = new \App\Models\Supir();
        $supir->nama = "Riki";
        $supir->jenis_kelamin = "Laki-Laki";
        $supir->no_telp = '097644';
        $supir->alamat = "Cibiru";
        $supir->status = "Offline";
        $supir->save();

        
    }
}

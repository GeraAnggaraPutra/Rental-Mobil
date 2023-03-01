<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mobil = new \App\Models\Mobil();
        $mobil->merk = "Cheverolet";
        $mobil->nama_mobil = "Mercedes Grand Sedan";
        $mobil->slug = "mercedes-grand-sedan";
        $mobil->foto = '8630mercedes-grand-sedan.jpg';
        $mobil->status = "Tersedia";
        $mobil->harga = 600000;
        $mobil->tahun = "2022";
        $mobil->no_polisi = "D 13 ZC";
        $mobil->warna = "Hitam";
        $mobil->save();

        $mobil = new \App\Models\Mobil();
        $mobil->merk = "Subaru";
        $mobil->nama_mobil = "Range Rover";
        $mobil->slug = "range-rover";
        $mobil->foto = '8343range-rover.jpg';
        $mobil->status = "Tersedia";
        $mobil->harga = 610000;
        $mobil->tahun = "2022";
        $mobil->no_polisi = "D 11 ZC";
        $mobil->warna = "Biru";
        $mobil->save();

        $mobil = new \App\Models\Mobil();
        $mobil->merk = "Toyota";
        $mobil->nama_mobil = "Supra";
        $mobil->slug = "supra";
        $mobil->foto = '3662toyota-supra.png';
        $mobil->status = "Tersedia";
        $mobil->harga = 620000;
        $mobil->tahun = "2022";
        $mobil->no_polisi = "D 14 ZC";
        $mobil->warna = "Hitam";
        $mobil->save();
    }
}

<?php

namespace App\Exports;

use App\Models\Mobil;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MobilExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mobil::select("id","merk", "nama_mobil", "status", "harga", "tahun", "no_polisi", "warna")->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array{
        return ["ID", "MERK", "NAMA MOBIL", "STATUS", "HARGA", "TAHUN", "NO POLISI", "WARNA"];
    }
}

<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiAllExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::all();
    }

    public function headings(): array
    {
        return ["ID", "TGL SEWA", "TGL KEMBALI", "LAMA SEWA", "SUPIR", "TOTAL BAYAR", "STATUS", "NO INVOICE", "ID MOBIL", "ID USER", "CREATED AT", "UPDATED AT"];
    }
}

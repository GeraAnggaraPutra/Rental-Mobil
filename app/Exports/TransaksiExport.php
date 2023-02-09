<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::select("id","tgl_sewa", "tgl_kembali", "lama_sewa", "total_bayar", "supir", "status", "invoice_no", "id_mobil", "id_user")->get();
    }

    public function headings(): array{
        return ["ID", "TGL SEWA", "TGL KEMBALI", "LAMA SEWA", "TOTAL BAYAR", "SUPIR", "STATUS", "KODE TRANSAKSI", "ID MOBIL", "ID USER"];
    }
}

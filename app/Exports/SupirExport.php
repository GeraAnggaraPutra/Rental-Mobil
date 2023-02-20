<?php

namespace App\Exports;

use App\Models\Supir;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SupirExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Supir::all();
    }

    public function headings(): array{
        return ["ID", "NAMA", "JENIS KELAMIN", "NO TELP", "STATUS", "ALAMAT", "CREATED AT", "UPDATED AT"];
    }
}

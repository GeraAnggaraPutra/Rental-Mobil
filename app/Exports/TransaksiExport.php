<?php
namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class TransaksiExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    use Exportable;

/**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(String $from = null, String $to = null)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function collection()
    {
        return Transaksi::select()->where('tgl_sewa', '>=', $this->from)->where('tgl_sewa', '<=', $this->to)->get();
    }
    /**
         * @return array
         */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    public function headings(): array
    {
        return ["ID", "TGL SEWA", "TGL KEMBALI", "LAMA SEWA", "SUPIR", "TOTAL BAYAR", "STATUS", "NO INVOICE", "ID MOBIL", "ID USER", "CREATED AT", "UPDATED AT"];
    }
}

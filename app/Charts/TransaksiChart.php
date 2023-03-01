<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Transaksi;

class TransaksiChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $transaksi = Transaksi::get();
        $data = [
            $transaksi->where('status', 'Pending')->count(),
            $transaksi->where('status', 'On Rent')->count(),
            $transaksi->where('status', 'Selesai')->count(),
            $transaksi->where('status', 'Dibatalkan')->count(),
        ];
        $label = [
            'Pending',
            'On Rent',
            'Selesai',
            'Dibatalkan',
        ];
        return $this->chart->pieChart()
            ->setTitle('Status Transaksi')
            ->setSubtitle(date('D, M Y'))
            ->addData($data)
            // ->setWidth(800)
            ->setHeight(340)
            ->setLabels($label);
    }
}

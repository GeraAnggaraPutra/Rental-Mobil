<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
use App\Charts\TransaksiChart;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(TransaksiChart $transaksiChart)
    {
        $mobil = new Mobil();
        $contact = new Contact();
        $transaksi = new Transaksi();
        $user = new User();

        $transaksis = Transaksi::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_sewa) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');

        $labels = $transaksis->keys();
        $data = $transaksis->values();

        return view('dashboard.index',
        ['transaksiChart' => $transaksiChart->build()],
        compact('mobil', 'contact', 'transaksi', 'user','transaksiChart', 'labels', 'data'));
    }
}

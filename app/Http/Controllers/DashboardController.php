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
        $pending = Transaksi::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_sewa) as month_name"))
                    ->where('status', 'Pending')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
        $onrent = Transaksi::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_sewa) as month_name"))
                    ->where('status', 'On Rent')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
        $selesai = Transaksi::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_sewa) as month_name"))
                    ->where('status', 'Selesai')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
        $dibatalkan = Transaksi::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_sewa) as month_name"))
                    ->where('status', 'Dibatalkan')
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
        

        $labels = $transaksis->keys();
        $data = $transaksis->values();
        $data2 = $pending->values();
        $data3 = $onrent->values();
        $data4 = $selesai->values();
        $data5 = $dibatalkan->values();

        return view('dashboard.index',
        ['transaksiChart' => $transaksiChart->build()],
        compact('mobil', 'contact', 'transaksi', 'user','transaksiChart', 'labels', 'data', 'data2', 'data3', 'data4', 'data5'));
    }
}

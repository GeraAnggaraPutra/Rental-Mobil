<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
use App\Charts\TransaksiChart;

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

        return view('dashboard.index',
        ['transaksiChart' => $transaksiChart->build()],
        compact('mobil', 'contact', 'transaksi', 'user','transaksiChart'));
    }
}

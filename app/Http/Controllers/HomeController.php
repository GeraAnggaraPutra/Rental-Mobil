<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $mobil2 = new Mobil();
        $mobil = Mobil::All();
        $user = new User();
        $transaksi = new Transaksi();
        return view('frontend.home.index', compact('mobil', 'mobil2', 'user', 'transaksi'),[
            'title' => 'Home'
        ]);
    }
}

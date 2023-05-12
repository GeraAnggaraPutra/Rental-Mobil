<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
use Auth;

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

    public function backChat() {
        if (Auth::user()->role == "admin" || Auth::user()->role == "super admin") {
            return redirect()->route('admin');
        } else {
            return redirect()->route('home');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Contact;
use App\Models\Transaksi;
use App\Models\User;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
      $mobil = new Mobil();
      $contact = new Contact();
      $transaksi = new Transaksi();
      $user = new User();
      return view('dashboard.index', compact('mobil', 'contact', 'transaksi', 'user'));
    }
}

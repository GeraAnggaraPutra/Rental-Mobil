<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class HomeController extends Controller
{

    public function index()
    {
        $mobil = Mobil::all();
        return view('frontend.home.index', compact('mobil'),[
            'title' => 'Home'
        ]);
    }
}

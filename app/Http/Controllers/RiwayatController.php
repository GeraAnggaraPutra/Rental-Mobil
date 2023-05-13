<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Pembayaran;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('frontend.riwayat.index',[
            'title' => 'Riwayat'
          ]);
    }

    public function batal($id){
        $transaksi = Transaksi::findOrFail($id);
        
        if ($transaksi->pembayaran != null) {
            if ($transaksi->pembayaran->metode_pembayaran == "Wallet") {
                $user = User::findOrFail($transaksi->id_user);
                $user->saldo += $transaksi->total_bayar; 
                $user->save();
                
                $pembayaran = Pembayaran::where('id_transaksi', $transaksi->id)->first();
                $pembayaran->status = "Dibatalkan";
                $pembayaran->save();
            }
        }

        $transaksi->status = "Dibatalkan";
        $transaksi->save();
        toast('Rental mobil dibatalkan', 'success');
        return back();
    }

    public function detail($id){
        $transaksi = Transaksi::findOrFail($id);
        $pdf = PDF::loadView('frontend.riwayat.detail', ['transaksi'=>$transaksi])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}

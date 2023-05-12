<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Pembayaran;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

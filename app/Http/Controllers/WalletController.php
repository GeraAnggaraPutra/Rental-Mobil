<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::where('metode_pembayaran', 'Wallet')->get();
        return view('pembayaran.wallet', compact('pembayaran'));
    }

    public function dibayar($id) {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status = "Dibayar";
        $pembayaran->save();
        toast('Pembayaran selesai', 'success');
        return back();
    }

    public function dibatalkan($id) {
        $pembayaran = Pembayaran::findOrFail($id);

        $user = User::findOrFail($pembayaran->transaksi->id_user);
        $user->saldo += $pembayaran->transaksi->total_bayar;
        $user->save();
        
        $pembayaran->status = "Dibatalkan";
        $pembayaran->save();

        toast('Pembayaran telah dibatalkan', 'success');
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

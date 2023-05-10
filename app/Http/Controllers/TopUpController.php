<?php

namespace App\Http\Controllers;

use App\Models\TopUp;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();
        $topup = TopUp::All();

        return view('top_up.index', compact('users', 'topup'));
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
        $validated = $request->validate([
            'jumlah_saldo' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        if ($request->jumlah_saldo < 0) {
            return redirect()->back()->withErrors(['jumlah_saldo' => 'Jumlah nominal tidak boleh negatif.']);
        }

        $topUps = new TopUp();
        $topUps->id_user = auth()->user()->id;
        $topUps->jumlah_saldo = $request->jumlah_saldo;
        $topUps->metode_pembayaran = $request->metode_pembayaran;
        $topUps->save();

        $users = User::findOrFail($topUps->id_user);
        $users->saldo += $topUps->jumlah_saldo;
        $users->save();
        toast('Isi saldo berhasil','success');
        return back();
    }

    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'jumlah_saldo' => 'required',
            'metode_pembayaran' => 'required',
        ]);

        if ($request->jumlah_saldo < 0) {
            return redirect()->back()->withErrors(['jumlah_saldo' => 'Jumlah nominal tidak boleh negatif.']);
        }

        $topUps = new TopUp();
        $topUps->id_user = $request->id_user;
        $topUps->jumlah_saldo = $request->jumlah_saldo;
        $topUps->metode_pembayaran = $request->metode_pembayaran;
        $topUps->save();

        $users = User::findOrFail($topUps->id_user);
        $users->saldo += $topUps->jumlah_saldo;
        $users->save();
        toast('Isi saldo berhasil','success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function show(TopUp $topUp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function edit(TopUp $topUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopUp $topUp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopUp $topUp)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::where('id_user', Auth::user()->id)->latest()->first();
        return view('frontend.car.pembayaran', compact('transaksi'),[
        'title' => 'Pembayaran'
      ]);
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
        $pembayaran = new Pembayaran;
        $transaksi = Transaksi::where('id_user', Auth::user()->id)->latest()->first();

        if($request->metode_pembayaran == "Transfer"){
            
            if($request->bukti_transfer == null){
                Alert::error('Silahkan upload foto bukti transfer', 'Oops!')->persistent("Ok");
                return back();
            }
            $validated = $request->validate([
                'metode_pembayaran' => 'required',
                'bukti_transfer' => 'required',
            ]);

            if ($request->hasFile('bukti_transfer')) {
                $image = $request->file('bukti_transfer');
                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/bukti-transfer/', $name);
                $pembayaran->bukti_transfer = $name;
            }
        }elseif($request->metode_pembayaran == "Wallet") {
            $validated = $request->validate([
                'metode_pembayaran' => 'required',
            ]);

            if (Auth::user()->saldo < $transaksi->total_bayar) {
                Alert::error('Maaf, saldo anda tidak mencukupi silahkan isi ulang saldo terlebih dahulu', 'Oops!')->persistent("Ok");
                return back();
            } else {
                $user = User::findOrFail($transaksi->id_user);
                $user->saldo -= $transaksi->total_bayar;
                $user->save();
                    }
        }else {
            $validated = $request->validate([
                'metode_pembayaran' => 'required',
            ]);
        }

        $pembayaran->id_transaksi = $transaksi->id;
        $pembayaran->metode_pembayaran = $request->metode_pembayaran;
        $pembayaran->status = "Pending";
        $pembayaran->save();
        alert()->html('Success', "Pesanan untuk mobil <b>".$transaksi->mobil->nama_mobil.
                " </b>Pada Tanggal <br>
                <table>
                <tr>
                <td>". date('d-m-Y', strtotime($transaksi->tgl_sewa)) ."</td>
                <td>-</td>
                <td>". date('d-m-Y', strtotime($transaksi->tgl_kembali)) ."</td>
                </tr>
                <tr>
                <td colspan='3'><i>Silahkan datang ke kantor kami untuk mengambil mobil pada tanggal yang telah ditentukan</i></td>
                </tr>
                <tr>
                <td colspan='3'><b>Terima Kasih!</b></td>
                </tr>
                </table>", 'success')->persistent("Ok");

        Alert::success('Pesanan untuk mobil ' . $transaksi->mobil->nama_mobil . ' pada tanggal ' . $transaksi->tgl_sewa . ' - ' . $transaksi->tgl_kembali . ' berhasil', 'Oops!')->persistent("Ok");
        return redirect()->route("cars");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}

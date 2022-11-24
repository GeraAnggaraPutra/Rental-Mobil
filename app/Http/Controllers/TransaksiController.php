<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Validator;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
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
        $rules = [
            'name' => 'required',
            'nik' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'tgl_sewa' => 'required',
            'tgl_kembali' => 'required',
            'lama_sewa' => 'required',
            'supir' => 'required',
            'id_mobil' => 'required',
        ];

        $messages = [
            'name.required' => 'Nama harus di isi!',
            'nik.required' => 'NIK harus di isi!',
            'no_telp.required' => 'Nomor Telepon harus di isi!',
            'jenis_kelamin.required' => 'Jenis Kelamin harus di isi!',
            'alamat.required' => 'Alamat harus di isi!',
            'email.required' => 'Email harus di isi!',
            'tgl_sewa.required' => 'Tgl sewa harus di isi!',
            'tgl_kembali.required' => 'Tgl kembali harus di isi!',
            'lama_sewa.required' => 'Lama sewa harus di isi!',
            'supir.required' => 'Supir harus di isi!',
            'id_mobil.required' => 'id_mobil harus di isi!',
        ];

        $validated = Validator::make($request->all(), $rules, $messages);
        if ($validated->fails()) {
            Alert::error('data yang anda input ada kesalahan', 'Oops!')->persistent("Ok");
            return back()->withErrors($validated)->withInput();
        }

        $car = new Transaksi();
        $mobil = Mobil::findOrFail($request->id_mobil);
        $car->name = $request->name;
        $car->nik = $request->nik;
        $car->no_telp = $request->no_telp;
        $car->jenis_kelamin = $request->jenis_kelamin;
        $car->email = $request->email;
        $car->alamat = $request->alamat;
        $car->tgl_sewa = $request->tgl_sewa;
        $car->tgl_kembali = $request->tgl_kembali;
        $car->lama_sewa = $request->lama_sewa;
        $car->supir = $request->supir;
        if($request->supir == "Yes"){
            $biayaSupir = 80000;
        }elseif($request->supir == "No"){
            $biayaSupir = 0;
        }
        $total_bayar = ($request->lama_sewa * $mobil->harga) + $biayaSupir;
        $car->total_bayar = $total_bayar;
        $car->id_mobil = $request->id_mobil;
        $car->id_user = Auth::user()->id;
        $car->save();
        Alert::success('Succes', 'Pesanan Berhasil');
        return redirect()->route('cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
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
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        Alert::success('Done', 'Data berhasil dihapus')->autoClose(2000);
        return redirect()->route('transaksi.index');
    }
}

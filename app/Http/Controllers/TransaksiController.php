<?php

namespace App\Http\Controllers;

use App\Models\DetailUser;
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

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

        if (Auth::user()->detailUser == null) {

            $rules = [
                'nama' => 'required',
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
                'nama.required' => 'Nama harus di isi!',
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

            $detailUser = new DetailUser();
            $detailUser->id_user = Auth::user()->id;
            $detailUser->nama = $request->nama;
            $detailUser->nik = $request->nik;
            $detailUser->no_telp = $request->no_telp;
            $detailUser->jenis_kelamin = $request->jenis_kelamin;
            $detailUser->email = $request->email;
            $detailUser->alamat = $request->alamat;
            $detailUser->save();

        } else {

            $rules = [
                'tgl_sewa' => 'required',
                'tgl_kembali' => 'required',
                'lama_sewa' => 'required',
                'supir' => 'required',
                'id_mobil' => 'required',
            ];

            $messages = [
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

        }

        $transaksi = new Transaksi();
        $mobil = Mobil::findOrFail($request->id_mobil);

        $record = Transaksi::latest()->first();


        if ($record == null or $record == "") {
            if (date('l', strtotime(date('Y-01-01')))) {
                $invoice_no = date('Y m d') . '-0001';
            }
        } else {
            $expNum = explode('-', $record->invoice_no);
            $innoumber = ($expNum[1] + 1);
            $invoice_no = $expNum[0] . '-' . sprintf('%04d', $innoumber);
        }

        $transaksi->invoice_no = $invoice_no;
        $transaksi->tgl_sewa = $request->tgl_sewa;
        $transaksi->tgl_kembali = $request->tgl_kembali;
        $transaksi->lama_sewa = $request->lama_sewa;
        $transaksi->supir = $request->supir;
        if ($request->supir == "Yes") {
            $biayaSupir = 80000;
        } elseif ($request->supir == "No") {
            $biayaSupir = 0;
        }
        $total_bayar = ($request->lama_sewa * $mobil->harga) + $biayaSupir;
        $transaksi->total_bayar = $total_bayar;
        $transaksi->id_mobil = $request->id_mobil;
        $transaksi->status = "Process";
        $transaksi->id_user = Auth::user()->id;

        $mobil->stock = $mobil->stock - 1;

        $mobil->save();
        $transaksi->save();
        toast('Pesanan Berhasil', 'success');
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
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('transaksi.index');
    }

    public function status1($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $mobil = Mobil::findOrFail($transaksi->id_mobil);
        $transaksi->status = "Selesai";
        $mobil->stock = $mobil->stock + 1;
        $mobil->save();
        $transaksi->save();
        toast('Rental mobil selesai', 'success');
        return redirect()->route('transaksi.index');
    }

    public function status2($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $mobil = Mobil::findOrFail($transaksi->id_mobil);
        $transaksi->status = "Process";
        $mobil->stock = $mobil->stock - 1;
        $mobil->save();
        $transaksi->save();
        toast('Transaksi diprocess', 'success');
        return redirect()->route('transaksi.index');
    }
}

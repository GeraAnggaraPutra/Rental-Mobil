<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiAllExport;
use App\Models\DetailUser;
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Pembayaran;
use Auth;
use DateTime;
use Excel;
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

    public function pending()
    {
        $transaksi = Transaksi::where('status', 'Pending')->get();
        return view('transaksi.pending', compact('transaksi'));
    }

    public function onRent()
    {
        $transaksi = Transaksi::where('status', 'On Rent')->get();
        return view('transaksi.on_rent', compact('transaksi'));
    }

    public function selesai()
    {
        $transaksi = Transaksi::where('status', 'Selesai')->get();
        return view('transaksi.selesai', compact('transaksi'));
    }

    public function dibatalkan()
    {
        $transaksi = Transaksi::where('status', 'Dibatalkan')->get();
        return view('transaksi.dibatalkan', compact('transaksi'));
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

        $search = Transaksi::where('tgl_sewa', '<=', $request->tgl_sewa)->where('tgl_kembali', '>=', $request->tgl_sewa)
            ->where('id_mobil', $request->id_mobil)->where('status', ['Pending', 'On Rent'])->exists();

        if ($search) {
            Alert::error('Maaf mobil tidak tersedia pada tanggal tersebut', 'Oops!')->persistent("Ok");
            return redirect()->back();
        } else {

            if ($request->tgl_sewa > $request->tgl_kembali) {
                Alert::error('Tanggal yang anda masukkan tidak valid', 'Oops!')->persistent("Ok");
                return redirect()->back();
            } elseif ($request->tgl_sewa <= $request->tgl_kembali) {
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
                        'supir' => 'required',
                        'id_mobil' => 'required',
                        // 'g-recaptcha-response' => 'required|captcha',
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
                        'supir.required' => 'Supir harus di isi!',
                        'id_mobil.required' => 'id_mobil harus di isi!',
                        // 'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
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
                        'supir' => 'required',
                        'id_mobil' => 'required',
                        // 'g-recaptcha-response' => 'required|captcha',
                    ];

                    $messages = [
                        'tgl_sewa.required' => 'Tgl sewa harus di isi!',
                        'tgl_kembali.required' => 'Tgl kembali harus di isi!',
                        'supir.required' => 'Supir harus di isi!',
                        'id_mobil.required' => 'id_mobil harus di isi!',
                        // 'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
                    ];

                    $validated = Validator::make($request->all(), $rules, $messages);
                    if ($validated->fails()) {
                        Alert::error('Data yang anda input ada kesalahan', 'Oops!')->persistent("Ok");
                        return back()->withErrors($validated)->withInput();
                    }

                }

                $transaksi = new Transaksi();
                $mobil = Mobil::findOrFail($request->id_mobil);

                $data1 = $request->tgl_sewa;
                $data2 = $request->tgl_kembali;
                $datetime1 = new DateTime($data1);
                $datetime2 = new DateTime($data2);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a') + 1;
                $transaksi->lama_sewa = $days;

                $transaksi->tgl_sewa = $request->tgl_sewa;
                $transaksi->tgl_kembali = $request->tgl_kembali;
                $transaksi->supir = $request->supir;
                if ($request->supir == "Yes") {
                    $biayaSupir = 80000 * $days;
                } elseif ($request->supir == "No") {
                    $biayaSupir = 0;
                }
                $total_bayar = ($days * $mobil->harga) + $biayaSupir;
                $transaksi->total_bayar = $total_bayar;
                $transaksi->id_mobil = $request->id_mobil;
                $transaksi->status = "Pending";
                $transaksi->id_user = Auth::user()->id;

                $mobil->save();
                $transaksi->save();
                
                return redirect()->route('pembayaran');
            }
        }
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
        return back();
    }

    public function status1($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        // $mobil = Mobil::findOrFail($transaksi->id_mobil);
        $transaksi->status = "On Rent";
        // $mobil->status = "Tidak Tersedia";
        // $mobil->save();
        $transaksi->save();
        toast('Rental mobil dilakukan', 'success');
        return back();
    }

    public function status2($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        // $mobil = Mobil::findOrFail($transaksi->id_mobil);
        $transaksi->status = "Selesai";
        // $mobil->status = "Tersedia";
        // $mobil->save();
        $transaksi->save();
        toast('Rental mobil selesai', 'success');
        return back();
    }

    public function status3($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        if ($transaksi->pembayaran->metode_pembayaran == "Wallet") {
            $user = User::findOrFail($transaksi->id_user);
            $user->saldo += $transaksi->total_bayar; 
            $user->save();
            
            $pembayaran = Pembayaran::where('id_transaksi', $transaksi->id)->first();
            $pembayaran->status = "Dibatalkan";
            $pembayaran->save();
        }

        $transaksi->status = "Dibatalkan";
        $transaksi->save();
        toast('Rental mobil dibatalkan', 'success');
        return back();
    }

    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new TransaksiAllExport, 'All-transaksi.xlsx');
    }
}

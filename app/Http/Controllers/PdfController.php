<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Transaksi;
class PdfController extends Controller
{
    public function generatePdf()
{
    $transaksi = Transaksi::all();
    $pdf = PDF::loadView('print', ['transaksi'=>$transaksi])->setPaper('a4', 'landscape');
    return $pdf->stream();
}

public function laporan(Request $request){
    $start = $request->tanggal_awal;
    $end = $request->tanggal_akhir;

    if($end >= $start){
            $transaksi = Transaksi::whereBetween('tgl_sewa', [$start, $end])->get();
            $pdf = PDF::loadview('laporan.print', compact('transaksi','start','end'))->setPaper('a4', 'landscape');
            return $pdf->stream('laporan.pdf');
    }
    elseif($end < $start){
        Alert::error('Tanggal yang anda masukkan tidak valid', 'Oops!')->persistent("Ok");
        return redirect()->back();
    }
}

public function singlePrint($id){
    $transaksi = Transaksi::findOrFail($id);
    $pdf = PDF::loadView('singlePrint', ['transaksi'=>$transaksi])->setPaper('a4', 'landscape');
    return $pdf->stream();
}
}

<?php
namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Transaksi;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    public function index(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post')) {
            $from = $req->from;
            $to = $req->to;

            if ($to >= $from) {

                if ($req->has('search')) {
                    // select search
                    $search = Transaksi::whereBetween('tgl_sewa', [$from, $to])->get();
                    return view('laporan.index', ['datas' => $search]);
                } elseif ($req->has('exportPDF')) {
                    // select PDF
                    $transaksi = Transaksi::whereBetween('tgl_sewa', [$from, $to])->get();
                    $pdf = PDF::loadView('laporan.print', compact('transaksi','from','to'))->setPaper('a4', 'landscape');
                    return $pdf->stream();
                } elseif ($req->has('exportExcel')) {
                    // select Excel
                    ob_end_clean();
                    ob_start();
                    return Excel::download(new TransaksiExport($from, $to), 'Transaksi-reports.xlsx');
                }
            } elseif ($to < $from) {
                Alert::error('Tanggal yang anda masukkan tidak valid', 'Oops!')->persistent("Ok");
                return redirect()->back();
            }
        } else {
            //select all
            $transaksi = Transaksi::All();
            return view('laporan.index', ['datas' => $transaksi]);
        }
    }
}

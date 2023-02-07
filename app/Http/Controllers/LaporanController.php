<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function index() {
        return view('laporan.index');
    }

    public function records(Request $request)
    {
        if ($request->ajax()) {

            if ($request->input('start_date') && $request->input('end_date')) {

                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));

                if ($end_date->greaterThan($start_date)) {
                    $transaksis = Transaksi::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $transaksis = Transaksi::latest()->get();
                }
            } else {
                $transaksis = Transaksi::latest()->get();
            }

            return response()->json([
                'transaksis' => $transaksis
            ]);
        } else {
            abort(403);
        }
    }

}

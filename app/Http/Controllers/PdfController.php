<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Transaksi;
class PdfController extends Controller
{
    public function generatePdf()
{
    $transaksi = Transaksi::all();
    $pdf = PDF::loadView('print', ['transaksi'=>$transaksi])->setPaper('a4', 'landscape');
    return $pdf->stream();
}
}

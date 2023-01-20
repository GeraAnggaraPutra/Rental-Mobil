<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AboutController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Admin/Dashboard Route
Route::group(['prefix'=>'admin','middleware'=>['auth', 'isAdmin']], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::resource('supir', SupirController::class);
    Route::resource('mobil', MobilController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('transaksi/status1/{id}', [TransaksiController::class,'status1'])->name('transaksi.status.process');
    Route::get('transaksi/status2/{id}', [TransaksiController::class,'status2'])->name('transaksi.status.dibayar');
    Route::resource('contact', ContactController::class);
    Route::post('print', [PdfController::class, 'laporan'])->name('laporan.print');
    Route::get('print/{id}', [PdfController::class, 'singlePrint'])->name('laporan.singlePrint');
    Route::get('laporan', function (){
      return view('laporan.index');
    })->name('laporan');

});
    Route::get('riwayat/{id}', [RiwayatController::class,'index'])->name('riwayat');
    Route::post('batal/{id}', [RiwayatController::class,'batal'])->name('batal');
    Route::get('generate-PDF/', [PdfController::class,'generatePdf'])->name('pdf.print');

    // Frontend Route
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('contact', function(){
      return view('frontend.contact.index', [
        'title' => 'Contact'
      ]);
    })->name('contact');


    Route::get('contact/store', [ContactController::class,'store'])->name('contact.store');
    Route::get('cars', [CarController::class,'index'])->name('cars');
    Route::group(['middleware'=>['auth']], function(){
      Route::get('cars-transaksi/{id}', [CarController::class,'create'])->name('cars-transaksi');
      Route::post('cars-transaksi/store/', [TransaksiController::class,'store'])->name('cars.store');

    });


    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

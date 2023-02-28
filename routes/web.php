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
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\UsersController;

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
    Route::resource('users', UsersController::class);
    Route::get('users-export', [UsersController::class, 'export'])->name('users.export');
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::resource('supir', SupirController::class);
    Route::post('supir/import', [SupirController::class, 'import'])->name('supir.import');
    Route::get('supir-export', [SupirController::class, 'export'])->name('supir.export');
    Route::resource('mobil', MobilController::class);
    Route::get('mobil-export', [MobilController::class, 'export'])->name('mobil.export');
    Route::get('transaksi-export', [TransaksiController::class, 'export'])->name('transaksi.export');
    Route::resource('transaksi', TransaksiController::class);
    Route::get('transaksi/status1/{id}', [TransaksiController::class,'status1'])->name('transaksi.status.process');
    Route::get('transaksi/status2/{id}', [TransaksiController::class,'status2'])->name('transaksi.status.dibayar');
    Route::resource('contact', ContactController::class);
    Route::post('print', [PdfController::class, 'laporan'])->name('laporan.print');
    Route::get('print/{id}', [PdfController::class, 'singlePrint'])->name('laporan.singlePrint');
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::post('laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('transaksis/records', [LaporanController::class, 'records'])->name('transaksis/records');
    Route::get('profileadmin', [ProfileAdminController::class,'index'])->name('profileadmin.index');
    Route::post('profileadmin/create', [ProfileAdminController::class,'store'])->name('profileadmin.create');
    Route::post('profileadmin/update', [ProfileAdminController::class,'update'])->name('profileadmin.update');
    Route::post('profileadmin/updatedetail', [ProfileAdminController::class,'updateDetail'])->name('profileadmin.updatedetail');
});
    Route::get('riwayat', [RiwayatController::class,'index'])->name('riwayat');
    Route::get('profile', [ProfileController::class,'index'])->name('profile');
    Route::post('profile/update/{id}', [ProfileController::class,'update'])->name('profile.update');
    Route::post('profile/create/{id}', [ProfileController::class,'create'])->name('profile.create');
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


    Route::get('car/detail/{slug}', [CarController::class,'detail'])->name('car.detail');
    Route::get('contact/store', [ContactController::class,'store'])->name('contact.store');
    Route::get('cars', [CarController::class,'index'])->name('cars');
    Route::group(['middleware'=>['auth']], function(){
      Route::get('cars-transaksi/{slug}', [CarController::class,'create'])->name('cars-transaksi');
      Route::post('cars-transaksi/store/', [TransaksiController::class,'store'])->name('cars.store');

    });


    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
    Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

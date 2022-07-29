<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CustomerControllers;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
    Route::get('/', function (){
        return view('admin.index');
    });
    Route::resource('customer', CustomerController::class);
    Route::resource('supir', SupirController::class);
    Route::resource('mobil', MobilController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('adminprofile', AdminController::class);
    Route::resource('laporan', LaporanController::class);

});


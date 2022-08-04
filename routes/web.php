<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MobilController;

use App\Http\Controllers\SupirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
    Route::get('/', function () {
       return view('dashboard.index');
    })->name('admin');
    Route::resource('supir', SupirController::class);
    Route::resource('mobil', MobilController::class);
    Route::resource('transaksi', TransaksiController::class);
    
    Route::resource('adminprofile', AdminController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('laporan', LaporanController::class);

});

Route::group(['prefix'=>'user'], function(){
    Route::get('/', function (){
        return view('frontend.user.index');
    });

    Route::get('home', function (){
      return view('frontend.home.index', [
        'title' => 'Home'
      ]);
    })->name('user.home');

    Route::get('about', function(){
      return view('frontend.about.index', [
        'title' => 'About'
      ]);
    })->name('user.about');

    Route::get('contact', function(){
      return view('frontend.contact.index', [
        'title' => 'Contact'
      ]);
    })->name('user.contact');

    Route::resource('cars', CarController::class);
});
<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PdfController;
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


Route::group(['prefix'=>'admin','middleware'=>['auth', 'isAdmin']], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::resource('supir', SupirController::class);
    Route::resource('mobil', MobilController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('adminprofile', AdminController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('laporan', LaporanController::class);

});


    Route::get('/', function (){
        return view('frontend.home.index', [
          'title' => 'Home'
        ]);
    })->name('home');

    Route::get('about', function(){
      return view('frontend.about.index', [
        'title' => 'About'
      ]);
    })->name('about');

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

   
    Route::get('generate-PDF', [PdfController::class,'generatePdf'])->name('pdf.print');
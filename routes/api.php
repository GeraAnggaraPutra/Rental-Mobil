
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\MobilController;
use App\Http\Controllers\PembayaranController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('midtrans-callback', [PembayaranController::class, 'callback']);

Route::group(['prefix' => 'v1'], function () {
    Route::get('get-user', [UsersController::class, 'getUser']);
    Route::post('login', [UsersController::class, 'login']);
    Route::post('register', [UsersController::class, 'register']);
    // Route::post('logout', [UsersController::class, 'logout']);
    Route::get('mobils', [MobilController::class, 'allMobil']);
    Route::get('mobil/{id}', [MobilController::class, 'singleMobil']);
    Route::delete('mobil/delete/{id}', [MobilController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UsersController::class, 'logout']);
});

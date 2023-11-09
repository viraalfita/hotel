<?php

use App\Http\Controllers\dataKamarController;
use App\Http\Controllers\dataTamuController;
use App\Http\Controllers\fasilitasController;
use App\Http\Controllers\fasilitasHotelController;
use App\Http\Controllers\fasilitasKamarController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [loginController::class, "index"]);

Route::post('/login', [loginController::class, "login"]);
Route::get('/logout', [loginController::class, "logout"]);
Route::get('/register', [loginController::class, "register"]);
Route::get('/register-tamu', [loginController::class, "register_tamu"]);
Route::post('/create', [loginController::class, "create"]);
Route::post('/create-tamu', [loginController::class, "create_tamu"]);

Route::group(['middleware' => ['auth', 'ceklevel:admin,resepsionis,tamu']], function(){
    Route::resource('home', homeController::class);
    Route::resource('fasilitas', fasilitasController::class);
    Route::resource('kamar', kamarController::class);
    Route::resource('data-kamar', dataKamarController::class);
    Route::resource('fasilitas-kamar', fasilitasKamarController::class);
    Route::resource('fasilitas-hotel', fasilitasHotelController::class);
    Route::get('/data-tamu', [dataTamuController::class, "index"]);
    Route::get('/checkin/{id}', [dataTamuController::class, "checkin"]);
    Route::get('/checkout/{id}', [dataTamuController::class, "checkout"]);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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
})->middleware('auth');
Route::get('/',function(){
    return view('welcome',[
        "title"=>"Dashboard"
    ]);
})->middleware('auth');

Route::resource('pelanggan',PelangganController::class)->except('destroy')->middleware('auth');

Route::resource('layanan',LayananController::class)->middleware('auth');

Route::resource('user',UserController::class)->except('destroy','create','show','update','edit')->middleware('auth');

Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);

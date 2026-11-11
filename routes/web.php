<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/postlogin',[AuthController::class,'postlogin'])->name('postlogin');

//register
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/postregister',[AuthController::class,'postregister'])->name('postregister');

Route::middleware('auth')->group(function(){
    Route::get('/menu',[MainController::class,'menu'])->name('menu');
    Route::get('/keranjang',[MainController::class,'keranjang'])->name('keranjang');
    Route::post('/postkeranjang/{menu}',[MainController::class,'postkeranjang'])->name('postkeranjang');
    Route::post('/prosesbayar',[MainController::class,'postbayar'])->name('postbayar');
    Route::get('/riwayat',[MainController::class,'riwayat'])->name('riwayat');

    Route::get('/admin',[AdminController::class,'admin'])->name('admin');
    
    Route::get('/edit/{menu}',[AdminController::class,'edit'])->name('edit');
    Route::post('/postedit/{menu}',[AdminController::class,'postedit'])->name('postedit');

    Route::get('/tambah',[AdminController::class,'tambah'])->name('tambah');
    Route::post('/posttambah',[AdminController::class,'posttambah'])->name('posttambah');

    Route::get('/laporan',[AdminController::class,'laporan'])->name('laporan');
    Route::get('/lunas/{transaksi}',[AdminController::class,'lunas'])->name('lunas');

    Route::get('/hapus/{menu}',[AdminController::class,'hapus'])->name('hapus');

    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

});

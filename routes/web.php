<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\transaksi;
use Illuminate\Support\Facades\Route;


Route::resource('transaksi', transaksi::class);

Route::get('/test', [transaksi::class, 'chart']);
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/loginPros',[loginController::class,'loginPros'])->name('loginPros');


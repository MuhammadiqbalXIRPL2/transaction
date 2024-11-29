<?php

use App\Http\Controllers\transaksi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('transaksi', transaksi::class);
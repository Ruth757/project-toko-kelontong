<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KasirController;



Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('produk', ProdukController::class);
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
Route::post('/kasir', [KasirController::class, 'store'])->name('kasir.store');

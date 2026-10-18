<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SupplierController;

Route::view('/', 'guest.home');

Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard');
    Route::resource('barang', BarangController::class)->except('show');
    Route::resource('pelanggan', PelangganController::class)->except('show');
    Route::resource('supplier', SupplierController::class)->except('show');
});
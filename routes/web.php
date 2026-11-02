<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UtangController;
use App\Http\Controllers\CicilanController;
use App\Http\Controllers\GuestController;

// Guest
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// Admin
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::resource('barang', BarangController::class)->except('show');
    Route::resource('pelanggan', PelangganController::class)->except('show');
    Route::resource('supplier', SupplierController::class)->except('show');
    Route::resource('user', UserController::class)->except('show');
    Route::resource('utang', UtangController::class)->except('show');
    Route::resource('cicilan', CicilanController::class)->except('show');
});

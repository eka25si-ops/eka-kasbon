<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'guest.home');
Route::view('/admin', 'admin.dashboard');
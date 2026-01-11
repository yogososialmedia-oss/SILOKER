<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/home', [HomeController::class,'index'])->name('home');

Route::view('/test','view_perusahaan.history-apply-perusahaan');
<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/home', [HomeController::class,'index'])->name('home');

Route::view('/test','view_perusahaan.history-apply-perusahaan')->name('history-apply-perusahaan');
Route::view('/test1','view_perusahaan.loker-profile-perusahaan')->name('loker-profile-perusahaan');
Route::view('/test2','view_perusahaan.index-perusahaan')->name('index-perusahaan');
Route::view('/test3','view_perusahaan.input-loker-perusahaan')->name('input-loker-perusahaan');
Route::view('/test4','view_perusahaan.edit-profile-perusahaan')->name('edit-profile-perusahaan');
Route::view('/test5','view_perusahaan.daftar-loker-perusahaan')->name('daftar-loker-perusahaan');
Route::view('/test6','view_perusahaan.edit-loker-perusahaan')->name('edit-loker-perusahaan');
Route::view('/test7','view_perusahaan.daftar-apply-perusahaan')->name('daftar-apply-perusahaan');
Route::view('/test8','view_perusahaan.detail-loker-perusahaan')->name('detail-loker-perusahaan');
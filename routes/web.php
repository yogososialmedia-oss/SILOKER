<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\VerifikasiPerusahaanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PencariKerja\LokerController as PencariKerjaLokerController;
use App\Http\Controllers\Perusahaan\ApplyController as PerusahaanApplyController;
use App\Http\Controllers\Perusahaan\IndexPerusahaanController;
use App\Http\Controllers\Perusahaan\LokerController as PerusahaanLokerController;
use App\Http\Controllers\Perusahaan\ProfilePerusahaanController;
use App\Models\Apply;
use App\Models\Loker;
use Illuminate\Support\Facades\Route;



Route::get('/pencarikerja/loker', [PencariKerjaLokerController::class, 'index'])->name('pencarikerja.loker.index');




Route::middleware(['isPerusahaanMitra'])->group(function () {
    Route::get('/perusahaan/profile', [ProfilePerusahaanController::class,'index'])->name('perusahaan.profile');
    Route::get('/perusahaan/loker', [PerusahaanLokerController::class, 'index'])->name('perusahaan.loker');
    Route::get('/perusahaan/loker/create', [PerusahaanLokerController::class, 'create'])->name('perusahaan.loker.create');
    Route::get('/perusahaan/apply', [PerusahaanApplyController::class, 'index'])->name('perusahaan.apply');
    Route::get('/perusahaan/profile/edit', [ProfilePerusahaanController::class, 'edit'])->name('perusahaan.profile.edit');
    Route::put('/perusahaan/profile/update', [ProfilePerusahaanController::class, 'update'])->name('perusahaan.profile.update');
});
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/verifikasi-perusahaan', [VerifikasiPerusahaanController::class,'index'])->name('admin.verifikasi-perusahaan');
});
Route::middleware(['isPencariKerja'])->group(function () {
    
});

Route::middleware('guestPencariKerja')->group(function () {
    
    Route::get('/pencarikerja/login', [LoginController::class,'showLoginFormPencariKerja'])->name('pencarikerja.login');
    Route::post('/pencarikerja/login', [LoginController::class,'LoginPencariKerja'])->name('pencarikerja.login.post');
});
Route::middleware('guestPerusahaanMitra')->group(function () {
    
    Route::get('/perusahaan/login', [LoginController::class,'showLoginFormPerusahaan'])->name('perusahaan.login');
    Route::post('/perusahaan/login', [LoginController::class,'loginPerusahaanMitra'])->name('perusahaan.login.post');
    
});
Route::middleware('guestAdmin')->group(function () {
    Route::get('/admin/login', [LoginController::class,'showLoginFormAdmin'])->name('admin.login');
    Route::post('/admin/login', [LoginController::class,'loginAdmin'])->name('admin.login.post');
    
});

Route::post('/logout', [LoginController::class,'logout'])->name('logout')->middleware('authAny');


Route::view('/test','view_perusahaan.history-apply-perusahaan')->name('history-apply-perusahaan');
Route::view('/test1','view_perusahaan.loker-profile-perusahaan')->name('loker-profile-perusahaan');
Route::view('/test2','view_perusahaan.index-perusahaan')->name('index-perusahaan');
Route::view('/test3','view_perusahaan.input-loker-perusahaan')->name('input-loker-perusahaan');
Route::view('/test4','view_perusahaan.edit-profile-perusahaan')->name('edit-profile-perusahaan');
Route::view('/test5','view_perusahaan.daftar-loker-perusahaan')->name('daftar-loker-perusahaan');
Route::view('/test6','view_perusahaan.edit-loker-perusahaan')->name('edit-loker-perusahaan');
Route::view('/test7','view_perusahaan.daftar-apply-perusahaan')->name('daftar-apply-perusahaan');
Route::view('/test8','view_perusahaan.detail-loker-perusahaan')->name('detail-loker-perusahaan');
Route::view('/test9','view_perusahaan.detail-apply-perusahaan')->name('detail-apply-perusahaan');

Route::view('/test10','view_admin.verifikasi-perusahaan')->name('verifikasi-perusahaan');
Route::view('/test11','view_admin.detail-verifikasi-perusahaan')->name('detail-verifikasi-perusahaan');
Route::view('/test12','view_admin.login-admin')->name('login-admin');
Route::view('/test13','view_admin.dashboard')->name('dashboard');

Route::view('/test14','view_pencari_kerja.loker')->name('loker');
Route::view('/test15','view_perusahaan.registrasi-perusahaan')->name('registrasi-perusahaan');

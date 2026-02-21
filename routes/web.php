<?php

use App\Http\Controllers\Admin\DaftarLokerController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\VerifikasiPerusahaanController;
use App\Http\Controllers\Admin\ApplyController as AdminApplyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\PencariKerja\LokerController as PencariKerjaLokerController;
use App\Http\Controllers\PencariKerja\ProfileController;
use App\Http\Controllers\PencariKerja\RegistrasiPencariKerjaController;
use App\Http\Controllers\Perusahaan\ApplyController as PerusahaanApplyController;
use App\Http\Controllers\Perusahaan\IndexPerusahaanController;
use App\Http\Controllers\Perusahaan\LokerController as PerusahaanLokerController;
use App\Http\Controllers\Perusahaan\ProfilePerusahaanController;
use App\Http\Controllers\Perusahaan\RegistrasiPerusahaanController;
use App\Http\Controllers\VerifikasiEmailController;
use App\Models\Apply;
use App\Models\Loker;
use Illuminate\Support\Facades\Route;



Route::get('/pencarikerja/loker', [PencariKerjaLokerController::class, 'index'])->name('pencarikerja.loker.index');
Route::get('/pencarikerja/beranda', [PencariKerjaLokerController::class, 'showBeranda'])->name('pencarikerja.beranda');

Route::get('/perusahaan/registrasi', [RegistrasiPerusahaanController::class, 'index'])->name('perusahaan.registrasi');
Route::post('/perusahaan/registrasi', [RegistrasiPerusahaanController::class, 'store'])->name('perusahaan.registrasi.post');
Route::get('/registrasi-pencari-kerja', [RegistrasiPencariKerjaController::class, 'index'])->name('pencarikerja.register');
Route::post('/registrasi-pencari-kerja/store', [RegistrasiPencariKerjaController::class, 'store'])->name('pencarikerja.register.store');

Route::get('/verifikasi-email/{type}/{token}', [VerifikasiEmailController::class, 'verify'])->name('verifikasi.email');





Route::middleware(['isPerusahaanMitra'])->group(function () {
    Route::get('/perusahaan/profile', [ProfilePerusahaanController::class,'index'])->name('perusahaan.profile');
    Route::get('/perusahaan/profile/edit', [ProfilePerusahaanController::class, 'edit'])->name('perusahaan.profile.edit');
    Route::get('/perusahaan/loker/porfile', [ProfilePerusahaanController::class, 'lokerprofile'])->name('perusahaan.loker.profile');
    Route::put('/perusahaan/profile/update', [ProfilePerusahaanController::class, 'update'])->name('perusahaan.profile.update');

    Route::middleware(['verified.perusahaan'])->group(function () {
        Route::get('/perusahaan/loker', [PerusahaanLokerController::class, 'index'])->name('perusahaan.loker');
        Route::get('/perusahaan/loker/edit/{id}', [PerusahaanLokerController::class, 'edit'])->name('perusahaan.loker.edit');
        Route::get('/perusahaan/loker/tampilan/{id}', [ProfilePerusahaanController::class, 'tampilanloker'])->name('perusahaan.loker.tampilan');
        Route::get('/perusahaan/apply/daftar/{id}', [PerusahaanApplyController::class, 'daftarapplyloker'])->name('perusahaan.apply.loker');
        Route::get('/perusahaan/loker/create', [PerusahaanLokerController::class, 'create'])->name('perusahaan.loker.create');
        Route::get('/perusahaan/apply', [PerusahaanApplyController::class, 'index'])->name('perusahaan.apply');
        Route::get('/perusahaan/apply/detail/{id}', [PerusahaanApplyController::class, 'detailapplyperusahaan'])->name('perusahaan.detail-apply');
        Route::get('/perusahaan/apply/profile-pelamar/{id}', [PerusahaanApplyController::class, 'showProfilePelamar'])->name('perusahaan.apply.profile-pelamar');
        Route::put('/perusahaan/loker/update/{id}', [PerusahaanLokerController::class, 'update'])->name('perusahaan.loker.update');
        Route::post('/perusahaan/loker/store', [PerusahaanLokerController::class, 'store'])->name('perusahaan.loker.store');
        Route::get('/perusahaan/apply/history/{id}', [PerusahaanApplyController::class, 'showHistoryApply'])->name('perusahaan.apply.history');
        Route::post('/perusahaan/apply/update-status/{id}',[PerusahaanApplyController::class, 'updateStatus'])->name('perusahaan.apply.update-status');
    });
});
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardAdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/verifikasi-perusahaan', [VerifikasiPerusahaanController::class,'index'])->name('admin.verifikasi-perusahaan');
    Route::get('/admin/daftar-perusahaan', [VerifikasiPerusahaanController::class,'showDaftarPerusahaan'])->name('admin.daftar-perusahaan');
    Route::get('/admin/daftar-loker', [DaftarLokerController::class,'index'])->name('admin.daftar-loker');
    Route::get('/admin/verifikasi-perusahaan/detail/{id}', [VerifikasiPerusahaanController::class,'showDetailVerifikasi'])->name('admin.detail-verifikasi-perusahaan');
    Route::get('/admin/loker/tampilan/{id}', [DaftarLokerController::class, 'showTampilanLoker'])->name('admin.loker.tampilan');
    Route::get('/admin/profile-perusahaan/{id}', [VerifikasiPerusahaanController::class,'showProfilePerusahaan'])->name('admin.profile-perusahaan');
    Route::get('/admin/lowongan-kerja-perusahaan/{id}', [VerifikasiPerusahaanController::class,'showLowonganKerjaPerusahaan'])->name('admin.lowongan-kerja-perusahaan');
    Route::get('/admin/loker/{id}', [VerifikasiPerusahaanController::class, 'showTampilanLoker'])->name('admin.tampilan-loker-perusahaan');
    Route::post('/admin/verifikasi-perusahaan/update',[VerifikasiPerusahaanController::class, 'updateStatus'])->name('admin.update-status-perusahaan');
    Route::get('/admin/history-apply', [AdminApplyController::class, 'index'])->name('admin.history-apply');
});
Route::middleware(['isPencariKerja'])->group(function () {
    Route::get('/pencarikerja/profile', [ProfileController::class,'index'])->name('pencarikerja.profile');
    Route::get('/pencarikerja/profile/edit', [ProfileController::class,'showEditProfilePencariKerja'])->name('pencarikerja.profile.edit');
    Route::put('/pencarikerja/profile/update/{id}', [ProfileController::class, 'update'])->name('pencarikerja.profile.update');
    Route::get('/pencarikerja/profile/history-apply', [ProfileController::class,'showHistoryApply'])->name('pencarikerja.history-apply');
    Route::get('/pencarikerja/profile/profile-perusahaan/{id}', [ProfileController::class,'showProfilePerusahaanpencariKerja'])->name('pencarikerja.profile.perusahaan');
    Route::get('/pencarikerja/profile/loker-profile-perusahaan/{id}', [ProfileController::class,'showLokerPerusahaanpencariKerja'])->name('pencarikerja.loker.profile.perusahaan');
    Route::get('/pencarikerja/loker/{loker}',[PencariKerjaLokerController::class, 'show'])->name('pencarikerja.loker.show');
    Route::get('/loker/{loker}/apply',[PencariKerjaLokerController::class, 'applyForm'])->name('pencarikerja.loker.apply.form');
    Route::post('/pencarikerja/loker/{loker}/apply', [PencariKerjaLokerController::class, 'applyStore'])->name('pencarikerja.loker.apply.store');
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
Route::view('/test8','view_perusahaan.tampilan-loker-perusahaan')->name('tampilan-loker-perusahaan');
Route::view('/test9','view_perusahaan.detail-apply-perusahaan')->name('detail-apply-perusahaan');

Route::view('/test10','view_admin.verifikasi-perusahaan')->name('verifikasi-perusahaan');
Route::view('/test11','view_admin.detail-verifikasi-perusahaan')->name('detail-verifikasi-perusahaan');
Route::view('/test12','view_admin.login-admin')->name('login-admin');
Route::view('/test13','view_admin.dashboard')->name('dashboard');

Route::view('/test14','view_pencari_kerja.loker')->name('loker');
Route::view('/test15','view_perusahaan.registrasi-perusahaan')->name('registrasi-perusahaan');
Route::view('/test16','view_pencari_kerja.registrasi-pencari-kerja')->name('registrasi-pencari-kerja');
Route::view('/test17','view_pencari_kerja.profile-pencari-kerja')->name('profile-pencari-kerja');
Route::view('/test18','view_pencari_kerja.edit-profile-pencari-kerja')->name('edit-profile-pencari-kerja');
Route::view('/test19','view_pencari_kerja.history-apply-pencari-kerja')->name('history-apply-pencari-kerja');
Route::view('/test20','view_pencari_kerja.profile-perusahaan')->name('profile-perusahaan');
Route::view('/test21','view_perusahaan.profile-pencari-kerja-perusahaan')->name('profile-pencari-kerja-perusahaan');
Route::view('/test22','view_admin.daftar-perusahaan')->name('daftar-perusahaan');
Route::view('/test23','view_admin.daftar-loker')->name('daftar-loker');
Route::view('/test24','view_pencari_kerja.beranda')->name('beranda');
Route::view('/test25','view_pencari_kerja.profile-perusahaan-pencari-kerja')->name('profile-perusahaan-pencari-kerja');
Route::view('/test26','view_pencari_kerja.tampilan-loker-pencari-kerja')->name('tampilan-loker-pencari-kerja');
Route::view('/test27','view_pencari_kerja.apply-loker')->name('apply-loker');
Route::view('/test28','view_pencari_kerja.loker-profile-perusahaan')->name('loker-profile-perusahaan');

<?php

use App\Http\Controllers\Admin\DaftarLokerController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\VerifikasiPerusahaanController;
use App\Http\Controllers\Admin\ApplyController as AdminApplyController;
use App\Http\Controllers\ForgotPasswordController;
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


Route::redirect('/', '/pencarikerja/beranda#home');

Route::get('/pencarikerja/loker', [PencariKerjaLokerController::class, 'index'])->name('pencarikerja.loker.index');
Route::get('/pencarikerja/beranda', [PencariKerjaLokerController::class, 'showBeranda'])->name('pencarikerja.beranda');

Route::get('/perusahaan/registrasi', [RegistrasiPerusahaanController::class, 'index'])->name('perusahaan.registrasi');
Route::post('/perusahaan/registrasi', [RegistrasiPerusahaanController::class, 'store'])->name('perusahaan.registrasi.post');
Route::get('/registrasi-pencari-kerja', [RegistrasiPencariKerjaController::class, 'index'])->name('pencarikerja.register');
Route::post('/registrasi-pencari-kerja/store', [RegistrasiPencariKerjaController::class, 'store'])->name('pencarikerja.register.store');

Route::get('/verifikasi-email/{type}/{token}', [VerifikasiEmailController::class, 'verify'])->name('verifikasi.email');

// view
Route::get('/lupa-password', function () {return view('auth.lupa_password');})->name('lupa.password');
Route::view('/form-otp', 'auth.verifikasi_otp')->name('form.otp');
Route::view('/reset-password-form', 'auth.reset_password')->name('reset.password.form');

// logic
Route::post('/kirim-otp', [ForgotPasswordController::class, 'kirimOtp'])->name('kirim.otp');
Route::post('/verifikasi-otp', [ForgotPasswordController::class, 'verifikasiOtp'])->name('verifikasi.otp');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');



Route::middleware(['IsPerusahaanMitra'])->group(function () {
    Route::get('/perusahaan/profile', [ProfilePerusahaanController::class,'index'])->name('perusahaan.profile');
    Route::get('/perusahaan/profile/edit', [ProfilePerusahaanController::class, 'edit'])->name('perusahaan.profile.edit');
    Route::get('/perusahaan/loker/porfile', [ProfilePerusahaanController::class, 'lokerprofile'])->name('perusahaan.loker.profile');
    Route::put('/perusahaan/profile/update', [ProfilePerusahaanController::class, 'update'])->name('perusahaan.profile.update');
    Route::get('/perusahaan/profile/lihat/{id}', [ProfilePerusahaanController::class, 'show'])->name('perusahaan.profile.lihat');
    Route::get('/perusahaan/loker/profile/lihat/{id}', [ProfilePerusahaanController::class, 'showLokerProfile'])->name('perusahaan.loker.profile.lihat');
    Route::get('/perusahaan/loker/tampilan/lihat/{id}', [ProfilePerusahaanController::class, 'showTampilanLokerProfile'])->name('perusahaan.loker.tampilan.lihat');

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
        Route::post('/perusahaan/apply/update-status',[PerusahaanApplyController::class, 'updateStatus'])->name('perusahaan.apply.update-status');
        Route::get('/perusahaan/apply/export', [PerusahaanApplyController::class, 'exportExcelPerusahaan'])->name('perusahaan.apply.export');
        Route::get('/perusahaan/loker/export', [PerusahaanLokerController::class, 'exportExcel'])->name('perusahaan.loker.export');
        Route::get('/perusahaan/apply/export/{id_loker}', [PerusahaanApplyController::class, 'exportPerLoker'])->name('perusahaan.apply.export.perloker');
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
    Route::get('/admin/loker/{id}', [VerifikasiPerusahaanController::class, 'showTampilanLoker'])->where('id', '[0-9]+')->name('admin.tampilan-loker-perusahaan');
    Route::post('/admin/verifikasi-perusahaan/update',[VerifikasiPerusahaanController::class, 'updateStatus'])->name('admin.update-status-perusahaan');
    Route::get('/admin/history-apply', [AdminApplyController::class, 'index'])->name('admin.history-apply');

    Route::get('/admin/apply/export-excel', [AdminApplyController::class, 'exportExcelSemua'])->name('admin.apply.export.semua');
    Route::get('/admin/apply/export-excel/loker/{id}', [AdminApplyController::class, 'exportExcelPerLoker'])->name('admin.apply.export.perloker');
    Route::get('/admin/loker/export-excel',[DaftarLokerController::class, 'exportExcel'])->name('admin.loker.export');
    Route::get('/admin/perusahaan/export-excel/{tahun?}', [VerifikasiPerusahaanController::class, 'exportExcel'])->name('admin.perusahaan.export');
    
    Route::get('/loker/apply/{id}', [AdminApplyController::class, 'daftarApplyLoker'])->name('admin.apply.loker');
    Route::get('/apply/detail/{id}', [AdminApplyController::class, 'detailApply'])->name('admin.apply.detail');
    Route::get('/apply/profile/{id}', [AdminApplyController::class, 'profilePelamar'])->name('admin.apply.profile');
    Route::get('/apply/history/{id}', [AdminApplyController::class, 'historyApply'])->name('admin.apply.history');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\PencariKerja;
use App\Models\PerusahaanMitra;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    // =========================
    // 1. KIRIM OTP
    // =========================
    public function kirimOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:pencarikerja,perusahaanmitra'
        ]);

        $email = $request->email;
        $role = $request->role;

        // cek user
        if ($role == 'pencarikerja') {
            $user = PencariKerja::where('email_pencari_kerja', $email)->first();
        } else {
            $user = PerusahaanMitra::where('email_perusahaan', $email)->first();
        }

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        // hapus OTP lama
        DB::table('otp_codes')
            ->where('email', $email)
            ->where('role', $role)
            ->delete();

        // generate OTP
        $otp = rand(100000, 999999);

        // simpan OTP
        DB::table('otp_codes')->insert([
            'email' => $email,
            'otp' => $otp,
            'role' => $role,
            'expired_at' => Carbon::now()->addMinutes(5),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // kirim email
        Mail::raw(
            "Kode OTP reset password kamu adalah: $otp\nBerlaku selama 5 menit.",
            function ($message) use ($email) {
                $message->to($email)
                        ->subject('OTP Reset Password - Career Center');
            }
        );

        return redirect()->route('form.otp')
            ->with('email', $email)
            ->with('role', $role);
    }

    // =========================
    // 2. VERIFIKASI OTP
    // =========================
    public function verifikasiOtp(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'otp' => 'required',
            'role' => 'required|in:pencarikerja,perusahaanmitra'
        ]);

        $data = DB::table('otp_codes')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('role', $request->role)
            ->first();

        if (!$data) {
            return back()->with('error', 'OTP salah');
        }

        if (Carbon::now()->gt($data->expired_at)) {
            return back()->with('error', 'OTP sudah expired');
        }

        // hapus OTP
        DB::table('otp_codes')
            ->where('email', $request->email)
            ->where('role', $request->role)
            ->delete();

        // simpan session
        session([
            'email' => $request->email,
            'role' => $request->role
        ]);

        return redirect()->route('reset.password.form');
    }

    // =========================
    // 3. RESET PASSWORD
    // =========================
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ], [
            'password.confirmed' => 'Konfirmasi password tidak sama'
        ]);

        $email = session('email');
        $role = session('role');

        if (!$email || !$role) {
            return redirect()->route('lupa.password')
                ->with('error', 'Session habis, ulangi proses');
        }

        if ($role == 'pencarikerja') {

            PencariKerja::where('email_pencari_kerja', $email)
                ->update([
                    'password_pencari_kerja' => Hash::make($request->password)
                ]);

            $redirect = 'pencarikerja.login';

        } else {

            PerusahaanMitra::where('email_perusahaan', $email)
                ->update([
                    'password_perusahaan' => Hash::make($request->password)
                ]);

            $redirect = 'perusahaan.login';
        }

        // hapus session
        session()->forget(['email', 'role']);

        return redirect()->route($redirect)
            ->with('success', 'Password berhasil diubah');
    }
}
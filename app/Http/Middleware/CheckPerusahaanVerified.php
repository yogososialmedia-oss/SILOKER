<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPerusahaanVerified
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('perusahaanmitra')->user();

        if ($user) {
            // Cek email sudah diverifikasi
            if (is_null($user->email_verified_at)) {
                return redirect()->route('perusahaan.profile')
                    ->with('error', 'Silahkan verifikasi email Anda terlebih dahulu.');
            }

            // Cek status akun sudah disetujui admin
            if ($user->status_akun !== 'terverifikasi') {
                return redirect()->route('perusahaan.profile')
                    ->with('error', 'Akun Anda belum diverifikasi oleh admin.');
            }
        }

        return $next($request);
    }
}

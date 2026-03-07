<?php

namespace App\Http\Controllers;

use App\Models\PencariKerja;
use App\Models\PerusahaanMitra;
use Illuminate\Http\Request;

class VerifikasiEmailController extends Controller
{
    public function verify($type, $token)
    {
        if ($type === 'perusahaan') {
            $user = PerusahaanMitra::where('verification_token', $token)->first();
        } else {
            $user = PencariKerja::where('verification_token', $token)->first();
        }

        if (!$user) {
            return redirect()->route('pencarikerja.login')->with('error', 'Token tidak valid.');
        }

        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

        return redirect()->route($type === 'perusahaan' ? 'perusahaan.login' : 'pencarikerja.login')
            ->with('success', 'Email berhasil diverifikasi, silahkan login.');
    }
}

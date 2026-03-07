<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\PencariKerja;
use App\Models\PerusahaanMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showLoginFormAdmin()
    {
        return view('view_admin.login-admin');
    }

    public function showLoginFormPerusahaan()
    {
        return view('view_perusahaan.login-perusahaan');
    }

    public function showLoginFormPencariKerja()
    {
        return view('view_pencari_kerja.login-pencari-kerja');
    }

    public function loginAdmin(Request $request)
    {
        Auth::guard('perusahaanmitra')->logout();
        Auth::guard('pencarikerja')->logout();
        $validatedata = $request->validate([
            'email-username' => 'required|email',
            'password' => 'required',
        ],
        [
            'email-username.required' => 'Email wajib diisi',
            'email-username.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);
        
        $admin = Admin::where('email_admin', $validatedata['email-username'])->first();
        if (!$admin) {
            return back()->withErrors([
                'email-username' => 'Email atau password salah',
            ]);
        }
        if (!Hash::check($validatedata['password'], $admin->password_admin)) {
            return back()->withErrors([
                'email-username' => 'Email atau password salah',
            ]);
        }
        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.dashboard');
    }

    public function LoginPerusahaanMitra(Request $request)
    {
        Auth::guard('admin')->logout();
        Auth::guard('pencarikerja')->logout();

        $validatedata = $request->validate([
            'email-username' => 'required|email',
            'password' => 'required',
        ], [
            'email-username.required' => 'Email wajib diisi',
            'email-username.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        $perusahaan = PerusahaanMitra::where('email_perusahaan', $validatedata['email-username'])->first();

        if (!$perusahaan || !Hash::check($validatedata['password'], $perusahaan->password_perusahaan)) {
            return back()->withErrors([
                'email-username' => 'Email atau password salah',
            ]);
        }

        // 🚨 HANYA CEK EMAIL
        if (is_null($perusahaan->email_verified_at)) {
            return back()->withErrors([
                'email-username' => 'Silakan verifikasi email terlebih dahulu.',
            ]);
        }

        Auth::guard('perusahaanmitra')->login($perusahaan);

        return redirect()->route('perusahaan.profile');
    }


    public function LoginPencariKerja(Request $request)
    {
        Auth::guard('perusahaanmitra')->logout();
        Auth::guard('admin')->logout();

        $validatedata = $request->validate([
            'email-username' => 'required|email',
            'password' => 'required',
        ], [
            'email-username.required' => 'Email wajib diisi',
            'email-username.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        $pencarikerja = PencariKerja::where('email_pencari_kerja', $validatedata['email-username'])->first();

        if (!$pencarikerja || !Hash::check($validatedata['password'], $pencarikerja->password_pencari_kerja)) {
            return back()->withErrors([
                'email-username' => 'Email atau password salah',
            ]);
        }

        // 🚨 CEK EMAIL VERIFIKASI
        if (!$pencarikerja->email_verified_at) {
            return back()->withErrors([
                'email-username' => 'Silakan verifikasi email terlebih dahulu.',
            ]);
        }

        Auth::guard('pencarikerja')->login($pencarikerja);

        return redirect()->route('pencarikerja.loker.index');
    }
    public function logout(Request $request)
    {
        Auth::guard('pencarikerja')->logout();
        Auth::guard('perusahaanmitra')->logout();
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('pencarikerja.loker.index');
    }
}
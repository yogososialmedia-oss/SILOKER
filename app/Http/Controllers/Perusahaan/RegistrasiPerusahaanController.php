<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationMail;
use Illuminate\Http\Request;
use App\Models\PerusahaanMitra;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrasiPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('view_perusahaan.registrasi-perusahaan');
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
        $request->validate([
            'NamaPerusahaan' => 'required|string|max:255',

            'Email' => 'required|email|max:255|unique:tb_perusahaan_mitra,email_perusahaan',

            'Password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[^A-Za-z0-9]/'
            ],

            'NoNpwp' => 'required|digits:16',

            'NoTelp' => 'required|regex:/^[0-9]{10,15}$/',

            'Provinsi' => 'required|string|max:255',
            'Kabupaten' => 'required|string|max:255',
            'Kecamatan' => 'required|string|max:255',

            'Alamat' => 'required|string',

            'GoogleMaps' => 'nullable|url|max:255',

            'TentangPerusahaan' => 'nullable|string',

            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [

            'NamaPerusahaan.required' => 'Nama perusahaan wajib diisi.',

            'Email.required' => 'Email wajib diisi.',
            'Email.email' => 'Format email tidak valid.',
            'Email.unique' => 'Email sudah terdaftar.',

            'Password.required' => 'Password wajib diisi.',
            'Password.min' => 'Password minimal 8 karakter.',
            'Password.regex' => 'Password harus mengandung huruf besar, kecil, angka, dan simbol.',

            'NoNpwp.required' => 'NPWP wajib diisi.',
            'NoNpwp.digits' => 'NPWP wajib berisi 16 angka.',

            'NoTelp.required' => 'Nomor telepon wajib diisi.',
            'NoTelp.regex' => 'Nomor telepon hanya boleh angka (10-15 digit).',

            'Provinsi.required' => 'Provinsi wajib dipilih.',
            'Kabupaten.required' => 'Kabupaten wajib dipilih.',
            'Kecamatan.required' => 'Kecamatan wajib dipilih.',

            'Alamat.required' => 'Alamat wajib diisi.',

            'GoogleMaps.url' => 'Link Google Maps harus berupa URL.',

            'logo.image' => 'Logo harus berupa gambar.',
            'logo.mimes' => 'Logo harus JPG atau PNG.',
            'logo.max' => 'Ukuran logo maksimal 2MB.',
        ]);

        $logoFilename = null;

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoFilename = $logoFile->hashName();
            $logoFile->storeAs('logo_perusahaan', $logoFilename, 'public');
        }

        $token = uniqid(true);

        $perusahaan = PerusahaanMitra::create([
            'nama_perusahaan'    => $request->NamaPerusahaan,
            'email_perusahaan'   => $request->Email,
            'provinsi'           => $request->Provinsi,
            'kabupaten'          => $request->Kabupaten,
            'kecamatan'          => $request->Kecamatan,
            'no_telp_perusahaan' => $request->NoTelp,
            'alamat_perusahaan'  => $request->Alamat,
            'logo'               => $logoFilename,
            'password_perusahaan'=> Hash::make($request->Password),
            'no_npwp'            => $request->NoNpwp,
            'google_maps'        => $request->GoogleMaps,
            'tentang_perusahaan' => $request->TentangPerusahaan,
            'status_akun'        => 'pending',
            'verification_token' => $token,
        ]);

        Mail::to($perusahaan->email_perusahaan)
            ->send(new EmailVerificationMail($perusahaan, $token, 'perusahaan'));

        return redirect()->route('perusahaan.login')
            ->with('success', 'Registrasi berhasil. Silahkan cek email Anda untuk verifikasi.');
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
}

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
            'Email' => 'required|email|unique:tb_perusahaan_mitra,email_perusahaan',
            'Password' => 'required|min:8',
            'NoNpwp' => 'required|string|max:255',
            'NoTelp' => 'required|string|max:255',
            'Provinsi' => 'required|string|max:255',
            'Kabupaten' => 'required|string|max:255',
            'Kecamatan' => 'required|string|max:255',
            'Alamat' => 'required|string',
            'GoogleMaps' => 'nullable|string',
            'TentangPerusahaan' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'NamaPerusahaan.required' => 'Nama Perusahaan wajib diisi.',
            'Email.required' => 'Email wajib diisi.',
            'Email.email' => 'Format email tidak valid.',
            'Email.unique' => 'Email sudah terdaftar.',
            'Password.required' => 'Password wajib diisi.',
            'Password.min' => 'Password minimal 8 karakter.',
            'NoNpwp.required' => 'No NPWP wajib diisi.',
            'NoTelp.required' => 'Nomor telepon wajib diisi.',
            'Provinsi.required' => 'Provinsi wajib diisi.',
            'Kabupaten.required' => 'Kabupaten wajib diisi.',
            'Kecamatan.required' => 'Kecamatan wajib diisi.',
            'Alamat.required' => 'Alamat wajib diisi.',
        ]);

        $logoFilename = null;

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoFilename = time() . '_' . $logoFile->getClientOriginalName();
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

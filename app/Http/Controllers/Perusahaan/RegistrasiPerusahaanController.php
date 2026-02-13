<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerusahaanMitra;
use Illuminate\Support\Facades\Hash;

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
        'NamaPerusahaan' => 'required',
        'Email' => 'required|email|unique:tb_perusahaan_mitra,email_perusahaan',
        'Password' => 'required|min:8',
        'NoNpwp' => 'required',
        'NoTelp' => 'required',
        'Provinsi' => 'required',
        'Kabupaten' => 'required',
        'Kecamatan' => 'required',
        'Alamat' => 'required',
        'GoogleMaps' => 'required',
        'Logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'BannerPerusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        'TentangPerusahaan' => 'required',

    ],
    [
        'NamaPerusahaan.required' => 'Nama Perusahaan wajib diisi.',
        'Email.required' => 'Email wajib diisi.',
        'Email.email' => 'Format email tidak valid.',
        'Email.unique' => 'Email sudah terdaftar.',
        'Password.required' => 'Password wajib diisi.',
        'Password.min' => 'Password minimal 8 karakter.',
        'NoNpwp.required' => 'No NPWP wajib diisi.',
        'NoTelp.required' => 'No Telp wajib diisi.',
        'Provinsi.required' => 'Provinsi wajib diisi.',
        'Kabupaten.required' => 'Kabupaten wajib diisi.',
        'Kecamatan.required' => 'Kecamatan wajib diisi.',
        'Alamat.required' => 'Alamat wajib diisi.',
        'GoogleMaps.required' => 'Google Maps wajib diisi.',
        'TentangPerusahaan.required' => 'Tentang Perusahaan wajib diisi.',
    ]  

    );

    PerusahaanMitra::create([
        'nama_perusahaan'    => $request->NamaPerusahaan,
        'email_perusahaan'   => $request->Email,
        'provinsi'           => $request->Provinsi,
        'kabupaten'          => $request->Kabupaten,
        'kecamatan'          => $request->Kecamatan,
        'no_telp_perusahaan' => $request->NoTelp,
        'alamat_perusahaan'  => $request->Alamat,
        'logo'               => $request->Logo,
        'banner_perusahaan'  => $request->BannerPerusahaan,
        'password_perusahaan'=> Hash::make($request->Password),
        'no_npwp'            => $request->NoNpwp,
        'google_maps'        => $request->GoogleMaps,
        'tentang_perusahaan' => $request->TentangPerusahaan,
        'status_akun'        => 'pending',
    ]);

    return redirect()->route('perusahaan.login')->with('success', 'Registrasi berhasil');
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

<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePerusahaanController extends Controller
{
    public function index()
    {
        $info_perusahaan = Auth::guard('perusahaanmitra') ->user();
        return view('view_perusahaan.index-perusahaan', compact('info_perusahaan'));
        
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
    public function edit()
    {
        $info_perusahaan = Auth::guard('perusahaanmitra') ->user();
        return view('view_perusahaan.edit-profile-perusahaan', compact('info_perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $authPerusahaan = Auth::guard('perusahaanmitra')->user();
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
            'logo_perusahaan' => 'required|image|mimes:jpeg,png,jpg,gif',
            'banner_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'tentang_perusahaan' => 'nullable|string',
        ], [
            'nama_perusahaan.required' => 'Nama Perusahaan wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_telp.required' => 'Nomor Telepon wajib diisi.',
            'logo_perusahaan.required' => 'Logo Perusahaan wajib diunggah.',
            'logo_perusahaan.image' => 'Logo Perusahaan harus berupa gambar.',
            'banner_perusahaan.image' => 'Banner Perusahaan harus berupa gambar.',
        ]);
        // Update logo perusahaan jika ada file yang diunggah

        // Update data perusahaan
        $authPerusahaan->nama_perusahaan = $validatedData['nama_perusahaan'];
        $authPerusahaan->alamat = $validatedData['alamat'];
        $authPerusahaan->email = $validatedData['email'];
        $authPerusahaan->no_telp = $validatedData['no_telp'];
        $authPerusahaan->tentang_perusahaan = $validatedData['tentang_perusahaan'] ?? $authPerusahaan->tentang_perusahaan;

        if ($request->hasFile('logo_perusahaan')) {
            $logoPath = storage_path('app/public/logo_perusahaan/' . $authPerusahaan->logo_perusahaan);
            if (file_exists($logoPath)) {
                unlink($logoPath); // Hapus file logo lama
            }
            $logoFile = $request->file('logo_perusahaan');
            $logoFilename = time() . '_' . $logoFile->getClientOriginalName();
            $logoFile->storeAs('public/logo_perusahaan', $logoFilename);
            $authPerusahaan->logo_perusahaan = $logoFilename;
            }
        // Update banner perusahaan jika ada file yang diunggah
        if ($request->hasFile('banner_perusahaan')) {
            $bannerPath = storage_path('app/public/banner_perusahaan/' . $authPerusahaan->banner_perusahaan);
            if (file_exists($bannerPath)) {
                unlink($bannerPath); // Hapus file banner lama
            }
            $bannerFile = $request->file('banner_perusahaan');
            $bannerFilename = time() . '_' . $bannerFile->getClientOriginalName();
            $bannerFile->storeAs('public/banner_perusahaan', $bannerFilename);
            $authPerusahaan->banner_perusahaan = $bannerFilename;
            }
        // $authPerusahaan->save();


        return redirect()->route('perusahaan.profile')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

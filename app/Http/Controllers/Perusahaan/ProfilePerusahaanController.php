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

    public function lokerprofile()
    {
        $info_perusahaan = Auth::guard('perusahaanmitra')->user();

        abort_if(!$info_perusahaan, 403);

        $loker = $info_perusahaan->loker;

        return view('view_perusahaan.loker-profile-perusahaan',
            compact('info_perusahaan', 'loker'));
    }

    public function tampilanloker($id)
    {
        /** @var \App\Models\PerusahaanMitra $info_perusahaan */
        $info_perusahaan = Auth::guard('perusahaanmitra')->user();
        abort_if(!$info_perusahaan, 403);

        $loker = $info_perusahaan->loker()
            ->withCount('apply')
            ->where('id', $id)
            ->firstOrFail();

        $sessionKey = 'loker_viewed_' . $loker->id;
        if (!session()->has($sessionKey)) {
            $loker->increment('tayangan');
            session([$sessionKey => true]);
        }

        return view('view_perusahaan.tampilan-loker-perusahaan', compact('info_perusahaan', 'loker'));
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
        /**@var \App\Models\PerusahaanMitra $authPerusahaan*/
        $authPerusahaan = Auth::guard('perusahaanmitra')->user();
        $validatedData = $request->validate([
            'NamaPerusahaan' => 'required|string',
            'Alamat' => 'required|string',
            'Provinsi' => 'nullable|string',
            'Kabupaten' => 'nullable|string',
            'Kecamatan' => 'nullable|string',
            'Email' => 'required|email',
            'NoTelp' => 'required|string',
            'NoNpwp' => 'nullable',
            'GoogleMaps' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'TentangPerusahaan' => 'nullable|string',
        ], [
            'NamaPerusahaan.required' => 'Nama Perusahaan wajib diisi.',
            'Alamat.required' => 'Alamat wajib diisi.',
            'Provinsi.string' => 'Format Provinsi tidak valid.',
            'Kabupaten.string' => 'Format Kabupaten tidak valid.',
            'Kecamatan.string' => 'Format Kecamatan tidak valid.',
            'Email.required' => 'Email wajib diisi.',
            'Email.email' => 'Format email tidak valid.',
            'NoTelp.required' => 'Nomor Telepon wajib diisi.',
            'NoNpwp.string' => 'Format NPWP tidak valid.',
            'GoogleMaps.string' => 'Format Google Maps tidak valid.',
            'logo.image' => 'Logo Perusahaan harus berupa gambar.',
            'TentangPerusahaan.string' => 'Format Tentang Perusahaan tidak valid.',
        ]);
        // Update logo perusahaan jika ada file yang diunggah

        // Update data perusahaan
        $authPerusahaan->nama_perusahaan = $validatedData['NamaPerusahaan'];
        $authPerusahaan->alamat_perusahaan = $validatedData['Alamat'];
        $authPerusahaan->provinsi = $validatedData['Provinsi'] ?? $authPerusahaan->provinsi;
        $authPerusahaan->kabupaten = $validatedData['Kabupaten'] ?? $authPerusahaan->kabupaten;
        $authPerusahaan->kecamatan = $validatedData['Kecamatan'] ?? $authPerusahaan->kecamatan;
        $authPerusahaan->email_perusahaan = $validatedData['Email'];
        $authPerusahaan->no_telp_perusahaan = $validatedData['NoTelp'];
        $authPerusahaan->no_npwp = $validatedData['NoNpwp'];
        $authPerusahaan->google_maps = $validatedData['GoogleMaps'] ?? $authPerusahaan->google_maps;
        $authPerusahaan->tentang_perusahaan = $validatedData['TentangPerusahaan'] ?? $authPerusahaan->tentang_perusahaan;

        if ($request->hasFile('logo')) {
            $logoPath = storage_path('app/public/logo_perusahaan/' . $authPerusahaan->logo);
            if (file_exists($logoPath)) {
                unlink($logoPath); // Hapus file logo lama
            }
            $logoFile = $request->file('logo');
            $logoFilename = time() . '_' . $logoFile->getClientOriginalName();
            $logoFile->storeAs('logo_perusahaan', $logoFilename , 'public');
            $authPerusahaan->logo = $logoFilename;
            }
        // Jika sebelumnya gagal, ubah jadi pending lagi
        if ($authPerusahaan->status_akun == 'verifikasi_gagal') {
            $authPerusahaan->status_akun = 'pending';
            $authPerusahaan->deskripsi_status = null; // hapus pesan lama
        }
        $authPerusahaan->save();


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

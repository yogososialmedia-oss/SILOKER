<?php

namespace App\Http\Controllers\PencariKerja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('pencarikerja')->user();

        return view('view_pencari_kerja.profile-pencari-kerja', compact('user'));
    }

    public function showEditProfilePencariKerja()
    {
        $user = Auth::guard('pencarikerja')->user();

        return view('view_pencari_kerja.edit-profile-pencari-kerja', compact('user'));
    }

    public function showHistoryApply()
    {
        $user = Auth::guard('pencarikerja')->user();

        $historyApplies = \App\Models\Apply::with(['perusahaanMitra', 'loker'])
                            ->where('id_pencari_kerja', $user->id)
                            ->latest()
                            ->get();

        return view('view_pencari_kerja.history-apply-pencari-kerja', compact('user', 'historyApplies'));
    }

    public function showProfilePerusahaanpencariKerja($id)
    {
        $info_perusahaan = \App\Models\PerusahaanMitra::find($id);

        if (!$info_perusahaan) {
            abort(404, 'Perusahaan tidak ditemukan');
        }

        return view('view_pencari_kerja.profile-perusahaan', compact('info_perusahaan'));
    }

    public function showLokerPerusahaanpencariKerja($id)
    {
        $info_perusahaan = \App\Models\PerusahaanMitra::find($id);

        if (!$info_perusahaan) {
            abort(404, 'Perusahaan tidak ditemukan');
        }

        // Ambil semua lowongan milik perusahaan
        $lokerPerusahaan = \App\Models\Loker::where('id_perusahaan_mitra', $id)
                            ->latest()
                            ->get();

        return view('view_pencari_kerja.loker-profile-perusahaan', compact('info_perusahaan', 'lokerPerusahaan'));
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
    public function update(Request $request)
    {
        /** @var \App\Models\PencariKerja $user */
        $user = Auth::guard('pencarikerja')->user();

        $request->validate([
            'nama_pencari_kerja' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'email_pencari_kerja' => 'required|email|max:255|unique:tb_pencari_kerja,email_pencari_kerja,' . $user->id,
            'no_telp_pencari_kerja' => 'nullable|string|max:20',
            'alamat_pencari_kerja' => 'nullable|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'pendidikan_terakhir' => 'nullable|string|max:50',
            'deskripsi_diri' => 'nullable|string',
            'cv' => 'nullable|mimes:pdf|max:2048',
            'foto_pencari_kerja' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update field
        $user->nama_pencari_kerja = $request->nama_pencari_kerja;
        $user->nim = $request->nim;
        $user->email_pencari_kerja = $request->email_pencari_kerja;
        $user->no_telp_pencari_kerja = $request->no_telp_pencari_kerja;
        $user->alamat_pencari_kerja = $request->alamat_pencari_kerja;
        $user->linkedin = $request->linkedin;
        $user->pendidikan_terakhir = $request->pendidikan_terakhir;
        $user->deskripsi_diri = $request->deskripsi_diri;

        // Upload CV
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = 'cv_' . $user->id . '.' . $cv->getClientOriginalExtension();
            $cvPath = $request->file('cv')->store('cv', 'public');
            $user->cv = $cvPath;
        }

        // Upload Foto Profile
        if ($request->hasFile('foto_pencari_kerja')) {
            $foto = $request->file('foto_pencari_kerja');
            $fotoName = 'profile_' . $user->id . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('public/profile', $fotoName);
            $user->foto_pencari_kerja = $fotoName;
        }

        $user->save();

        return redirect()->route('pencarikerja.profile')->with('success', 'Profile berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

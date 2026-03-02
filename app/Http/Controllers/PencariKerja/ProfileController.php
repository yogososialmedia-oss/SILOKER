<?php

namespace App\Http\Controllers\PencariKerja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $info_perusahaan = \App\Models\PerusahaanMitra::findOrFail($id);

        $loker = $info_perusahaan->loker()
                        ->withCount('apply')
                        ->latest()
                        ->paginate(6);

        return view('view_pencari_kerja.loker-profile-perusahaan',
            compact('info_perusahaan', 'loker'));
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
            'no_telp_pencari_kerja' => 'required|string|max:20',
            'alamat_pencari_kerja' => 'required|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'pendidikan_terakhir' => 'required|string|max:50',
            'deskripsi_diri' => 'nullable|string',

            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'foto_pencari_kerja' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [

            // 🔹 NAMA
            'nama_pencari_kerja.required' => 'Nama Lengkap wajib diisi.',
            'nama_pencari_kerja.max' => 'Nama Lengkap maksimal 255 karakter.',

            // 🔹 NIM
            'nim.max' => 'NIM maksimal 50 karakter.',

            // 🔹 EMAIL
            'email_pencari_kerja.required' => 'Email wajib diisi.',
            'email_pencari_kerja.email' => 'Format email tidak valid.',
            'email_pencari_kerja.unique' => 'Email sudah digunakan oleh akun lain.',
            'email_pencari_kerja.max' => 'Email maksimal 255 karakter.',

            // 🔹 NO TELEPON
            'no_telp_pencari_kerja.required' => 'No Telepon wajib diisi.',
            'no_telp_pencari_kerja.max' => 'No Telepon maksimal 20 karakter.',

            // 🔹 ALAMAT
            'alamat_pencari_kerja.required' => 'Alamat wajib diisi.',
            'alamat_pencari_kerja.max' => 'Alamat maksimal 255 karakter.',

            // 🔹 LINKEDIN
            'linkedin.url' => 'Link LinkedIn harus berupa URL yang valid.',
            'linkedin.max' => 'Link LinkedIn maksimal 255 karakter.',

            // 🔹 PENDIDIKAN
            'pendidikan_terakhir.required' => 'Pendidikan Terakhir wajib dipilih.',
            'pendidikan_terakhir.max' => 'Pendidikan Terakhir maksimal 50 karakter.',

            // 🔹 DESKRIPSI
            'deskripsi_diri.string' => 'Tentang Saya harus berupa teks.',

            // 🔹 CV
            'cv.file' => 'CV harus berupa file.',
            'cv.mimes' => 'Upload CV harus berformat PDF.',
            'cv.max' => 'Ukuran CV maksimal 2MB.',

            // 🔹 FOTO
            'foto_pencari_kerja.image' => 'Foto Profile harus berupa gambar.',
            'foto_pencari_kerja.mimes' => 'Foto Profile harus berformat JPG atau PNG.',
            'foto_pencari_kerja.max' => 'Ukuran Foto Profile maksimal 2MB.',
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

            // 🔴 Hapus CV lama jika ada
            if ($user->cv && Storage::disk('public')->exists($user->cv)) {
                Storage::disk('public')->delete($user->cv);
            }

            // 🟢 Upload CV baru
            $cvPath = $request->file('cv')->store('cv', 'public');
            $user->cv = $cvPath;
        }

        // Upload Foto Profile
        if ($request->hasFile('foto_pencari_kerja')) {

            if ($user->foto_pencari_kerja &&
                Storage::disk('public')->exists('profile/'.$user->foto_pencari_kerja)) {
                Storage::disk('public')->delete('profile/'.$user->foto_pencari_kerja);
            }

            $foto = $request->file('foto_pencari_kerja');
            $fotoName = 'profile_' . $user->id . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('profile', $fotoName, 'public');

            $user->foto_pencari_kerja = $fotoName;
        }

        $user->save();

        return redirect()->route('pencarikerja.profile')->with('success', 'Profile berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

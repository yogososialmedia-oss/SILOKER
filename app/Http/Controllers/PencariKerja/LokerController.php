<?php

namespace App\Http\Controllers\PencariKerja;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Simpan semua query ke session KECUALI kalau reset
        if ($request->has('reset')) {
            session()->forget('loker_filters');
        } else {
            session(['loker_filters' => $request->query()]);
        }

        $filters = session('loker_filters', []);

        $query = Loker::with('perusahaanMitra')
        ->whereDate('tanggal_mulai_loker', '<=', today())
        ->whereDate('tanggal_berakhir_loker', '>=', today());

        if (!empty($filters['provinsi'])) {
            $query->where('provinsi', $filters['provinsi']);
        }

        if (!empty($filters['kabupaten'])) {
            $query->where('kabupaten', $filters['kabupaten']);
        }

        if (!empty($filters['kecamatan'])) {
            $query->where('kecamatan', $filters['kecamatan']);
        }

        if (!empty($filters['jabatan'])) {
            $query->where('jabatan', 'like', '%' . $filters['jabatan'] . '%');
        }

        if (!empty($filters['tipe_loker'])) {
            $query->where('tipe_loker', $filters['tipe_loker']);
        }

        if (!empty($filters['model_kerja'])) {
            $query->where('model_kerja', $filters['model_kerja']);
        }

        if (!empty($filters['minimal_pendidikan'])) {
            $query->where('minimal_pendidikan', $filters['minimal_pendidikan']);
        }

        $lokers = $query->latest()->paginate(6)->withQueryString();

        return view('view_pencari_kerja.loker', compact('lokers', 'filters'));
    }

    public function showBeranda()
    {
        $lokers = Loker::with('perusahaanMitra')
            ->whereDate('tanggal_mulai_loker', '<=', today())
            ->whereDate('tanggal_berakhir_loker', '>=', today())
            ->latest()
            ->get(); // tampilkan semua yg open

        return view('view_pencari_kerja.beranda', compact('lokers'));
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
    public function show(Loker $loker)
    {
        $loker->load(['perusahaanMitra'])
            ->loadCount('apply');

        $userId = Auth::guard('pencarikerja')->id();

        if ($userId) {

            $sessionKey = 'viewed_loker_' . $loker->id . '_user_' . $userId;

            if (!session()->has($sessionKey)) {

                $loker->increment('tayangan');

                session()->put($sessionKey, true);
            }
        }

        return view('view_pencari_kerja.tampilan-loker-pencari-kerja',
            compact('loker'));
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

    public function applyForm(Loker $loker)
    {
        $pencari = Auth::guard('pencarikerja')->user();

        // WAJIB punya minimal salah satu: CV atau LinkedIn
        if (empty($pencari->cv) && empty($pencari->linkedin)) {
            return redirect()
                ->route('pencarikerja.profile')
                ->with('error', 
                    'Untuk melamar pekerjaan, Anda harus menambahkan minimal CV atau LinkedIn pada profile Anda.'
                );
        }

        return view('view_pencari_kerja.apply-loker',
            compact('loker', 'pencari'));
    }

    public function applyStore(Request $request, Loker $loker)
    {
        // 🚫 Cek apakah loker masih open
        if ($loker->status != 'open') {
            return back()->with('error', 'Lowongan sudah ditutup.');
        }

        $pencari = Auth::guard('pencarikerja')->user();

        // 🚫 WAJIB punya minimal salah satu: CV atau LinkedIn
        if (empty($pencari->cv) && empty($pencari->linkedin)) {
            return redirect()
                ->route('pencarikerja.profile')
                ->with('error',
                    'Profile Anda belum lengkap. 
                    Silakan tambahkan CV atau LinkedIn terlebih dahulu sebelum melamar.'
                );
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'pendidikan_terakhir' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required|string|max:255',
        ], [

            // 🔹 NAMA
            'nama.required' => 'Nama lengkap wajib diisi.',
            'nama.max' => 'Nama lengkap maksimal 255 karakter.',

            // 🔹 NIM
            'nim.max' => 'NIM maksimal 50 karakter.',

            // 🔹 PENDIDIKAN
            'pendidikan_terakhir.required' => 'Pendidikan terakhir wajib dipilih.',
            'pendidikan_terakhir.max' => 'Pendidikan terakhir maksimal 50 karakter.',

            // 🔹 EMAIL
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 255 karakter.',

            // 🔹 NO TELP
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.numeric' => 'Nomor telepon harus berupa angka.',
            'no_telp.digits_between' => 'Nomor telepon harus 10-15 digit.',

            // 🔹 ALAMAT
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
        ]);

        try {
            $cvApplyPath = null;

            // ✅ Jika pencari punya CV di profile, copy file ke folder arsip apply
            if (!empty($pencari->cv) && Storage::disk('public')->exists($pencari->cv)) {
                $extension = pathinfo($pencari->cv, PATHINFO_EXTENSION);
                $fileName = 'cv_apply_' . Str::uuid() . '.' . $extension;
                $newPath = 'apply/cv/' . $fileName;

                Storage::disk('public')->copy($pencari->cv, $newPath);

                $cvApplyPath = $newPath;
            }

            // ✅ LinkedIn otomatis ambil dari profile
            $validated['linkedin'] = $pencari->linkedin;

            // ✅ CV simpan hasil copy, bukan path profile asli
            $validated['cv'] = $cvApplyPath;

            $validated['tanggal_apply'] = now();
            $validated['id_pencari_kerja'] = $pencari->id;
            $validated['id_perusahaan_mitra'] = $loker->id_perusahaan_mitra;
            $validated['id_loker'] = $loker->id;

            // Simpan lamaran
            $loker->apply()->create($validated);

            // Tambah interaksi
            $loker->increment('interaksi');

            return redirect()
                ->route('pencarikerja.loker.show', $loker)
                ->with('success', 'Lamaran berhasil dikirim.');

        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()->with('error', 'Anda sudah melamar pada lowongan ini.');
            }

            throw $e;
        }
    }
}

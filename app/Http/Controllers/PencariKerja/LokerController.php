<?php

namespace App\Http\Controllers\PencariKerja;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

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

        $query = Loker::with('perusahaanMitra');

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
            ->latest() // urut dari terbaru
            ->take(4)  // hanya 4 data
            ->get();

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

        // 🚫 Jika belum upload CV
        if (!$pencari->cv) {
            return redirect()
                ->route('pencarikerja.profile')
                ->with('error', 'Silakan upload CV terlebih dahulu di menu Edit Profile sebelum melamar.');
        }

        return view('view_pencari_kerja.apply-loker',
            compact('loker', 'pencari'));
    }

    public function applyStore(Request $request, Loker $loker)
    {
        // 🚫 Cek dulu apakah loker masih open
        if (!now()->between(
            $loker->tanggal_mulai_loker,
            $loker->tanggal_berakhir_loker
        )) {
            return back()->with('error', 'Lowongan sudah ditutup.');
        }

        $pencari = Auth::guard('pencarikerja')->user();

        // 🚫 Proteksi: tidak boleh apply jika belum upload CV
        if (!$pencari->cv) {
            return redirect()
                ->route('pencarikerja.profile')
                ->with('error', 'Silakan upload CV terlebih dahulu di menu Edit Profile sebelum melamar.');
        }

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'linkedin' => 'nullable|url',
            'pendidikan_terakhir' => 'required|not_in:',
            'email' => 'required|email',
            'no_telp' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required',
        ]);

        try {

            // ✅ Ambil CV dari profile (bukan dari form)
            $validated['cv'] = $pencari->cv;

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

            // 1062 = Duplicate entry
            if ($e->errorInfo[1] == 1062) {
                return back()->with('error', 'Anda sudah melamar pada lowongan ini.');
            }

            throw $e; // error lain tetap dilempar
        }
    }
}

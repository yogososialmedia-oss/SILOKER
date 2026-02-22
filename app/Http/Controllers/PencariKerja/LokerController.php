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
        $query = Loker::with('perusahaanMitra');

        // FILTER PROVINSI
        if ($request->filled('provinsi')) {
            $query->where('provinsi', $request->provinsi);
        }

        // FILTER KABUPATEN
        if ($request->filled('kabupaten')) {
            $query->where('kabupaten', $request->kabupaten);
        }

        // FILTER KECAMATAN
        if ($request->filled('kecamatan')) {
            $query->where('kecamatan', $request->kecamatan);
        }

        // FILTER JABATAN (LIKE SEARCH)
        if ($request->filled('jabatan')) {
            $query->where('jabatan', 'like', '%' . $request->jabatan . '%');
        }

        // FILTER TIPE LOKER
        if ($request->filled('tipe_loker')) {
            $query->where('tipe_loker', $request->tipe_loker);
        }

        // FILTER MODEL KERJA
        if ($request->filled('model_kerja')) {
            $query->where('model_kerja', $request->model_kerja);
        }

        // FILTER MINIMAL PENDIDIKAN
        if ($request->filled('minimal_pendidikan')) {
            $query->where('minimal_pendidikan', $request->minimal_pendidikan);
        }

        $lokers = $query->latest()->paginate(6)->withQueryString();

        return view('view_pencari_kerja.loker', compact('lokers'));
    }

    public function showBeranda()
    {
        $lokers = Loker::with('perusahaanMitra')
            ->latest()
            ->take(6)
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

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:50',
            'linkedin' => 'nullable|url',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'pendidikan_terakhir' => 'required|not_in:',
            'email' => 'required|email',
            'no_telp' => 'required|numeric|digits_between:10,15',
            'alamat' => 'required',
        ]);

        try {

            // Upload CV
            if ($request->hasFile('cv')) {
                $path = $request->file('cv')->store('cv', 'public');
                $validated['cv'] = $path;
            }

            $validated['tanggal_apply'] = now();
            $validated['id_pencari_kerja'] = Auth::guard('pencarikerja')->id();
            $validated['id_perusahaan_mitra'] = $loker->id_perusahaan_mitra;
            $validated['id_loker'] = $loker->id;

            // Simpan lamaran
            $loker->apply()->create($validated);

            // Tambah interaksi
            $loker->increment('interaksi');

            return redirect()
                ->route('pencarikerja.loker.show', $loker)
                ->with('success', 'Lamaran berhasil dikirim!');

        } catch (QueryException $e) {

            // 1062 = Duplicate entry
            if ($e->errorInfo[1] == 1062) {
                return back()->with('error', 'Anda sudah melamar pada lowongan ini.');
            }

            throw $e; // error lain tetap dilempar
        }
    }
}

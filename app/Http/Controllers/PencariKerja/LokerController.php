<?php

namespace App\Http\Controllers\PencariKerja;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $lokers = Loker::with('perusahaanMitra')
        ->latest()
        ->paginate(6);

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

    $loker->increment('tayangan');

    $isOpen = now()->between(
        $loker->tanggal_mulai_loker,
        $loker->tanggal_berakhir_loker
    );

        return view('view_pencari_kerja.tampilan-loker-pencari-kerja', compact('loker', 'isOpen'));
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
        return view('view_pencari_kerja.apply-loker', compact('loker'));
    }

    public function applyStore(Request $request, Loker $loker)
    {
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

        // Upload CV
        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->store('cv', 'public');
            $validated['cv'] = $path;
        }

        $validated['tanggal_apply'] = now();
        $validated['id_pencari_kerja'] = Auth::guard('pencarikerja')->id();
        $validated['id_perusahaan_mitra'] = $loker->id_perusahaan_mitra;
        // Simpan ke tabel lamaran (pastikan kamu punya model Lamaran)
        $loker->apply()->create($validated);

        // Tambah interaksi
        $loker->increment('interaksi');

        if (!now()->between(
        $loker->tanggal_mulai_loker,
        $loker->tanggal_berakhir_loker
    )) {
        return back()->with('error', 'Lowongan sudah ditutup.');
    }

        return redirect()
            ->route('pencarikerja.loker.show', $loker)
            ->with('success', 'Lamaran berhasil dikirim!');
    }
}

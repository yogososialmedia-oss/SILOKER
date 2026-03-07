<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use App\Models\PerusahaanMitra;
use Illuminate\Http\Request;
use App\Exports\PerusahaanExport;
use Maatwebsite\Excel\Facades\Excel;

class VerifikasiPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status_akun = PerusahaanMitra::where('status_akun', 'pending')->get();
        return view('view_admin.verifikasi-perusahaan', compact('status_akun'));
    }
    public function showDaftarPerusahaan()
    {
        $perusahaanMitra = PerusahaanMitra::all();

        // Ambil tahun unik dari created_at
        $tahunList = PerusahaanMitra::selectRaw('YEAR(created_at) as tahun')
                        ->distinct()
                        ->orderBy('tahun', 'desc')
                        ->pluck('tahun');

        return view('view_admin.daftar-perusahaan', 
            compact('perusahaanMitra', 'tahunList')
        );
    }
    public function showDetailVerifikasi($id)
    {
        $perusahaanMitra = PerusahaanMitra::findOrFail($id);
        return view('view_admin.detail-verifikasi-perusahaan', compact('perusahaanMitra'));
    }
    public function showProfilePerusahaan($id)
    {
        $info_perusahaan = PerusahaanMitra::withCount('loker')
            ->findOrFail($id);

        return view('view_perusahaan.index-perusahaan', compact('info_perusahaan'));
    }
    public function showLowonganKerjaPerusahaan($id)
    {
        $info_perusahaan = PerusahaanMitra::findOrFail($id);

        $loker = $info_perusahaan->loker()
                    ->withCount('apply')
                    ->latest()
                    ->paginate(6);

        return view('view_perusahaan.loker-profile-perusahaan',
            compact('info_perusahaan', 'loker'));
    }
    public function showTampilanLoker($id)
    {
        $loker = Loker::with('perusahaanMitra')
            ->withCount('apply')
            ->findOrFail($id);

        $info_perusahaan = $loker->perusahaanMitra;

        return view('view_perusahaan.tampilan-loker-perusahaan',
            compact('info_perusahaan', 'loker'));
    }
    public function updateStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:tb_perusahaan_mitra,id',
            'Status' => 'required|in:terverifikasi,verifikasi_gagal',
            'Pesan' => 'nullable|string'
        ]);

        $perusahaan = PerusahaanMitra::findOrFail($request->id);

        $perusahaan->status_akun = $request->Status;

        if ($request->Status == 'verifikasi_gagal') {
            $perusahaan->deskripsi_status = $request->Pesan;
        } else {
            $perusahaan->deskripsi_status = null;
        }

        $perusahaan->save();

        return redirect()
            ->route('admin.verifikasi-perusahaan')
            ->with('success', 'Status berhasil diperbarui.');
    }
    public function exportExcel(Request $request)
    {
        $tahun = $request->query('tahun'); // ambil dari ?tahun=xxxx
        $namaFile = $tahun 
            ? 'daftar-perusahaan-'.$tahun.'.xlsx'
            : 'daftar-perusahaan-semua-tahun.xlsx';

        return Excel::download(
            new PerusahaanExport($tahun),
            $namaFile
        );
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

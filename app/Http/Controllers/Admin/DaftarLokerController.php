<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use Illuminate\Http\Request;
use App\Exports\LokerExport;
use Maatwebsite\Excel\Facades\Excel;

class DaftarLokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarLoker = Loker::with('perusahaanMitra')->latest()->get();

        $tahunList = Loker::selectRaw('YEAR(tanggal_mulai_loker) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('view_admin.daftar-loker', compact('daftarLoker', 'tahunList'));
    }
    public function showTampilanLoker($id)
    {
        $loker = Loker::with('perusahaanMitra')->withCount('apply')->findOrFail($id);

        $info_perusahaan = $loker->perusahaanMitra; // <-- tambahkan ini

        return view('view_perusahaan.tampilan-loker-perusahaan', compact('loker', 'info_perusahaan'));
    }
    public function exportExcel()
    {
        $tahun = request('tahun'); // ambil dari query string

        $namaFile = $tahun
            ? 'daftar-loker-' . $tahun . '.xlsx'
            : 'daftar-loker-semua-tahun.xlsx';

        return Excel::download(
            new LokerExport($tahun),
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

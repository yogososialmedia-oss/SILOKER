<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ApplyExport;
use App\Http\Controllers\Controller;
use App\Models\Apply;
use Maatwebsite\Excel\Facades\Excel;

class ApplyController extends Controller
{
    public function index()
    {
        $query = Apply::with(['loker.perusahaanMitra', 'pencariKerja'])
            ->latest();

        $tahunList = Apply::selectRaw('YEAR(tanggal_apply) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        if (request('tahun')) {
            $query->whereYear('tanggal_apply', request('tahun'));
        }

        $apply = $query->get();

        return view('view_admin.history-apply-keseluruhan', compact('apply', 'tahunList'));
    }

    public function detailApply($id)
    {
        $apply = Apply::with([
            'loker.perusahaanMitra',
            'pencariKerja'
        ])->findOrFail($id);

        return view('view_admin.detail-apply-admin', compact('apply'));
    }

    public function profilePelamar($id)
    {
        $apply = Apply::with('pencariKerja')->findOrFail($id);

        return view('view_admin.profile-pelamar-admin', compact('apply'));
    }

    public function historyApply($id)
    {
        $apply = Apply::with('pencariKerja')->findOrFail($id);

        $history = Apply::with('loker.perusahaanMitra')
            ->where('id_pencari_kerja', $apply->id_pencari_kerja)
            ->latest()
            ->get();

        return view('view_admin.history-apply-admin', compact('apply', 'history'));
    }

    public function exportExcelSemua()
    {
        $tahun = request('tahun');

        $namaFile = $tahun
            ? 'daftar-apply-' . $tahun . '.xlsx'
            : 'daftar-apply-semua-tahun.xlsx';

        return Excel::download(
            new ApplyExport(null, $tahun),
            $namaFile
        );
    }
    public function exportExcelPerLoker($id)
    {
        $tahun = request('tahun');

        $namaFile = $tahun
            ? 'daftar-apply-loker-' . $id . '-' . $tahun . '.xlsx'
            : 'daftar-apply-loker-' . $id . '.xlsx';

        return Excel::download(
            new ApplyExport($id, $tahun),
            $namaFile
        );
    }
}
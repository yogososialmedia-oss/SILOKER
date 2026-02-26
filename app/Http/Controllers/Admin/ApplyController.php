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
        $apply = Apply::with([
            'loker.perusahaanMitra',
            'pencariKerja'
        ])
        ->latest() 
        ->get();

        return view('view_admin.history-apply-keseluruhan', compact('apply'));
    }
    public function daftarApplyLoker($id)
    {
        $apply = Apply::with([
            'loker.perusahaanMitra',
            'pencariKerja'
        ])
        ->where('id_loker', $id)
        ->get();

        return view('view_admin.daftar-apply-admin', compact('apply'));
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

    public function exportExcel()
    {
        return Excel::download(
            new ApplyExport(),
            'daftar-apply-' . now()->format('d-m-Y') . '.xlsx'
        );
    }
}
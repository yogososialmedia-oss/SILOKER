<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaanId = Auth::guard('perusahaanmitra')->id();

        $apply = Apply::with([
            'loker.perusahaanMitra',
            'pencariKerja'
        ])
            ->whereHas('loker', function ($query) use ($perusahaanId) {
                $query->where('id_perusahaan_mitra', $perusahaanId);
            })
            ->get();

        return view('view_perusahaan.history-apply-perusahaan', compact('apply'));
    }

    public function daftarapplyloker($id)
    {
        $perusahaanId = Auth::guard('perusahaanmitra')->id();

        $apply = Apply::with('loker')
            ->where('id_loker', $id)
            ->whereHas('loker', function ($query) use ($perusahaanId) {
                $query->where('id_perusahaan_mitra', $perusahaanId);
            })
            ->get();

        return view('view_perusahaan.daftar-apply-perusahaan', compact('apply'));
    }
    public function detailapplyperusahaan($id)
    {
        $perusahaanId = Auth::guard('perusahaanmitra')->id();

        $apply = Apply::where('id', $id)
            ->whereHas('loker', function ($query) use ($perusahaanId) {
                $query->where('id_perusahaan_mitra', $perusahaanId);
            })
            ->firstOrFail();

        return view('view_perusahaan.detail-apply-perusahaan', compact('apply'));
    }
    public function showProfilePelamar($id)
    {
        $perusahaanId = Auth::guard('perusahaanmitra')->id();

        $apply = Apply::where('id', $id)
            ->whereHas('loker', function ($query) use ($perusahaanId) {
                $query->where('id_perusahaan_mitra', $perusahaanId);
            })
            ->firstOrFail();
        return view('view_perusahaan.profile-pencari-kerja-perusahaan', compact('apply'));
    }
    public function showHistoryApply($id)
    {
        $perusahaanId = Auth::guard('perusahaanmitra')->id();

        $apply = Apply::where('id', $id)
            ->whereHas('loker', function ($query) use ($perusahaanId) {
                $query->where('id_perusahaan_mitra', $perusahaanId);
            })
            ->firstOrFail();
        return view('view_perusahaan.history-apply-pencari-kerja', compact('apply'));
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

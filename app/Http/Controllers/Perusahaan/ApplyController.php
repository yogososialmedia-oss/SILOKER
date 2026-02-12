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

    $apply = Apply::with(['loker', 'pencariKerja'])
        ->whereHas('loker', function ($query) use ($perusahaanId) {
            $query->where('id_perusahaan_mitra', $perusahaanId);
        })
        ->get();

    return view('view_perusahaan.history-apply-perusahaan', compact('apply'));
}

    public function daftarapplyloker($id)
    {
        $apply = Apply::with('loker')->where('id_loker', $id)->get();
        return view('view_perusahaan.daftar-apply-perusahaan', compact('apply'));
    }
    public function detailapplyperusahaan($id)
    {
        $apply = Apply::with('loker')->findOrFail($id);
        return view('view_perusahaan.detail-apply-perusahaan', compact('apply'));
    }
    public function showProfilePelamar($id)
    {
        $apply = Apply::findOrFail($id);
        return view('view_perusahaan.profile-pencari-kerja-perusahaan', compact('apply'));
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use App\Models\PerusahaanMitra;
use Illuminate\Http\Request;

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
        return view('view_admin.daftar-perusahaan', compact('perusahaanMitra'));
    }
    public function showDetailVerifikasi($id)
    {
        $perusahaanMitra = PerusahaanMitra::findOrFail($id);
        return view('view_admin.detail-verifikasi-perusahaan', compact('perusahaanMitra'));
    }
    public function showProfilePerusahaan($id)
    {
        $info_perusahaan = PerusahaanMitra::findOrFail($id);
        return view('view_perusahaan.index-perusahaan', compact('info_perusahaan'));
    }
    public function showLowonganKerjaPerusahaan($id)
    {
        $info_perusahaan = Loker::with('perusahaanMitra')->findOrFail($id);
        return view('view_perusahaan.loker-profile-perusahaan', compact('info_perusahaan'));
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

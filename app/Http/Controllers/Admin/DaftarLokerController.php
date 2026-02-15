<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use Illuminate\Http\Request;

class DaftarLokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarLoker = Loker::with('perusahaanMitra')->latest()->get();
        return view('view_admin.daftar-loker', compact('daftarLoker'));
    }
    public function showTampilanLoker($id)
    {
        $loker = Loker::with('perusahaanMitra')->findOrFail($id);

        $info_perusahaan = $loker->perusahaanMitra; // <-- tambahkan ini

        return view('view_perusahaan.tampilan-loker-perusahaan', compact('loker', 'info_perusahaan'));
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

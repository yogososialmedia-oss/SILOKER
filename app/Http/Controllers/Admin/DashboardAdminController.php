<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use App\Models\PerusahaanMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Total loker
        $totalLoker = Loker::count();

        // Total perusahaan
        $totalPerusahaan = PerusahaanMitra::count();

        // Data grafik loker per bulan
        $lokerPerBulan = Loker::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Ambil loker terbaru untuk tabel
        $lokerTerbaru = Loker::with('perusahaanMitra')
            ->latest()
            ->take(5)
            ->get();

        return view('view_admin.dashboard', compact(
            'totalLoker',
            'totalPerusahaan',
            'lokerPerBulan',
            'lokerTerbaru'
        ));
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Loker;
use App\Models\PerusahaanMitra;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();

        $totalOpen = Loker::whereDate('tanggal_mulai_loker', '<=', $today)
            ->whereDate('tanggal_berakhir_loker', '>=', $today)
            ->count();

        $totalClose = Loker::whereDate('tanggal_berakhir_loker', '<', $today)
            ->count();

        $totalTayangan = Loker::sum('tayangan');
        $totalApply = Apply::count();
        $totalLowongan = Loker::count();
        $totalPerusahaan = PerusahaanMitra::count();

        $totalLowonganTerapply = Loker::whereHas('apply')->count();
        $totalApplyDiterima = Apply::where('status', 'diterima')->count();

        $lokerTerbaru = Loker::with('perusahaanMitra')
            ->withCount('apply')
            ->whereDate('tanggal_mulai_loker', '<=', $today)
            ->whereDate('tanggal_berakhir_loker', '>=', $today)
            ->get()
            ->sortByDesc(function ($loker) {
                return ($loker->tayangan * 1) + ($loker->apply_count * 5);
            })
            ->take(10)
            ->values();

        return view('view_admin.dashboard', compact(
            'totalOpen',
            'totalClose',
            'totalTayangan',
            'totalApply',
            'totalLowongan',
            'totalPerusahaan',
            'totalLowonganTerapply',
            'totalApplyDiterima',
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

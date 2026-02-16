<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use App\Models\PerusahaanMitra;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();

        // Loker OPEN
        $totalOpen = Loker::whereDate('tanggal_mulai_loker', '<=', $today)
            ->whereDate('tanggal_berakhir_loker', '>=', $today)
            ->count();

        // Loker CLOSE
        $totalClose = Loker::whereDate('tanggal_berakhir_loker', '<', $today)
            ->count();

        // Total interaksi
        $totalTayangan = Loker::sum('tayangan');
        $totalApply = Loker::sum('interaksi');

        $lokerTerbaru = Loker::with('perusahaanMitra')
        ->select('*', DB::raw('(COALESCE(tayangan,0) + COALESCE(interaksi,0)) as total_popularitas'))
        ->orderByDesc('total_popularitas')
        ->take(5)
        ->get();

        return view('view_admin.dashboard', compact(
            'totalOpen',
            'totalClose',
            'totalTayangan',
            'totalApply',
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

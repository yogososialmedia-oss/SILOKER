<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\StatusApplyMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ApplyExport;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaanId = Auth::guard('perusahaanmitra')->id();

        $query = Apply::with([
            'loker.perusahaanMitra',
            'pencariKerja'
        ])
        ->whereHas('loker', function ($query) use ($perusahaanId) {
            $query->where('id_perusahaan_mitra', $perusahaanId);
        })
        ->latest();

        // ambil daftar tahun
        $tahunList = Apply::selectRaw('YEAR(tanggal_apply) as tahun')
            ->whereHas('loker', function ($query) use ($perusahaanId) {
                $query->where('id_perusahaan_mitra', $perusahaanId);
            })
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        if (request('tahun')) {
            $query->whereYear('tanggal_apply', request('tahun'));
        }

        $apply = $query->get();

        return view('view_perusahaan.history-apply-perusahaan', compact('apply', 'tahunList'));
    }

    public function daftarapplyloker($id)
    {
        $perusahaanId = Auth::guard('perusahaanmitra')->id();

        $apply = Apply::with(['loker.perusahaanMitra','pencariKerja'])
            ->where('id_loker', $id)
            ->whereHas('loker', function ($query) use ($perusahaanId) {
                $query->where('id_perusahaan_mitra', $perusahaanId);
            })
            ->get();

        return view('view_perusahaan.daftar-apply-perusahaan', [
            'apply' => $apply,
            'id_loker' => $id // ⬅️ WAJIB dikirim
        ]);
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

        $apply = Apply::with(['pencariKerja', 'loker.perusahaanMitra'])
            ->where('id', $id)
            ->whereHas('loker', function ($query) use ($perusahaanId) {
                $query->where('id_perusahaan_mitra', $perusahaanId);
            })
            ->firstOrFail();

        // ambil semua history apply dari pencari kerja tersebut
        $history = Apply::with(['loker.perusahaanMitra'])
            ->where('id_pencari_kerja', $apply->id_pencari_kerja)
            ->latest()
            ->get();

        return view('view_perusahaan.history-apply-pencari-kerja', compact('apply', 'history'));
    }
    public function updateStatus(Request $request)
    {
        $id = $request->id_apply;

        $perusahaan = Auth::guard('perusahaanmitra')->user();

        $apply = Apply::with('pencariKerja')
            ->where('id', $id)
            ->whereHas('loker', function ($query) use ($perusahaan) {
                $query->where('id_perusahaan_mitra', $perusahaan->id);
            })
            ->firstOrFail();

        $request->validate([
            'id_apply' => 'required|exists:tb_apply,id',
            'status' => 'required|in:interview,ditolak,diterima',
            'pesan' => 'required|string|min:5',
        ],[
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
            'pesan.required' => 'Pesan untuk pelamar wajib diisi.',
            'pesan.min' => 'Pesan minimal 5 karakter.',
        ]);

        if ($request->status === 'interview') {
            $request->validate([
                'tanggal_interview' => 'required|date|after_or_equal:today',
                'waktu_interview' => 'required',
                'no_telp' => 'required|regex:/^[0-9]{10,15}$/',
                'google_maps' => 'required|url',
            ],[
                'tanggal_interview.required' => 'Tanggal interview wajib diisi.',
                'tanggal_interview.after_or_equal' => 'Tanggal interview tidak boleh sebelum hari ini.',
                'waktu_interview.required' => 'Waktu interview wajib diisi.',
                'no_telp.required' => 'Nomor telepon perusahaan wajib diisi.',
                'no_telp.regex' => 'Nomor telepon harus berupa angka 10 sampai 15 digit.',
                'google_maps.required' => 'Link Google Maps wajib diisi.',
                'google_maps.url' => 'Link Google Maps harus berupa URL yang valid.',
            ]);
        }

        if ($request->status === 'diterima') {
            $request->validate([
                'tanggal_kunjungan' => 'required|date|after_or_equal:today',
                'jam_kunjungan' => 'required',
                'no_telp' => 'required|regex:/^[0-9]{10,15}$/',
                'google_maps' => 'required|url',
            ],[
                'tanggal_kunjungan.required' => 'Tanggal kunjungan wajib diisi.',
                'tanggal_kunjungan.after_or_equal' => 'Tanggal kunjungan tidak boleh sebelum hari ini.',
                'jam_kunjungan.required' => 'Jam kunjungan wajib diisi.',
                'no_telp.required' => 'Nomor telepon perusahaan wajib diisi.',
                'no_telp.regex' => 'Nomor telepon harus berupa angka 10 sampai 15 digit.',
                'google_maps.required' => 'Link Google Maps wajib diisi.',
                'google_maps.url' => 'Link Google Maps harus berupa URL yang valid.',
            ]);
        }

        $apply->update([
            'status' => $request->status,
            'pesan' => $request->pesan,

            'tanggal_interview' => $request->status === 'interview' ? $request->tanggal_interview : null,
            'waktu_interview' => $request->status === 'interview' ? $request->waktu_interview : null,

            'tanggal_kunjungan' => $request->status === 'diterima' ? $request->tanggal_kunjungan : null,
            'jam_kunjungan' => $request->status === 'diterima' ? $request->jam_kunjungan : null,

            'no_telp' => in_array($request->status, ['interview', 'diterima']) ? $request->no_telp : null,
            'google_maps' => in_array($request->status, ['interview', 'diterima']) ? $request->google_maps : null,
        ]);

        Mail::to($apply->pencariKerja->email_pencari_kerja)
            ->send(new StatusApplyMail($apply));

        return back()->with('success', 'Status berhasil diperbarui dan email berhasil terkirim.');
    }
    public function exportExcelPerusahaan()
    {
        $perusahaanId = Auth::guard('perusahaanmitra')->id();
        $tahun = request('tahun');

        $namaFile = $tahun
            ? 'daftar-apply-perusahaan' . $tahun . '.xlsx'
            : 'daftar-apply-perusahaan-semua-tahun.xlsx';

        return Excel::download(
            new ApplyExport(null, $tahun, $perusahaanId),
            $namaFile
        );
    }
    public function exportPerLoker($id_loker)
    {
        $id_perusahaan = Auth::guard('perusahaanmitra')->id();

        $namaFile = 'apply-perloker-' . $id_loker . '.xlsx';

        return Excel::download(
            new ApplyExport($id_loker, null, $id_perusahaan),
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

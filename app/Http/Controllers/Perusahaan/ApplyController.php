<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\StatusApplyMail;
use Illuminate\Support\Facades\Mail;

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
            'status' => 'required',
            'pesan' => 'required|string|min:5',
            'tanggal_interview' => ['required_if:status,interview'], // wajib jika interview
            'tanggal_interview_date' => ['nullable','date','after_or_equal:today'], // validasi tanggal jika diisi
            'waktu_interview' => 'required_if:status,interview',
            'no_telp_perusahaan' => 'required_if:status,interview',
            'alamat_perusahaan' => 'required_if:status,interview',
        ], [
            'status.required' => 'Status wajib diisi.',
            'pesan.required' => 'Pesan wajib diisi.',
            'tanggal_interview.required_if' => 'Tanggal interview wajib diisi.',
            'tanggal_interview_date.date' => 'Format tanggal tidak valid.',
            'tanggal_interview_date.after_or_equal' => 'Tanggal interview minimal hari ini.',
            'waktu_interview.required_if' => 'Waktu interview wajib diisi.',
            'no_telp_perusahaan.required_if' => 'No telp wajib diisi.',
            'alamat_perusahaan.required_if' => 'Alamat wajib diisi.',
        ]);

        $apply->update([
            'status' => $request->status,
            'pesan' => $request->pesan,
            'tanggal_interview' => $request->tanggal_interview,
            'waktu_interview' => $request->waktu_interview,
            'no_telp_perusahaan' => $request->no_telp_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
        ]);

        // Kirim email
        Mail::to($apply->pencariKerja->email_pencari_kerja)
            ->send(new StatusApplyMail($apply));

        return back()->with('success', 'Status berhasil diperbarui & email terkirim');
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

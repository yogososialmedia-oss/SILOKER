<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loker = Loker::with('perusahaanMitra')->get();
        return view('view_perusahaan.daftar-loker-perusahaan', compact('loker'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info_perusahaan = Auth::guard('perusahaanmitra')->user();
        return view('view_perusahaan.input-loker-perusahaan', compact('info_perusahaan'));
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
        $loker = Loker::with('perusahaanMitra')->where('id', $id)->first();
        return view('view_perusahaan.edit-loker-perusahaan', compact('loker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $authPerusahaan = Auth::guard('perusahaanmitra')->user();
        $loker = Loker::where('id', $id)->where('id_perusahaan_mitra', $authPerusahaan->id)->first();
        $validatedData = $request->validate([
            'email_perusahaan' => 'required|email',
            'no_telp_perusahaan' => 'required|string',
            'jabatan' => 'required|string',
            'tanggal_mulai_loker' => 'required|date',
            'tanggal_berakhir_loker' => 'required|date|after_or_equal:tanggal_mulai_loker',
            'poster_loker' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'alamat' => 'required|string',
            'model_kerja' => 'required|string|in:WFH,WFO,Hybrid',
            'tipe_loker' => 'required|string|in:job_opportunity,internship',
            'minimal_pendidikan' => 'required|string|in:SMA/Sederajat,D1,D2,D3,S1,S2,S3',
            'deskripsi' => 'required|string',
        ],
        [
            'email_perusahaan.email' => 'The email format is invalid.',
            'tanggal_mulai_loker.date' => 'The start date must be a valid date.',
            'tanggal_berakhir_loker.date' => 'The end date must be a valid date.',
            'tanggal_berakhir_loker.after_or_equal' => 'The end date must be a date after or equal to the start date.',
            'model_kerja.in' => 'The selected model kerja is invalid.',
            'tipe_loker.in' => 'The selected tipe loker is invalid.',
            'minimal_pendidikan.in' => 'The selected minimal pendidikan is invalid.',
        ]);

        $loker->nama_perusahaan = $validatedData['NamaPerusahaan'];
        $loker->no_telp_perusahaan = $validatedData['NoTelp'];
        $loker->jabatan = $validatedData['Jabatan'];
        $loker->tanggal_mulai_loker = $validatedData['TanggalMulaiLoker'];
        $loker->tanggal_berakhir_loker = $validatedData['TanggalBerakhirLoker'];
        if ($request->hasFile('poster_loker')) {
            $posterPath = storage_path('app/public/poster_loker/' . $loker->poster_loker);
            if (file_exists($posterPath)) {
                unlink($posterPath); // Hapus file poster lama
            }
            $posterFile = $request->file('poster_loker');
            $posterFilename = time() . '_' . $posterFile->getClientOriginalName();
            $posterFile->storeAs('public/poster_loker', $posterFilename);
            $loker->poster_loker = $posterFilename;
            }
        $loker->provinsi = $validatedData['Provinsi'];
        $loker->kabupaten = $validatedData['Kabupaten'];
        $loker->kecamatan = $validatedData['Kecamatan'];
        $loker->alamat = $validatedData['Alamat'];
        $loker->model_kerja = $validatedData['ModelKerja'];
        $loker->tipe_loker = $validatedData['TipeLoker'];
        $loker->minimal_pendidikan = $validatedData['MinimalPendidikan'];
        $loker->deskripsi = $validatedData['Deskripsi'];
        $loker->save();
        return redirect()->route('perusahaan.loker.index')->with('success', 'Lowongan kerja berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loker = Loker::with('perusahaanMitra')
        ->withCount('apply')
        ->where('id_perusahaan_mitra', Auth::guard('perusahaanmitra')->id())
        ->get();
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
        $authPerusahaan = Auth::guard('perusahaanmitra')->user();
        $validatedData = $request->validate([
            'email_perusahaan' => 'required|email',
            'no_telp_perusahaan' => 'required|string',
            'jabatan' => 'required|string',
            'tanggal_mulai_loker' => 'required|date',
            'tanggal_berakhir_loker' => 'required|date|after_or_equal:tanggal_mulai_loker',
            'poster_loker' => 'image|mimes:jpeg,png,jpg|max:2048',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'alamat' => 'required|string',
            'model_kerja' => 'required|string|in:Work From Home,Work From Office,Hybrid',
            'tipe_loker' => 'required|string|in:job_opportunity,internship',
            'minimal_pendidikan' => 'required|string|in:Minimal Pendidikan SMA/sederajat,Minimal Pendidikan D1,Minimal Pendidikan D2,Minimal Pendidikan D3,Minimal Pendidikan S1,Minimal Pendidikan S2,Minimal Pendidikan S3',
            'deskripsi' => 'required|string',
        ],
        [
            'email_perusahaan.required' => 'Email wajib diisi.',
            'email_perusahaan.email' => 'Format email tidak valid.',

            'no_telp_perusahaan.required' => 'Nomor telepon wajib diisi.',

            'jabatan.required' => 'Jabatan wajib diisi.',

            'tanggal_mulai_loker.required' => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai_loker.date' => 'Format tanggal mulai tidak valid.',

            'tanggal_berakhir_loker.required' => 'Tanggal selesai wajib diisi.',
            'tanggal_berakhir_loker.after_or_equal' => 'Tanggal selesai harus setelah tanggal mulai.',

            
            'poster_loker.image' => 'Poster harus berupa gambar.',
            'poster_loker.mimes' => 'Poster harus format JPG atau PNG.',
            'poster_loker.max' => 'Ukuran poster maksimal 2MB.',

            'provinsi.required' => 'Provinsi wajib dipilih.',
            'kabupaten.required' => 'Kabupaten wajib dipilih.',
            'kecamatan.required' => 'Kecamatan wajib dipilih.',
            'alamat.required' => 'Alamat wajib diisi.',

            'model_kerja.required' => 'Model kerja wajib dipilih.',
            'model_kerja.in' => 'Model kerja tidak valid.',

            'tipe_loker.required' => 'Tipe loker wajib dipilih.',
            'tipe_loker.in' => 'Tipe loker tidak valid.',

            'minimal_pendidikan.required' => 'Minimal pendidikan wajib dipilih.',
            'minimal_pendidikan.in' => 'Minimal pendidikan tidak valid.',

            'deskripsi.required' => 'Kualifikasi wajib diisi.',
        ]);
        $posterFile = $request->file('poster_loker');
        $posterFilename = time() . '_' . $posterFile->getClientOriginalName();
        $posterFile->storeAs('poster_loker', $posterFilename , 'public');
        Loker::create([
            'id_perusahaan_mitra' => $authPerusahaan->id,
            'email_perusahaan' => $validatedData['email_perusahaan'],
            'no_telp_perusahaan' => $validatedData['no_telp_perusahaan'],
            'jabatan' => $validatedData['jabatan'],
            'tanggal_mulai_loker' => $validatedData['tanggal_mulai_loker'],
            'tanggal_berakhir_loker' => $validatedData['tanggal_berakhir_loker'],
            'poster_loker' => $posterFilename,
            'provinsi' => $validatedData['provinsi'],
            'kabupaten' => $validatedData['kabupaten'],
            'kecamatan' => $validatedData['kecamatan'],
            'alamat' => $validatedData['alamat'],
            'model_kerja' => $validatedData['model_kerja'],
            'tipe_loker' => $validatedData['tipe_loker'],
            'minimal_pendidikan' => $validatedData['minimal_pendidikan'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);
        return redirect()->route('perusahaan.loker')->with('success', 'Lowongan kerja berhasil ditambahkan.');
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
        $loker = Loker::where('id', $id)->where('id_perusahaan_mitra', Auth::guard('perusahaanmitra')->id())->firstOrFail();
        return view('view_perusahaan.edit-loker-perusahaan', compact('loker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $authPerusahaan = Auth::guard('perusahaanmitra')->user();
        $loker = Loker::where('id', $id)->where('id_perusahaan_mitra', $authPerusahaan->id)->firstOrFail();
        $validatedData = $request->validate([
            'email_perusahaan' => 'required|email',
            'no_telp_perusahaan' => 'required|string',
            'jabatan' => 'required|string',
            'tanggal_mulai_loker' => 'required|date',
            'tanggal_berakhir_loker' => 'required|date|after_or_equal:tanggal_mulai_loker',
            'poster_loker' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'alamat' => 'required|string',
            'model_kerja' => 'required|string|in:Work From Home,Work From Office,Hybrid',
            'tipe_loker' => 'required|string|in:job_opportunity,internship',
            'minimal_pendidikan' => 'required|string|in:Minimal Pendidikan SMA/sederajat,Minimal Pendidikan D1,Minimal Pendidikan D2,Minimal Pendidikan D3,Minimal Pendidikan S1,Minimal Pendidikan S2,Minimal Pendidikan S3',
            'deskripsi' => 'required|string',
        ],
        [
            'email_perusahaan.required' => 'Email wajib diisi.',
            'email_perusahaan.email' => 'Format email tidak valid.',

            'no_telp_perusahaan.required' => 'Nomor telepon wajib diisi.',

            'jabatan.required' => 'Jabatan wajib diisi.',

            'tanggal_mulai_loker.required' => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai_loker.date' => 'Format tanggal mulai tidak valid.',

            'tanggal_berakhir_loker.required' => 'Tanggal selesai wajib diisi.',
            'tanggal_berakhir_loker.date' => 'Format tanggal selesai tidak valid.',
            'tanggal_berakhir_loker.after_or_equal' => 'Tanggal selesai harus setelah tanggal mulai.',

            'poster_loker.image' => 'Poster harus berupa gambar.',
            'poster_loker.mimes' => 'Format poster harus JPG atau PNG.',
            'poster_loker.max' => 'Ukuran poster maksimal 2MB.',

            'provinsi.required' => 'Provinsi wajib dipilih.',
            'kabupaten.required' => 'Kabupaten wajib dipilih.',
            'kecamatan.required' => 'Kecamatan wajib dipilih.',
            'alamat.required' => 'Alamat wajib diisi.',

            'model_kerja.required' => 'Model kerja wajib dipilih.',
            'model_kerja.in' => 'Model kerja tidak valid.',

            'tipe_loker.required' => 'Tipe loker wajib dipilih.',
            'tipe_loker.in' => 'Tipe loker tidak valid.',

            'minimal_pendidikan.required' => 'Minimal pendidikan wajib dipilih.',
            'minimal_pendidikan.in' => 'Minimal pendidikan tidak valid.',

            'deskripsi.required' => 'Kualifikasi wajib diisi.',
        ]);

        $loker->id_perusahaan_mitra = $authPerusahaan->id;
        $loker->email_perusahaan = $validatedData['email_perusahaan'];
        $loker->no_telp_perusahaan = $validatedData['no_telp_perusahaan'];
        $loker->jabatan = $validatedData['jabatan'];
        $loker->tanggal_mulai_loker = $validatedData['tanggal_mulai_loker'];
        $loker->tanggal_berakhir_loker = $validatedData['tanggal_berakhir_loker'];
        $loker->provinsi = $validatedData['provinsi'];
        $loker->kabupaten = $validatedData['kabupaten'];
        $loker->kecamatan = $validatedData['kecamatan'];
        $loker->alamat = $validatedData['alamat'];
        $loker->model_kerja = $validatedData['model_kerja'];
        $loker->tipe_loker = $validatedData['tipe_loker'];
        $loker->minimal_pendidikan = $validatedData['minimal_pendidikan'];
        $loker->deskripsi = $validatedData['deskripsi'];
        if ($request->hasFile('poster_loker')) {
            $posterPath = storage_path('app/public/poster_loker/' . $loker->poster_loker);
            if (file_exists($posterPath)) {
                Storage::disk('public')->delete('poster_loker/'.$loker->poster_loker); // Hapus file poster lama
            }
            $posterFile = $request->file('poster_loker');
            $posterFilename = time() . '_' . $posterFile->getClientOriginalName();
            $posterFile->storeAs('poster_loker', $posterFilename , 'public');
            $loker->poster_loker = $posterFilename;
        }
        $loker->save();
        return redirect()->route('perusahaan.loker')->with('success', 'Lowongan kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

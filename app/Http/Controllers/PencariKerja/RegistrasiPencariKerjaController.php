<?php

namespace App\Http\Controllers\PencariKerja;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationMail;
use Illuminate\Http\Request;
use App\Models\PencariKerja;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrasiPencariKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('view_pencari_kerja.registrasi-pencari-kerja');
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
        $request->validate([
            'nama_pencari_kerja' => 'required|string',
            'email_pencari_kerja' => 'required|email|unique:tb_pencari_kerja,email_pencari_kerja',
            'password_pencari_kerja' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[^A-Za-z0-9]/'
            ],
            'alamat_pencari_kerja' => 'required',
            'no_telp_pencari_kerja' => 'required',
            'cv' => 'nullable|mimes:pdf',
            'foto_pencari_kerja' => 'nullable|image|mimes:jpg,jpeg,png',
        ],
        [
            'nama_pencari_kerja.required' => 'Nama Lengkap wajib diisi.',
            'email_pencari_kerja.required' => 'Email wajib diisi.',
            'email_pencari_kerja.email' => 'Format email tidak valid.',
            'email_pencari_kerja.unique' => 'Email sudah terdaftar.',
            'password_pencari_kerja.required' => 'Password wajib diisi.',
            'password_pencari_kerja.min' => 'Password minimal 8 karakter.',
            'password_pencari_kerja.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol.',
            'alamat_pencari_kerja.required' => 'Alamat wajib diisi.',
            'no_telp_pencari_kerja.required' => 'No telepon wajib diisi.',
            'cv.mimes' => 'CV harus berupa file PDF.',
            'cv.max' => 'Ukuran CV maksimal 2MB.',
            'foto_pencari_kerja.image' => 'Foto Profile harus berupa gambar.',
            'foto_pencari_kerja.mimes' => 'Foto Profile harus berformat JPG, JPEG, atau PNG.',
            'foto_pencari_kerja.max' => 'Ukuran Foto Profile maksimal 2MB.',
        ]
        );

        // Upload CV
        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
        }

        // Upload Foto
        $fotoPath = null;
        if ($request->hasFile('foto_pencari_kerja')) {
            $fotoPath = $request->file('foto_pencari_kerja')->store('foto_pencari_kerja', 'public');
        }

        $token = uniqid(true); // generate token unik
        $user = PencariKerja::create([
        'nama_pencari_kerja' => $request->nama_pencari_kerja,
        'alamat_pencari_kerja' => $request->alamat_pencari_kerja,
        'no_telp_pencari_kerja' => $request->no_telp_pencari_kerja,
        'email_pencari_kerja' => $request->email_pencari_kerja,
        'password_pencari_kerja' => Hash::make($request->password_pencari_kerja),
        'nim' => $request->nim,
        'cv' => $cvPath,
        'foto_pencari_kerja' => $fotoPath,
        'pendidikan_terakhir' => $request->pendidikan_terakhir,
        'linkedin' => $request->linkedin,
        'deskripsi_diri' => $request->deskripsi_diri,
        'verification_token' => $token,
        ]);

        // Kirim email verifikasi
        Mail::to($user->email_pencari_kerja)
            ->send(new EmailVerificationMail($user, $token, 'pencarikerja'));

        return redirect()->route('pencarikerja.login')
            ->with('success', 'Registrasi berhasil! Silahkan cek email Anda untuk verifikasi.');
            
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

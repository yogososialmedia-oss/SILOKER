<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PerusahaanMitra extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'tb_perusahaan_mitra';
    protected $fillable = [
    'nama_perusahaan',
    'email_perusahaan',
    'provinsi',
    'kabupaten',
    'kecamatan',
    'no_telp_perusahaan',
    'alamat_perusahaan',
    'logo',
    'password_perusahaan',
    'no_npwp',
    'tentang_perusahaan',
    'google_maps',
    'status_akun',
    'deskripsi_status',
];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password_perusahaan',
    ];
    
    public function loker()
    {
        return $this->hasMany(Loker::class, 'id_perusahaan_mitra');
    }
}
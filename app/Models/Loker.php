<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $table = 'tb_loker';
    protected $fillable = [
        'id_perusahaan_mitra',
        'email_perusahaan',
        'no_telp_perusahaan',
        'jabatan',
        'tanggal_mulai_loker',
        'tanggal_berakhir_loker',
        'poster_loker',
        'kabupaten',
        'kecamatan',
        'model_kerja',
        'tipe_loker',
        'minimal_pendidikan',
        'deskripsi',
    ];

    public function perusahaanMitra()
    {
        return $this->belongsTo(PerusahaanMitra::class, 'id_perusahaan_mitra');
    }
}
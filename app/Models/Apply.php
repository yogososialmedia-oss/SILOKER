<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table = 'tb_apply';
    protected $fillable = [
        'id_perusahaan_mitra',
        'id_pencari_kerja',
        'id_loker',
        'linkedin',
        'tanggal_apply',
        'status',
        'tanggal_interview',
        'waktu_interview',
        'no_telp',
        'alamat'
    ];

    public function perusahaanMitra()
    {
        return $this->belongsTo(PerusahaanMitra::class, 'id_perusahaan_mitra');
    }

    public function pencariKerja()
    {
        return $this->belongsTo(PencariKerja::class, 'id_pencari_kerja');
    }

    public function loker()
    {
        return $this->belongsTo(Loker::class, 'id_loker');
    }
}

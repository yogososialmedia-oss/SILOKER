<?php

namespace Database\Seeders;

use App\Models\Loker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Loker::create([
        'id_perusahaan_mitra' => 1,
        'email_perusahaan' => 'majumundur@example.com',
        'no_telp_perusahaan' => '021-12345678',
        'jabatan' => 'Software Engineer',
        'tanggal_mulai_loker' => '2023-01-01',
        'tanggal_berakhir_loker' => '2023-12-31',
        'poster_loker' => 'poster_software_engineer.png',
        'provinsi' => 'Jakarta',
        'kabupaten' => 'Jakarta Selatan',
        'kecamatan' => 'Cilandak',
        'alamat' => 'Jl. Raya Cilandak No. 123',
        'model_kerja' => 'WFO',
        'tipe_loker' => 'internship',
        'minimal_pendidikan' => 'S1',
        'deskripsi' => 'Mencari Software Engineer yang berpengalaman di bidang pengembangan perangkat lunak.',
        ]);

        Loker::create([
        'id_perusahaan_mitra' => 2,
        'email_perusahaan' => 'maju@example.com',
        'no_telp_perusahaan' => '021-12345679',
        'jabatan' => 'Software Engineer',
        'tanggal_mulai_loker' => '2023-01-01',
        'tanggal_berakhir_loker' => '2023-12-31',
        'poster_loker' => 'poster_software_engineer.png',
        'provinsi' => 'Jakarta',
        'kabupaten' => 'Jakarta Selatan',
        'kecamatan' => 'Cilandak',
        'alamat' => 'Jl. Raya Cilandak No. 123',
        'model_kerja' => 'WFH',
        'tipe_loker' => 'internship',
        'minimal_pendidikan' => 'S1',
        'deskripsi' => 'Mencari Software Engineer yang berpengalaman di bidang pengembangan perangkat lunak.',
        ]);

        Loker::create([
        'id_perusahaan_mitra' => 3,
        'email_perusahaan' => 'mundur@example.com',
        'no_telp_perusahaan' => '021-12345677',
        'jabatan' => 'Software Engineer',
        'tanggal_mulai_loker' => '2023-01-01',
        'tanggal_berakhir_loker' => '2023-12-31',
        'poster_loker' => 'poster_software_engineer.png',
        'provinsi' => 'Jakarta',
        'kabupaten' => 'Jakarta Selatan',
        'kecamatan' => 'Cilandak',
        'alamat' => 'Jl. Raya Cilandak No. 123',
        'model_kerja' => 'Hybrid',
        'tipe_loker' => 'internship',
        'minimal_pendidikan' => 'S1',
        'deskripsi' => 'Mencari Software Engineer yang berpengalaman di bidang pengembangan perangkat lunak.',
        ]);
    }
}

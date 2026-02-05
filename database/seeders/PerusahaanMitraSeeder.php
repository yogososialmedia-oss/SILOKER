<?php

namespace Database\Seeders;

use App\Models\PerusahaanMitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerusahaanMitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerusahaanMitra::create([

        'nama_perusahaan' => 'PT. Maju Mundur',
        'email_perusahaan' => 'majumundur@example.com',
        'no_telp_perusahaan' => '081234567890',
        'alamat_perusahaan' => 'Jl. Maju Mundur No. 123',
        'provinsi' => 'Jawa Barat',
        'kabupaten' => 'Bandung',
        'kecamatan' => 'Cicendo',
        'logo' => 'logo_maju_mundur.png',
        'banner_perusahaan' => 'banner_maju_mundur.png',
        'password_perusahaan' => bcrypt('password123'),
        'no_npwp' => '1234567890123456',
        'tentang_perusahaan' => 'Perusahaan yang bergerak di bidang teknologi informasi.',
        'google_maps' => 'https://maps.google.com/?q=PT.+Maju+Mundur',
        'status_akun' => 'terverifikasi',
        'deskripsi_status' => 'Perusahaan mitra yang aktif',
        ]);
        
        PerusahaanMitra::create([

        'nama_perusahaan' => 'PT. Maju ',
        'email_perusahaan' => 'maju@example.com',
        'no_telp_perusahaan' => '081234567890',
        'alamat_perusahaan' => 'Jl. Maju Mundur No. 123',
        'provinsi' => 'Jawa Barat',
        'kabupaten' => 'Bandung',
        'kecamatan' => 'Cicendo',
        'logo' => 'logo_maju_mundur.png',
        'banner_perusahaan' => 'banner_maju_mundur.png',
        'password_perusahaan' => bcrypt('password123'),
        'no_npwp' => '1234567890123456',
        'tentang_perusahaan' => 'Perusahaan yang bergerak di bidang teknologi informasi.',
        'google_maps' => 'https://maps.google.com/?q=PT.+Maju+Mundur',
        'status_akun' => 'terverifikasi',
        'deskripsi_status' => 'Perusahaan mitra yang aktif',
        ]);

        PerusahaanMitra::create([

        'nama_perusahaan' => 'PT. Mundur',
        'email_perusahaan' => 'mundur@example.com',
        'no_telp_perusahaan' => '081234567890',
        'alamat_perusahaan' => 'Jl. Mundur No. 123',
        'provinsi' => 'Jawa Barat',
        'kabupaten' => 'Bandung',
        'kecamatan' => 'Cicendo',
        'logo' => 'logo_maju_mundur.png',
        'banner_perusahaan' => 'banner_maju_mundur.png',
        'password_perusahaan' => bcrypt('password123'),
        'no_npwp' => '1234567890123456',
        'tentang_perusahaan' => 'Perusahaan yang bergerak di bidang teknologi informasi.',
        'google_maps' => 'https://maps.google.com/?q=PT.+Maju+Mundur',
        'status_akun' => 'terverifikasi',
        'deskripsi_status' => 'Perusahaan mitra yang aktif',
        ]);
    }
}

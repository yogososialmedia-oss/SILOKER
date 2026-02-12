<?php

namespace Database\Seeders;

use App\Models\PencariKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PencariKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PencariKerja::create([
        'nama_pencari_kerja' => 'Andi',
        'alamat_pencari_kerja' => 'Jl. Merdeka No. 1, Jakarta',
        'no_telp_pencari_kerja' => '081234567890',
        'email_pencari_kerja' => 'andi@example.com',
        'password_pencari_kerja' => bcrypt('password'),
        'cv' => 'cv_andi.pdf',
        'nim' => '123456789',
        'deskripsi_diri' => 'Saya seorang pencari kerja yang bersemangat dan memiliki pengalaman di bidang IT.',
        'pendidikan_terakhir' => 'S1',
        'linkedin' => 'https://www.linkedin.com/in/andi',
        'foto_pencari_kerja' => 'foto_andi.jpg',
        ]);

        PencariKerja::create([
        'nama_pencari_kerja' => 'Ani',
        'alamat_pencari_kerja' => 'Jl. Merdeka No. 2, Jakarta',
        'no_telp_pencari_kerja' => '081234567890',
        'email_pencari_kerja' => 'ani@example.com',
        'password_pencari_kerja' => bcrypt('password'),
        'cv' => 'cv_andi.pdf',
        'nim' => '123456789',
        'deskripsi_diri' => 'Saya seorang pencari kerja yang bersemangat dan memiliki pengalaman di bidang IT.',
        'pendidikan_terakhir' => 'S1',
        'linkedin' => 'https://www.linkedin.com/in/andi',
        'foto_pencari_kerja' => 'foto_andi.jpg',
        ]);

        PencariKerja::create([
        'nama_pencari_kerja' => 'And',
        'alamat_pencari_kerja' => 'Jl. Merdeka No. 1, Jakarta',
        'no_telp_pencari_kerja' => '081234567890',
        'email_pencari_kerja' => 'and@example.com',
        'password_pencari_kerja' => bcrypt('password'),
        'cv' => 'cv_andi.pdf',
        'nim' => '123456789',
        'deskripsi_diri' => 'Saya seorang pencari kerja yang bersemangat dan memiliki pengalaman di bidang IT.',
        'pendidikan_terakhir' => 'S1',
        'linkedin' => 'https://www.linkedin.com/in/andi',
        'foto_pencari_kerja' => 'foto_andi.jpg',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Apply;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apply::create([
        'id_perusahaan_mitra' => 1,
        'id_pencari_kerja' => 1,
        'id_loker' => 1,
        'linkedin' => 'andiganteng',
        'tanggal_apply' => now(),
        'status' => 'pending',
        ]);

        Apply::create([
        'id_perusahaan_mitra' => 2,
        'id_pencari_kerja' => 2,
        'id_loker' => 2,
        'linkedin' => 'andigantengz',
        'tanggal_apply' => now(),
        'status' => 'pending',
        ]);

        Apply::create([
        'id_perusahaan_mitra' => 3,
        'id_pencari_kerja' => 3,
        'id_loker' => 3,
        'linkedin' => 'andigantengzs',
        'tanggal_apply' => now(),
        'status' => 'pending',
        ]);
    }
}

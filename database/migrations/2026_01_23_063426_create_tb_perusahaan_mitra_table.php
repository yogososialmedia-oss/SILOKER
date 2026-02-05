<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_perusahaan_mitra', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('email_perusahaan')->unique();
            $table->string('no_telp_perusahaan');
            $table->text('alamat_perusahaan');
            $table->string('logo')->nullable();
            $table->string('banner_perusahaan')->nullable();
            $table->string('password_perusahaan');
            $table->string('no_npwp');
            $table->enum('status_akun', ['pending', 'terverifikasi', 'verifikasi_gagal'])->default('pending');
            $table->text('deskripsi_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_perusahaan_mitra');
    }
};

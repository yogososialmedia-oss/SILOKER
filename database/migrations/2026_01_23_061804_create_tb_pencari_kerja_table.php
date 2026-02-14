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
        Schema::create('tb_pencari_kerja', function (Blueprint $table) {
            $table->id();
            $table->text('alamat_pencari_kerja');
            $table->string('nama_pencari_kerja');
            $table->string('email_pencari_kerja')->unique();
            $table->string('no_telp_pencari_kerja');
            $table->string('password_pencari_kerja');
            $table->string('cv')->nullable();
            $table->integer('nim')->nullable();
            $table->string('foto_pencari_kerja')->nullable();
            $table->text('deskripsi_diri')->nullable();
            $table->enum('pendidikan_terakhir', ['Pendidikan Terakhir SMA/sederajat', 'Pendidikan Terakhir D1', 'Pendidikan Terakhir D2', 'Pendidikan Terakhir D3', 'Pendidikan Terakhir S1', 'Pendidikan Terakhir S2', 'Pendidikan Terakhir S3'])->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pencari_kerja');
    }
};

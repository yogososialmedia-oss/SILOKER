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
        Schema::create('tb_apply', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_apply');
            $table->string('linkedin')->nullable();
            $table->enum('status', ['pending', 'diterima', 'ditolak', 'interview'])->default('pending');
            $table->foreignId('id_pencari_kerja')->constrained('tb_pencari_kerja')->onDelete('cascade');
            $table->foreignId('id_perusahaan_mitra')->constrained('tb_perusahaan_mitra')->onDelete('cascade');
            $table->foreignId('id_loker')->constrained('tb_loker')->onDelete('cascade');
            $table->timestamps();
            $table->date('tanggal_interview')->nullable();
            $table->time('waktu_interview')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('alamat')->nullable();
            $table->unique(['id_pencari_kerja', 'id_loker'], 'unique_apply_per_loker');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_apply');
    }
};

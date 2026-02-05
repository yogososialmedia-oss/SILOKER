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
        Schema::create('tb_loker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perusahaan_mitra')->constrained('tb_perusahaan_mitra')->onDelete('cascade');
            $table->string('email_perusahaan');
            $table->string('no_telp_perusahaan');
            $table->string('jabatan');
            $table->date('tanggal_mulai_loker');
            $table->date('tanggal_berakhir_loker');
            $table->string('poster_loker');
            $table->integer('tayangan') ->default(0);
            $table->integer('interaksi')->default(0);
            $table->enum('tipe_loker', ['job_opportunity', 'internship']);
            $table->text('deskripsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->enum('minimal_pendidikan', ['SMA/sederajat', 'D1', 'D2', 'D3', 'S1', 'S2', 'S3']);
            $table->enum('model_kerja', ['WFH', 'WFO', 'Hybrid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_loker');
    }
};

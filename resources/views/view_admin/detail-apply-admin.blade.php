<x-admin_perusahaan.layout>
    <!-- Wrapper utama konten halaman detail apply -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <!-- Card utama untuk menampilkan detail apply -->
                    <div class="card">
                        
                        <!-- Header card -->
                        <div class="card-header">
                            <h5 class="mb-0 fw-bold">DETAIL APPLY</h5>
                        </div>

                        <!-- Body card -->
                        <div class="card-body">
                            @php
                                // Ambil data pelamar dan loker dari relasi apply
                                $pelamar = $apply->pencariKerja ?? null;
                                $loker = $apply->loker ?? null;
                            @endphp

                            <!-- Row info pelamar -->
                            <div class="row">
                                <!-- Nama Lengkap -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->nama_pencari_kerja ?? '-' }}" disabled>
                                </div>

                                <!-- NIM mahasiswa (opsional) -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NIM (jika mahasiswa STIKOM)</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->nim ?? '-' }}" disabled>
                                </div>

                                <!-- Pendidikan terakhir -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->pendidikan_terakhir ?? '-' }}" disabled>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->email_pencari_kerja ?? '-' }}" disabled>
                                </div>

                                <!-- No. Telp -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Telp</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->no_telp_pencari_kerja ?? '-' }}" disabled>
                                </div>

                                <!-- Alamat -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->alamat_pencari_kerja ?? '-' }}" disabled>
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ===== LINKEDIN & CV ===== --}}
                            <div class="row">
                                {{-- LINKEDIN --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Linked.In</label><br>
                                    @if($apply->linkedin)
                                        <!-- Tombol link ke LinkedIn pelamar -->
                                        <a href="{{ $apply->linkedin }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                            Lihat Profil Linked.In
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak tersedia</span>
                                    @endif
                                </div>

                                {{-- CV --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Curriculum Vitae (CV)</label><br>
                                    @if($pelamar?->cv)
                                        <!-- Tombol untuk membuka modal CV -->
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCV">
                                            Lihat CV
                                        </button>
                                    @else
                                        <span class="text-muted">Pelamar melamar tanpa CV</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Modal untuk menampilkan CV jika ada --}}
                            @if($pelamar?->cv)
                                <div class="modal fade" id="modalCV" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Curriculum Vitae</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <!-- Iframe untuk menampilkan CV dari storage -->
                                                <iframe src="{{ asset('storage/' . $pelamar->cv) }}" width="100%" height="600px" style="border:none;"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- ===== BACK BUTTON ===== --}}
                            <div class="text-end mt-4">
                                <!-- Tombol kembali ke halaman history apply untuk loker terkait -->
                                <a href="{{ route('admin.history-apply', $loker->id) }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer halaman -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl py-4">
                ©2026 Yogo & Wahyu
            </div>
        </footer>
    </div>
</x-admin_perusahaan.layout>
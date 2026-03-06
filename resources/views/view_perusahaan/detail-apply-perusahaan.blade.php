<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        {{-- HEADER CARD DETAIL APPLY --}}
                        <div class="card-header">
                            <h5 class="mb-0 fw-bold">DETAIL APPLY</h5>
                        </div>

                        <div class="card-body">
                            @php
                                // Ambil data pelamar dan data loker terkait apply
                                $pelamar = $apply->pencariKerja ?? null;
                                $loker = $apply->loker ?? null;
                            @endphp

                            {{-- ===== DATA FORM (VIEW ONLY) ===== --}}
                            <div class="row">
                                {{-- NAMA LENGKAP --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->nama_pencari_kerja ?? '-' }}" disabled>
                                </div>

                                {{-- NIM MAHASISWA --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NIM (jika mahasiswa STIKOM)</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->nim ?? '-' }}" disabled>
                                </div>

                                {{-- PENDIDIKAN TERAKHIR --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->pendidikan_terakhir ?? '-' }}" disabled>
                                </div>

                                {{-- EMAIL --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->email_pencari_kerja ?? '-' }}" disabled>
                                </div>

                                {{-- NO TELP --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Telp</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->no_telp_pencari_kerja ?? '-' }}" disabled>
                                </div>

                                {{-- ALAMAT --}}
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
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCV">
                                            Lihat CV
                                        </button>
                                    @else
                                        <span class="text-muted">Pelamar melamar tanpa CV</span>
                                    @endif
                                </div>
                            </div>

                            {{-- ===== MODAL CV ===== --}}
                            @if($pelamar?->cv)
                                <div class="modal fade" id="modalCV" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Curriculum Vitae</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                {{-- IFRAME UNTUK MENAMPILKAN CV --}}
                                                <iframe src="{{ asset('storage/' . $pelamar->cv) }}" width="100%" height="600px" style="border:none;"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- ===== BACK BUTTON ===== --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('perusahaan.apply', $loker->id) }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FOOTER --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl py-4">
                ©2026 Yogo & Wahyu
            </div>
        </footer>
    </div>
</x-admin_perusahaan.layout>
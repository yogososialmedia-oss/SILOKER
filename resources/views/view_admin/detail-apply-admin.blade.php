<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-header">
                            <h5 class="mb-0 fw-bold">DETAIL APPLY</h5>
                        </div>

                        <div class="card-body">
                            @php
                                $pelamar = $apply->pencariKerja ?? null;
                                $loker = $apply->loker ?? null;
                            @endphp

                            <div class="row">
                                {{-- Nama Lengkap --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->nama_pencari_kerja ?? '-' }}" disabled>
                                </div>

                                {{-- NIM --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NIM (jika mahasiswa STIKOM)</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->nim ?? '-' }}" disabled>
                                </div>

                                {{-- Pendidikan --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->pendidikan_terakhir ?? '-' }}" disabled>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" value="{{ $pelamar?->email_pencari_kerja ?? '-' }}" disabled>
                                </div>

                                {{-- No. Telp --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Telp</label>
                                    <input type="text" class="form-control" value="{{ $pelamar->no_telp ?? ($pelamar?->no_telp_pencari_kerja ?? '-') }}" disabled>
                                </div>

                                {{-- Alamat --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" value="{{ $pelamar->alamat ?? ($pelamar?->alamat_pencari_kerja ?? '-') }}" disabled>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                {{-- LinkedIn --}}
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
                                    @if($apply->cv)
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCV">
                                            Lihat CV
                                        </button>
                                    @else
                                        <span class="text-muted">Pelamar melamar tanpa CV</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Modal CV --}}
                            @if($apply->cv)
                                <div class="modal fade" id="modalCV" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Curriculum Vitae</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <iframe src="{{ asset('storage/' . $apply->cv) }}" width="100%" height="600px" style="border:none;"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Back --}}
                            <div class="text-end mt-4">
                                <a href="{{ route('admin.history-apply') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl py-4">
                ©2026 Yogo & Wahyu
            </div>
        </footer>
    </div>
</x-admin_perusahaan.layout>
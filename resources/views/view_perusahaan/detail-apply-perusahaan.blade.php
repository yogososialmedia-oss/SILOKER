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

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control"
                                        value="{{ $pelamar?->nama_pencari_kerja ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" class="form-control"
                                        value="{{ $loker?->jabatan ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control"
                                        value="{{ $apply->linkedin ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NIM (Jika Mahasiswa STIKOM)</label>
                                    <input type="text" class="form-control"
                                        value="{{ $pelamar?->nim ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control"
                                        value="{{ $pelamar?->email_pencari_kerja ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Telp</label>
                                    <input type="text" class="form-control"
                                        value="{{ $pelamar?->no_telp_pencari_kerja ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label d-block">Curriculum Vitae (CV)</label>

                                    @if($pelamar?->cv)

                                        <!-- Tombol di bawah tulisan -->
                                        <button type="button" 
                                                class="btn btn-primary mt-2"
                                                onclick="toggleCV()">
                                            Lihat CV
                                        </button>

                                        <!-- Preview CV -->
                                        <div id="cvPreview" class="mt-3" style="display: none;">
                                            <iframe 
                                                src="{{ asset('storage/' . $pelamar->cv) }}" 
                                                width="100%" 
                                                height="600px"
                                                style="border:1px solid #ddd; border-radius:8px;">
                                            </iframe>
                                        </div>

                                    @else
                                        <div class="alert alert-warning mt-2">
                                            CV belum diupload oleh pelamar.
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control"
                                        value="{{ $pelamar?->alamat_pencari_kerja ?? '-' }}" readonly>
                                </div>

                                <div class="col-12 text-end mt-3">
                                            <a href="{{ route('perusahaan.apply.loker', $loker->id) }}" class="btn btn-secondary">
                                                Kembali
                                        </a>
                                </div>
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

    <script>
        function toggleCV() {
            var cv = document.getElementById("cvPreview");

            if (cv.style.display === "none") {
                cv.style.display = "block";
            } else {
                cv.style.display = "none";
            }
        }
    </script>
</x-admin_perusahaan.layout>



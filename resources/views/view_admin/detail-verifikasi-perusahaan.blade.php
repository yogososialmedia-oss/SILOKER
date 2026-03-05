<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        {{-- HEADER --}}
                        <div class="card-header">
                            <h5 class="mb-0 fw-bold">DETAIL REGISTRASI</h5>
                        </div>

                        <div class="card-body">

                            {{-- ===== DATA PERUSAHAAN (VIEW ONLY) ===== --}}
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $perusahaanMitra->nama_perusahaan }}"
                                        disabled
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. NPWP</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $perusahaanMitra->no_npwp }}"
                                        disabled
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $perusahaanMitra->email_perusahaan }}"
                                        disabled
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Telp</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $perusahaanMitra->no_telp_perusahaan }}"
                                        disabled
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Provinsi</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $perusahaanMitra->provinsi }}"
                                        disabled
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kabupaten</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $perusahaanMitra->kabupaten }}"
                                        disabled
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kecamatan</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $perusahaanMitra->kecamatan }}"
                                        disabled
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $perusahaanMitra->alamat_perusahaan }}"
                                        disabled
                                    >
                                </div>

                            </div>

                            <hr class="my-4">

                            {{-- ===== INFORMASI TAMBAHAN ===== --}}
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Google Maps</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $perusahaanMitra->google_maps }}"
                                        disabled
                                    >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status Akun</label>
                                    <input
                                        type="text"
                                        class="form-control text-uppercase"
                                        value="{{ $perusahaanMitra->status_akun }}"
                                        disabled
                                    >
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Tentang Perusahaan</label>
                                    <textarea
                                        class="form-control"
                                        rows="4"
                                        disabled
                                    >{{ $perusahaanMitra->tentang_perusahaan }}</textarea>
                                </div>

                            </div>

                            {{-- ===== BACK BUTTON ===== --}}
                            <div class="text-end mt-4">
                                <a
                                    href="{{ route('admin.verifikasi-perusahaan') }}"
                                    class="btn btn-secondary"
                                >
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
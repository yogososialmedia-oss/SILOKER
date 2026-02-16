<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <input class="form-control"
                                        value="{{ $perusahaanMitra->nama_perusahaan }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No NPWP</label>
                                    <input class="form-control"
                                        value="{{ $perusahaanMitra->no_npwp }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control"
                                        value="{{ $perusahaanMitra->email_perusahaan }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Telp</label>
                                    <input class="form-control"
                                        value="{{ $perusahaanMitra->no_telp_perusahaan }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Provinsi</label>
                                    <input class="form-control"
                                        value="{{ $perusahaanMitra->provinsi }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kabupaten</label>
                                    <input class="form-control"
                                        value="{{ $perusahaanMitra->kabupaten }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Kecamatan</label>
                                    <input class="form-control"
                                        value="{{ $perusahaanMitra->kecamatan }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input class="form-control"
                                        value="{{ $perusahaanMitra->alamat_perusahaan }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Google Maps</label>
                                    <input class="form-control"
                                        value="{{ $perusahaanMitra->google_maps }}" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Status Akun</label>
                                    <input class="form-control"
                                        value="{{ strtoupper($perusahaanMitra->status_akun) }}" readonly>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Tentang Perusahaan</label>
                                    <textarea class="form-control" rows="4" readonly>{{ $perusahaanMitra->tentang_perusahaan }}</textarea>
                                </div>

                            </div>
                            <div class="d-flex justify-content-end pt-3 border-top ">
                                <a href="{{ route('admin.verifikasi-perusahaan') }}"
                                class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin_perusahaan.layout>

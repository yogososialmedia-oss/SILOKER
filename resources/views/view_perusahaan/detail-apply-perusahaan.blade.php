<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 fw-bold">Detail Apply</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control"
                                        value="{{ $apply->pencariKerja->nama_pencari_kerja ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" class="form-control"
                                        value="{{ $apply->loker->jabatan ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control"
                                        value="{{ $apply->linkedin ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">NIM (Jika Mahasiswa STIKOM)</label>
                                    <input type="text" class="form-control"
                                        value="{{ $apply->pencariKerja->nim ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control"
                                        value="{{ $apply->pencariKerja->email_pencari_kerja ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Telp</label>
                                    <input type="text" class="form-control"
                                        value="{{ $apply->pencariKerja->no_telp_pencari_kerja ?? '-' }}" readonly>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control"
                                        value="{{ $apply->pencariKerja->alamat_pencari_kerja ?? '-' }}" readonly>
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
</x-admin_perusahaan.layout>



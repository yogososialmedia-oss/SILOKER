<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0 fw-bold">Input Loker</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('perusahaan.loker.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Nama Perusahaan</label>
                                        <input name="nama_perusahaan" type="text" class="form-control"
                                            value="{{ $info_perusahaan->nama_perusahaan ?? '' }}"
                                            placeholder="Tambahkan nama perusahaan" readonly>
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input name="jabatan" type="text" class="form-control"
                                            placeholder="Tambahkan jabatan">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email_perusahaan" type="email" class="form-control"
                                            placeholder="Tambahkan email perusahaan"
                                            value="{{ $info_perusahaan->email_perusahaan ?? '' }}">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">No.Telp</label>
                                        <input name="no_telp_perusahaan" type="text" class="form-control"
                                            placeholder="Tambahkan nomor telepon perusahaan"
                                            value="{{ $info_perusahaan->no_telp_perusahaan ?? '' }}">
                                        <div class="form-text"></div>
                                    </div>
                                    <!-- Tanggal Mulai -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Mulai</label>
                                        <input id="tanggal_mulai" name="tanggal_mulai_loker" type="date" class="form-control" min="{{ now()->toDateString() }}">
                                    </div>

                                    <!-- Tanggal Berakhir -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Tanggal Selesai</label>
                                        <input id="tanggal_selesai" name="tanggal_berakhir_loker" type="date"class="form-control" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Poster Loker</label>
                                        <input name="poster_loker" type="file" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Provinsi</label>
                                        <select name="provinsi" id="ProvinsiSelect" class="form-select">
                                            <option value="">Pilih Provinsi</option>
                                            <option value="Bali">Bali</option>
                                            <option value="Banda Aceh">Banda Aceh</option>
                                            <option value="Medan">Medan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Kabupaten</label>
                                        <select name="kabupaten" id="KabupatenSelect" class="form-select">
                                            <option value="">Pilih Kabupaten</option>
                                            <option value="Tabanan">Tabanan</option>
                                            <option value="Buleleng">Buleleng</option>
                                            <option value="Badung">Badung</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Kecamatan</label>
                                        <select name="kecamatan" id="KecamatanSelect" class="form-select">
                                            <option value="">Pilih Kecamatan</option>
                                            <option value="Tabanan">Kediri</option>
                                            <option value="Buleleng">Kerambitan</option>
                                            <option value="Badung">Selemadeg</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Alamat</label>
                                        <input name="alamat" type="text" class="form-control">
                                        <div class="form-text"></div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Model Kerja</label>
                                        <select name="model_kerja" id="defaultSelect" class="form-select">
                                            <option>Pilih model kerja</option>
                                            <option value="WFH">Work From Home</option>
                                            <option value="WFO">Work From Office</option>
                                            <option value="Hybrid">Hybrid</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Tipe loker</label>
                                        <select name="tipe_loker" id="defaultSelect" class="form-select">
                                            <option>Pilih tipe loker</option>
                                            <option value="job_opportunity">Job Opportunity</option>
                                            <option value="internship">Internship</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="defaultSelect" class="form-label">Minimal Pendidikan</label>
                                        <select name="minimal_pendidikan" id="defaultSelect" class="form-select">
                                            <option>Pilih Minimal Pendidikan</option>
                                            <option value="SMA/Sederajat">SMA/
                                                Sederajat</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label for="exampleFormControlTextarea1" class="form-label">Kualifikasi</label>
                                        <textarea name="deskripsi" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="col-mb text-end">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div
                    class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const mulai = document.getElementById('tanggal_mulai');
    const selesai = document.getElementById('tanggal_selesai');
    const today = new Date().toISOString().split('T')[0];

    function syncTanggal() {
        if (!mulai.value) {
            selesai.disabled = true;
            selesai.value = '';
            return;
        }

        selesai.disabled = false;
        selesai.min = mulai.value > today ? mulai.value : today;

        if (selesai.value && selesai.value < selesai.min) {
            selesai.value = '';
        }
    }

    syncTanggal();
    mulai.addEventListener('change', syncTanggal);
});
</script>
@endpush
</x-admin_perusahaan.layout>
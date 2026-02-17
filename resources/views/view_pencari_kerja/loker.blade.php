<x-pencari_kerja.layout>
    <div class="content-wrapper-user">

        <!-- CONTENT -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- FILTER FORM -->
            <div class="row mb-4">


                <div class="col-md-4 mb-4">
                    <label class="form-label">Provinsi</label>
                    <select id="provinsi" name="provinsi" class="form-select">
                        <option value="">Pilih Provinsi</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <label class="form-label">Kabupaten</label>
                    <select id="kabupaten" name="kabupaten" class="form-select" disabled>
                        <option value="">Pilih Kabupaten</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <label class="form-label">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" class="form-select" disabled>
                        <option value="">Pilih Kecamatan</option>
                    </select>
                </div>


                <div class="col-md-3 mb-4">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" placeholder="Masukan posisi jabatan">
                </div>

                <div class="col-md-3 mb-4">
                    <label class="form-label">Tipe Lowongan</label>
                    <select class="form-select">
                        <option selected>Pilih tipe</option>
                        <option>Internship</option>
                        <option>Job Opportunity</option>
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label class="form-label">Model Kerja</label>
                    <select class="form-select">
                        <option selected>Pilih model kerja</option>
                        <option>Work From Office</option>
                        <option>Work From Home</option>
                        <option>Hybrid</option>
                    </select>
                </div>

                <div class="col-md-3 mb-4">
                    <label class="form-label">Minimal Pendidikan</label>
                    <select class="form-select">
                        <option selected>Pilih minimal pendidikan</option>
                        <option>SMA / Sederajat</option>
                        <option>Minimal Pendidikan D1</option>
                        <option>Minimal Pendidikan D2</option>
                        <option>Minimal Pendidikan D3</option>
                        <option>Minimal Pendidikan S1</option>
                        <option>Minimal Pendidikan S2</option>
                        <option>Minimal Pendidikan S3</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-search me-1"></i> Cari Lowongan
                    </button>
                </div>
            </div>
            <!-- LIST LOKER -->
            <div class="row">

                <!-- CARD LOKER -->
                <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
                    <div class="card h-100 loker-card-beranda position-relative">
                        <a href="{{ route('tampilan-loker-pencari-kerja') }}" class="stretched-link"></a>
                        <div class="card-body position-relative">
                            <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>
                            <div class="d-flex align-items-start gap-3 mb-3">
                                <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                                    style="width:60px; height:60px;" class="img-fluid rounded" alt="">
                                <div class="flex-grow-1">

                                    <h6 class="mb-1 d-flex align-items-center gap-2">
                                        <a href="{{ route('profile-perusahaan-pencari-kerja') }}"
                                            class="fw-bold text-dark text-decoration-none position-relative z-3">
                                            DEYSTORY
                                        </a>
                                        <a href="{{ route('profile-perusahaan-pencari-kerja') }}"
                                            class="badge rounded-circle bg-primary  d-flex align-items-center justify-content-center position-relative z-3"
                                            style="width:16px; height:16px; font-size:10px; ">i</a>
                                    </h6>

                                    <p class="mb-1 small">Job Opportunity</p>
                                    <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                                        <i class="bx bx-location-plus"></i>
                                        <span>Jakarta</span>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-9">
                                    <h5 class="mb-3 position-relative">Administrasi</h5>
                                </div>
                                <div class="col-3">
                                    <a href="{{ route('tampilan-loker-pencari-kerja', ['id' => 1]) }}"
                                        class="badge bg-primary position-relative ">
                                        Open
                                    </a>
                                    <a href="{{ route('tampilan-loker-pencari-kerja', ['id' => 1]) }}"
                                        class="badge bg-danger position-relative ">
                                        Close
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <p class="d-flex align-items-start gap-2 mb-1">
                                        <i class="bx bx-buildings"></i>
                                        <span>Work From Office</span>
                                    </p>
                                </div>
                                <div class=" col-md-12 ">
                                    <p class="d-flex align-items-start gap-2 mb-1">
                                        <i class="bx bx-book-reader"></i>
                                        <span>Minimal Pendidikan S1</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item first disabled">
                        <a class="page-link" href="#"><i class="icon-base bx bx-chevrons-left icon-sm"></i></a>
                    </li>
                    <li class="page-item prev disabled">
                        <a class="page-link" href="#"><i class="icon-base bx bx-chevron-left icon-sm"></i></a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item next">
                        <a class="page-link" href="#"><i class="icon-base bx bx-chevron-right icon-sm"></i></a>
                    </li>
                    <li class="page-item last">
                        <a class="page-link" href="#"><i class="icon-base bx bx-chevrons-right icon-sm"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /CONTENT -->

        <!-- FOOTER -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex justify-content-between py-4">
                    ©2026 Yogo & Wahyu
                </div>
            </div>
        </footer>

        <div class="content-backdrop fade"></div>
    </div>


        <script>
            document.addEventListener('DOMContentLoaded', function () {

                const provinsi = document.getElementById('provinsi');
                const kabupaten = document.getElementById('kabupaten');
                const kecamatan = document.getElementById('kecamatan');

                // =========================
                // LOAD PROVINSI
                // =========================
                fetch('https://kanglerian.my.id/api-wilayah-indonesia/api/provinces.json')
                    .then(res => res.json())
                    .then(data => {
                        let opt = '<option value="">Pilih Provinsi</option>';
                        data.forEach(item => {
                            opt += `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                        });
                        provinsi.innerHTML = opt;
                    });

                // =========================
                // LOAD KABUPATEN
                // =========================
                provinsi.addEventListener('change', function () {
                    const id = this.selectedOptions[0]?.dataset.id;

                    kabupaten.innerHTML = '<option value="">Pilih Kabupaten</option>';
                    kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    kabupaten.disabled = true;
                    kecamatan.disabled = true;

                    if (!id) return;

                    fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/regencies/${id}.json`)
                        .then(res => res.json())
                        .then(data => {
                            let opt = '<option value="">Pilih Kabupaten</option>';
                            data.forEach(item => {
                                opt += `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
                            });
                            kabupaten.innerHTML = opt;
                            kabupaten.disabled = false;
                        });
                });

                // =========================
                // LOAD KECAMATAN
                // =========================
                kabupaten.addEventListener('change', function () {
                    const id = this.selectedOptions[0]?.dataset.id;

                    kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    kecamatan.disabled = true;

                    if (!id) return;

                    fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/districts/${id}.json`)
                        .then(res => res.json())
                        .then(data => {
                            let opt = '<option value="">Pilih Kecamatan</option>';
                            data.forEach(item => {
                                opt += `<option value="${item.name}">${item.name}</option>`;
                            });
                            kecamatan.innerHTML = opt;
                            kecamatan.disabled = false;
                        });
                });

            });
        </script>

</x-pencari_kerja.layout>
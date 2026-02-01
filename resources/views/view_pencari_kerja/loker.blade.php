<x-pencari_kerja.layout>
    <div class="content-wrapper-user">

        <!-- CONTENT -->
        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- FILTER FORM -->
            <div class="row mb-4">

                <div class="col-md-4 mb-4">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" placeholder="Masukan posisi jabatan">
                </div>

                <div class="col-md-4 mb-4">
                    <label class="form-label">Kabupaten</label>
                    <select class="form-select">
                        <option selected>Pilih kabupaten</option>
                        <option>Tabanan</option>
                        <option>Badung</option>
                        <option>Buleleng</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <label class="form-label">Kecamatan</label>
                    <select class="form-select">
                        <option selected>Pilih kecamatan</option>
                        <option>Kediri</option>
                        <option>Kerambitan</option>
                        <option>Pupuan</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <label class="form-label">Tipe Lowongan</label>
                    <select class="form-select">
                        <option selected>Pilih tipe</option>
                        <option>Internship</option>
                        <option>Job Opportunity</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <label class="form-label">Model Kerja</label>
                    <select class="form-select">
                        <option selected>Pilih model kerja</option>
                        <option>Work From Office</option>
                        <option>Work From Home</option>
                        <option>Hybrid</option>
                    </select>
                </div>

                <div class="col-md-4 mb-4">
                    <label class="form-label">Minimal Pendidikan</label>
                    <select class="form-select">
                        <option selected>Pilih minimal pendidikan</option>
                        <option>SMA / Sederajat</option>
                        <option>D1</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
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
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">

                            <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>

                            <div class="row align-items-center mb-3">
                                <div class="col-3">
                                    <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div class="col-9">
                                    <h5 class="mb-1">DEYSTORY</h5>
                                    <p class="mb-1">Job Opportunity</p>
                                    <p class="d-flex align-items-center gap-1 mb-0">
                                        <i class="bx bx-location-plus"></i>
                                        <span>Jakarta</span>
                                    </p>
                                </div>
                            </div>
                            <h5 class="mb-3">Administrasi</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-buildings"></i>
                                        <span>Work From Office</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-book-reader"></i>
                                        <span>Minimal Pendidikan S1</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">

                            <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>

                            <div class="row align-items-center mb-3">
                                <div class="col-3">
                                    <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div class="col-9">
                                    <h5 class="mb-1">DEYSTORY</h5>
                                    <p class="mb-1">Job Opportunity</p>
                                    <p class="d-flex align-items-center gap-1 mb-0">
                                        <i class="bx bx-location-plus"></i>
                                        <span>Jakarta</span>
                                    </p>
                                </div>
                            </div>
                            <h5 class="mb-3">Administrasi</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-buildings"></i>
                                        <span>Work From Office</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-book-reader"></i>
                                        <span>Minimal Pendidikan S1</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">

                            <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>

                            <div class="row align-items-center mb-3">
                                <div class="col-3">
                                    <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div class="col-9">
                                    <h5 class="mb-1">DEYSTORY</h5>
                                    <p class="mb-1">Job Opportunity</p>
                                    <p class="d-flex align-items-center gap-1 mb-0">
                                        <i class="bx bx-location-plus"></i>
                                        <span>Jakarta</span>
                                    </p>
                                </div>
                            </div>
                            <h5 class="mb-3">Administrasi</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-buildings"></i>
                                        <span>Work From Office</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-book-reader"></i>
                                        <span>Minimal Pendidikan S1</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">

                            <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>

                            <div class="row align-items-center mb-3">
                                <div class="col-3">
                                    <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div class="col-9">
                                    <h5 class="mb-1">DEYSTORY</h5>
                                    <p class="mb-1">Job Opportunity</p>
                                    <p class="d-flex align-items-center gap-1 mb-0">
                                        <i class="bx bx-location-plus"></i>
                                        <span>Jakarta</span>
                                    </p>
                                </div>
                            </div>
                            <h5 class="mb-3">Administrasi</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-buildings"></i>
                                        <span>Work From Office</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-book-reader"></i>
                                        <span>Minimal Pendidikan S1</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">

                            <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>

                            <div class="row align-items-center mb-3">
                                <div class="col-3">
                                    <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div class="col-9">
                                    <h5 class="mb-1">DEYSTORY</h5>
                                    <p class="mb-1">Job Opportunity</p>
                                    <p class="d-flex align-items-center gap-1 mb-0">
                                        <i class="bx bx-location-plus"></i>
                                        <span>Jakarta</span>
                                    </p>
                                </div>
                            </div>
                            <h5 class="mb-3">Administrasi</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-buildings"></i>
                                        <span>Work From Office</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-book-reader"></i>
                                        <span>Minimal Pendidikan S1</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">

                            <p class="text-end fs-9 mb-2">11 Jan 2026 - 21 Jan 2026</p>

                            <div class="row align-items-center mb-3">
                                <div class="col-3">
                                    <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div class="col-9">
                                    <h5 class="mb-1">DEYSTORY</h5>
                                    <p class="mb-1">Job Opportunity</p>
                                    <p class="d-flex align-items-center gap-1 mb-0">
                                        <i class="bx bx-location-plus"></i>
                                        <span>Jakarta</span>
                                    </p>
                                </div>
                            </div>
                            <h5 class="mb-3">Administrasi</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-buildings"></i>
                                        <span>Work From Office</span>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="d-flex align-items-center gap-1 mb-1">
                                        <i class="bx bx-book-reader"></i>
                                        <span>Minimal Pendidikan S1</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</x-pencari_kerja.layout>
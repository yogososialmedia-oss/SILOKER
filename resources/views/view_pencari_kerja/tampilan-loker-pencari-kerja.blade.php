<x-pencari_kerja.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper-user">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="card loker-card-beranda">
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <p class="text-end mb-1 fs-9">11 Jan 2026 - 21 Jan 2026 </p>
                            <h4 class="mb-1 d-flex align-items-center gap-2">
                                <a href="{{ route('profile-perusahaan-pencari-kerja') }}"
                                    class="fw-bold text-dark text-decoration-none position-relative z-3">
                                    DEYSTORY
                                </a>
                                <a href="{{ route('profile-perusahaan-pencari-kerja') }}"
                                    class="badge rounded-circle d-flex align-items-center justify-content-center position-relative z-3 "
                                    style="width:16px; height:16px; font-size:10px; line-height:1;">i</a>
                            </h4>
                            <h5 class="card-title mb-1">Admin</h5>
                            <H6 class="mb-1">Job Opportunity</H6>
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-location-plus icon-sm"></i>
                                <span>Jakarta</span>
                            </p>
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-buildings icon-sm"></i>
                                <span>Work From Office</span>
                            </p>
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-book-reader icon-sm"></i>
                                <span>Minimal Pendidikan S1</span>
                            </p>
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-show icon-sm"></i>
                                <span>50</span>
                            </p>
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-file icon-sm"></i>
                                <span>30</span>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-5">
                    <div class="card loker-card-beranda ">
                        <div class="card-body">

                            <!-- konten card -->
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Semakin panjang text, card akan otomatis menyesuaikan.
                            </p>

                            <!-- tombol kanan -->
                            <div class="d-flex justify-content-end mt-3">
                                <a href="{{ route('tampilan-loker-pencari-kerja', ['id' => 1]) }}"
                                    class="btn btn-primary">
                                    Apply
                                </a>
                            </div>

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
</x-pencari_kerja.layout>
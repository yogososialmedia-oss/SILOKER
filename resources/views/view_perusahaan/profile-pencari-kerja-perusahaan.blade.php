<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <!-- Thumbnail / Banner -->
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top"
                            style="height:280px; object-fit:cover;">

                        <!-- Overlay Logo & Nama -->
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <img src="{{ asset('admin-perusahaan/assets/img/avatars/logo.png') }}"
                                class="rounded-circle mb-2"
                                style="width:100px; height:100px; object-fit:contain; background:#fff; padding:5px;">
                            <h4 class="fw-bold mb-0 text-white">wqr</h4>
                            <p>220030087</p>
                        </div>
                        <div class="bg-white p-4">
                            <nav class="navbar navbar-expand-lg py-1">
                                <div class="container-fluid">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbar-ex-15">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbar-ex-15">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.profile') ? 'active' : '' }}"
                                                    href="{{ route('pencarikerja.profile') }}">
                                                    Tentang Saya
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.history-apply') ? 'active' : '' }}"
                                                    href="{{ route('pencarikerja.history-apply') }}">
                                                    History Apply
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="bg-white p-4">
                            <h6 class="fw-bold mb-1">Tentang Saya</h6>
                            <p class="mb-2 text-muted">
                                PT. Intim Harmonis Foods Industri, better known as INAFOOD specializes in
                                manufacturing biscuits and wafers. Our company started production in 1997
                                with many various innovations and development intended to create superior
                                quality products according to consumer choice. By holding one of the
                                principles that quality is our customer satisfaction, INAFOOD is committed
                                to quality products to be better known as multinational company
                            </p>
                            <h6 class="fw-bold mb-1">Alamat</h6>
                            <p>Jl.apokaden</p>
                            <h6 class="fw-bold mb-1">Akun Linked.In</h6>
                            <a href="#" class="d-block mb-4 text-primary">
                                Klik di sini untuk melihat profile Linked.In saya
                            </a>
                            <h6 class="fw-bold mb-1">Pendidikan Terakhir</h6>
                            <p>S1</p>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="mb-4">betutu@gmail.com</p>
                            <h6 class="fw-bold mb-1">No.Telp</h6>
                            <p>0897868365463</p>
                            <h6 class="fw-bold mb-1">Curriculum Vitae (CV)</h6>
                            <button type="button" class="btn btn-outline-primary btn-sm mb-4" data-bs-toggle="modal"
                                data-bs-target="#modalCV">
                                Lihat CV
                            </button>
                            <!-- MODAL CV -->
                            <div class="modal fade" id="modalCV" tabindex="-1" aria-labelledby="modalCVLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCVLabel">Curriculum Vitae</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body p-0">
                                            <iframe src="{{ asset('storage/cv/cv.pdf') }}" width="100%" height="600px"
                                                style="border:none;">
                                            </iframe>
                                        </div>

                                    </div>
                                </div>
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
</x-admin_perusahaan.layout>
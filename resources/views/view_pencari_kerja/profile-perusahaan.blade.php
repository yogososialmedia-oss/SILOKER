<x-pencari_kerja.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper-user">
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

                            <h4 class="fw-bold mb-0 text-white">
                                {{ $info_perusahaan->nama_perusahaan ?? '-' }}
                            </h4>
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

                                            {{-- Tentang --}}
                                                <li class="nav-item">
                                                    <a class="navbar-brand nav-underline"
                                                        href="{{ route('pencarikerja.profile.perusahaan') }}">
                                                        Tentang Perusahaan
                                                    </a>
                                                </li>

                                            {{-- Menu kedua --}}
                                                <li class="nav-item">
                                                    <a class="navbar-brand nav-underline "
                                                        href="{{ route('pencarikerja.loker.profile.perusahaan') }}">
                                                        Lowongan Kerja
                                                    </a>
                                                </li>
                                        </ul>
                                    </div>
                            </nav>
                        </div>
                    </div>
                </div>
                {{-- DETAIL PERUSAHAAN --}}
                <div class="col-12 mb-5">
                    <div class="card">
                        <div class="bg-white p-4">

                            <h6 class="fw-bold mb-2">Tentang Perusahaan</h6>
                            <p class="mb-3 text-muted">
                                {{ $info_perusahaan->tentang_perusahaan ?? '-' }}
                            </p>

                            <h6 class="fw-bold mb-2">Alamat</h6>
                            <p>{{ $info_perusahaan->alamat_perusahaan ?? '-' }}</p>

                            @if(!empty($info_perusahaan->alamat_perusahaan))
                                <a href="https://www.google.com/maps/search/{{ urlencode($info_perusahaan->alamat) }}"
                                    target="_blank" class="d-flex align-items-center gap-1 mb-3">
                                    <i class="bx bx-current-location"></i>
                                    <span>View on Google Maps</span>
                                </a>
                            @endif

                            <h6 class="fw-bold mb-2">Email</h6>
                            <p>{{ $info_perusahaan->email_perusahaan ?? '-' }}</p>

                            <h6 class="fw-bold mb-2">No. Telp</h6>
                            <p>{{ $info_perusahaan->no_telp_perusahaan ?? '-' }}</p>

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
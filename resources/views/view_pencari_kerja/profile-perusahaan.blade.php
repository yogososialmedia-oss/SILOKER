<x-pencari_kerja.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper-user">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png') }}" class="card-img-top" style="height:280px; object-fit:cover;">
                        <!-- Overlay Logo & Nama -->
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <img src="{{ $info_perusahaan->logo_url }}" class="rounded-circle mb-2" style="width:100px; height:100px; object-fit:cover; background:#fff; padding:5px;">
                            <h4 class="fw-bold mb-0 text-white"> {{ $info_perusahaan->nama_perusahaan ?? '-' }} </h4>
                        </div>

                        <div class="bg-white p-4">
                            <nav class="navbar navbar-expand-lg py-1">
                                <div class="container-fluid">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-15">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarProfile">
                                        <ul class="navbar-nav mb-2 mb-lg-0 text-end text-lg-start ms-auto ms-lg-0">
                                            <li class="nav-item mb-2">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.profile.perusahaan') ? 'active' : '' }}" href="{{ route('pencarikerja.profile.perusahaan', $info_perusahaan->id) }}"> Tentang Perusahaan </a>
                                            </li>
                                            <li class="nav-item mb-2">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.loker.profile.perusahaan') ? 'active' : '' }}" href="{{ route('pencarikerja.loker.profile.perusahaan', $info_perusahaan->id) }}"> Lowongan Kerja </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- DETAIL PERUSAHAAN --}}
                <div class="col-12 mb-5">
                    <div class="card shadow-sm rounded-4 p-4">
                        <h6 class="fw-bold mb-2">Tentang Perusahaan</h6>
                        <p class="mb-3 text-muted"> {{ $info_perusahaan->tentang_perusahaan ?? '-' }} </p>

                        <h6 class="fw-bold mb-2">Alamat</h6>
                        <p class="mb-2"> {{ $info_perusahaan->alamat_perusahaan ?? '-' }} </p>

                        @if($info_perusahaan->kecamatan || $info_perusahaan->kabupaten || $info_perusahaan->provinsi)
                            <p class="mb-2">
                                @php
                                    $parts = array_filter([
                                        $info_perusahaan->kecamatan,
                                        $info_perusahaan->kabupaten,
                                        $info_perusahaan->provinsi
                                    ]);
                                    echo implode(', ', $parts);
                                @endphp
                            </p>
                        @endif

                        @if(!empty($info_perusahaan->google_maps))
                            <a href="{{ $info_perusahaan->google_maps }}" target="_blank" class="d-flex align-items-center gap-1 mb-3">
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
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0"> ©2026 Yogo & Wahyu </div>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</x-pencari_kerja.layout>
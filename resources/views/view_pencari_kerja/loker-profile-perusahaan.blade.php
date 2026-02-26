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
                            <img src="{{ $info_perusahaan->logo_url }}"
                                class="rounded-circle mb-2"
                                style="width:100px; height:100px; object-fit:cover; background:#fff; padding:5px;">

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

                                            <li class="nav-item mb-2">
                                            <a class="navbar-brand nav-underline 
                                            {{ request()->routeIs('pencarikerja.profile.perusahaan') ? 'active' : '' }}"
                                            href="{{ route('pencarikerja.profile.perusahaan', $info_perusahaan->id) }}">
                                            Tentang Perusahaan
                                            </a>
                                        </li>

                                        <li class="nav-item mb-2">
                                            <a class="navbar-brand nav-underline 
                                            {{ request()->routeIs('pencarikerja.loker.profile.perusahaan') ? 'active' : '' }}"
                                            href="{{ route('pencarikerja.loker.profile.perusahaan', $info_perusahaan->id) }}">
                                            Lowongan Kerja
                                            </a>
                                        </li>
                                        </ul>
                                    </div>
                            </nav>
                        </div>

                    </div>
                </div>
                    @foreach($lokerPerusahaan as $item)
                    <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
                        <div class="card h-100 loker-card-beranda position-relative">
                            <a href="{{ route('pencarikerja.loker.show', $item->id) }}?from=perusahaan&perusahaan_id={{ $info_perusahaan->id }}" 
                                class="stretched-link"></a>
                            <div class="card-body position-relative">
                                <p class="text-end fs-9 mb-2">
                                    {{ \Carbon\Carbon::parse($item->tanggal_mulai_loker)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::parse($item->tanggal_berakhir_loker)->format('d M Y') }}
                                </p>

                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <img src="{{ $item->perusahaanMitra->logo_url }}"
                                        style="width:60px; height:60px; object-fit:cover;"
                                        class="rounded shadow-sm" alt="">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 d-flex align-items-center gap-2">
                                            <a href="#" class="fw-bold text-dark text-decoration-none">{{ $info_perusahaan->nama_perusahaan }}</a>
                                        </h6>
                                        <p class="mb-1 small">{{ $item->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}</p>
                                        <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                                            <i class="bx bx-location-plus"></i>
                                            <span>{{ $item->kabupaten }}</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="mb-0">{{ $item->jabatan }}</h5>
                                    <div class="ms-auto pe-5 me-2">
                                        @if(now()->between($item->tanggal_mulai_loker, $item->tanggal_berakhir_loker))
                                            <span class="badge bg-primary fs-6 px-3 py-2">Open</span>
                                        @else
                                            <span class="badge bg-danger fs-6 px-3 py-2">Close</span>
                                        @endif
                                    </div>
                                </div>

                                <p class="d-flex align-items-start gap-2 mb-1">
                                    <i class="bx bx-buildings"></i> <span>{{ $item->model_kerja }}</span>
                                </p>
                                <p class="d-flex align-items-start gap-2 mb-1">
                                    <i class="bx bx-book-reader"></i> <span>{{ $item->minimal_pendidikan }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
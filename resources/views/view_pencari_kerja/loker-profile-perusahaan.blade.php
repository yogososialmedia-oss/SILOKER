<x-pencari_kerja.layout>
    <div class="content-wrapper-user">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                {{-- Header Profile Perusahaan --}}
                <div class="col-12 mb-5">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <!-- Background header perusahaan -->
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top" style="height:280px; object-fit:cover;">

                        <!-- Logo & Nama Perusahaan di tengah header -->
                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            <img src="{{ $info_perusahaan->logo_url }}" class="rounded-circle mb-2" style="width:100px; height:100px; object-fit:cover; background:#fff; padding:5px;">
                            <h4 class="fw-bold mb-0 text-white">
                                {{ $info_perusahaan->nama_perusahaan ?? '-' }}
                            </h4>
                        </div>

                        <!-- Navbar menu perusahaan -->
                        <div class="bg-white p-4">
                            <nav class="navbar navbar-expand-lg py-1">
                                <div class="container-fluid">
                                    <!-- Burger menu untuk mobile -->
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-15">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <!-- Menu navigasi collapse -->
                                    <div class="collapse navbar-collapse" id="navbar-ex-15">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <!-- Menu Tentang Perusahaan -->
                                            <li class="nav-item mb-2">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.profile.perusahaan') ? 'active' : '' }}" href="{{ route('pencarikerja.profile.perusahaan', $info_perusahaan->id) }}">
                                                    Tentang Perusahaan
                                                </a>
                                            </li>
                                            <!-- Menu Lowongan Kerja -->
                                            <li class="nav-item mb-2">
                                                <a class="navbar-brand nav-underline {{ request()->routeIs('pencarikerja.loker.profile.perusahaan') ? 'active' : '' }}" href="{{ route('pencarikerja.loker.profile.perusahaan', $info_perusahaan->id) }}">
                                                    Lowongan Kerja
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- List Lowongan Kerja --}}
                @foreach($loker as $item)
                    <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
                        <div class="card h-100 loker-card-beranda position-relative">
                            <!-- Link seluruh card ke detail loker -->
                            <a href="{{ route('pencarikerja.loker.show', $item->id) }}?from=perusahaan&perusahaan_id={{ $info_perusahaan->id }}" class="stretched-link"></a>
                            <div class="card-body position-relative">
                                <!-- Tanggal berlaku lowongan -->
                                <p class="text-end fs-9 mb-2">
                                    {{ \Carbon\Carbon::parse($item->tanggal_mulai_loker)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::parse($item->tanggal_berakhir_loker)->format('d M Y') }}
                                </p>

                                <!-- Informasi singkat lowongan -->
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <!-- Logo perusahaan -->
                                    <img src="{{ $item->perusahaanMitra->logo_url }}" style="width:60px; height:60px; object-fit:cover;" class="rounded shadow-sm" alt="">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold d-flex align-items-center gap-2">
                                            <!-- Nama Perusahaan -->
                                            <a href="{{ route('pencarikerja.profile.perusahaan', $info_perusahaan->id) }}" class="text-dark link-primary fw-bold position-relative z-3">
                                                {{ $info_perusahaan->nama_perusahaan }}
                                            </a>
                                            <!-- Icon Info -->
                                            <a href="{{ route('pencarikerja.profile.perusahaan', $info_perusahaan->id) }}" class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-5" style="width:16px; height:16px; font-size:10px; line-height:1;">
                                                i
                                            </a>
                                        </h6>
                                        <!-- Tipe lowongan -->
                                        <p class="mb-1 small">{{ $item->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}</p>
                                        <!-- Lokasi -->
                                        <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                                            <i class="bx bx-location-plus"></i>
                                            <span>{{ $item->kabupaten }}</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Jabatan dan status lowongan -->
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="mb-0">{{ $item->jabatan }}</h5>
                                    <div class="ms-auto pe-5 me-2">
                                        @if($item->status == 'open')
                                            <span class="badge bg-primary fs-6 px-3 py-2">Open</span>
                                        @else
                                            <span class="badge bg-danger fs-6 px-3 py-2">Closed</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Detail pekerjaan -->
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

            {{-- Pagination --}}
            @if ($loker->lastPage() > 1)
                <nav aria-label="Page navigation" class="mt-4">
                    <ul class="pagination justify-content-center">
                        {{-- FIRST --}}
                        <li class="page-item {{ $loker->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $loker->url(1) }}">
                                <i class="icon-base bx bx-chevrons-left icon-sm"></i>
                            </a>
                        </li>

                        {{-- PREV --}}
                        <li class="page-item {{ $loker->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $loker->previousPageUrl() }}">
                                <i class="icon-base bx bx-chevron-left icon-sm"></i>
                            </a>
                        </li>

                        {{-- NUMBER --}}
                        @for ($i = 1; $i <= $loker->lastPage(); $i++)
                            <li class="page-item {{ $loker->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $loker->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        {{-- NEXT --}}
                        <li class="page-item {{ $loker->currentPage() == $loker->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $loker->nextPageUrl() }}">
                                <i class="icon-base bx bx-chevron-right icon-sm"></i>
                            </a>
                        </li>

                        {{-- LAST --}}
                        <li class="page-item {{ $loker->currentPage() == $loker->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $loker->url($loker->lastPage()) }}">
                                <i class="icon-base bx bx-chevrons-right icon-sm"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>

        {{-- Footer --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        <!-- Backdrop konten untuk efek UI -->
        <div class="content-backdrop fade"></div>
    </div>
</x-pencari_kerja.layout>
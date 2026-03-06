<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

                {{-- ================= HEADER PERUSAHAAN / CARD THUMBNAIL ================= --}}
                <div class="col-12 mb-4">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png')}}" class="card-img-top" style="height:280px; object-fit:cover;">

                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                            {{-- LOGO PERUSAHAAN --}}
                            <img src="{{ $info_perusahaan->logo 
                                ? asset('storage/logo_perusahaan/'.$info_perusahaan->logo) 
                                : asset('admin-perusahaan/assets/img/avatars/default_profile_perusahaan.jpg') }}" 
                                class="rounded-circle mb-2" 
                                style="width:100px; height:100px; object-fit:cover; background:#fff; padding:5px;">
                            
                            {{-- NAMA PERUSAHAAN --}}
                            <h4 class="fw-bold mb-0 text-white">
                                {{ $info_perusahaan->nama_perusahaan ?? '-' }}
                            </h4>

                            {{-- STATUS AKUN --}}
                            @if ($info_perusahaan->status_akun === 'pending')
                                <p class="text-warning mb-0">Verifikasi Dalam Proses</p>
                            @elseif ($info_perusahaan->status_akun === 'terverifikasi')
                                <p class="text-white mb-0">Terverifikasi</p>
                            @elseif ($info_perusahaan->status_akun === 'verifikasi_gagal')
                                <p class="text-danger mb-0">Verifikasi Gagal</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- ================= NAVBAR CARD ================= --}}
                <div class="col-12 mb-5">
                    <div class="card position-relative overflow-hidden border-0 shadow-sm rounded-4">
                        <div class="bg-white p-4">
                            <nav class="navbar navbar-expand-lg py-1">
                                <div class="container-fluid">
                                    {{-- TOGGLER UNTUK MOBILE --}}
                                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-15">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="navbar-ex-15">
                                        {{-- MENU NAVBAR --}}
                                        <ul class="navbar-nav mb-2 mb-lg-0 text-end text-lg-start ms-auto ms-lg-0">
                                            {{-- TENTANG PERUSAHAAN --}}
                                            @if (Auth::guard('perusahaanmitra')->user())
                                                <li class="nav-item mb-2">
                                                    <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.profile') ? 'active' : '' }}" href="{{ route('perusahaan.profile') }}">
                                                        Tentang Perusahaan
                                                    </a>
                                                </li>
                                            @elseif (Auth::guard('admin')->user())
                                                <li class="nav-item">
                                                    <a class="navbar-brand nav-underline {{ request()->routeIs('admin.profile-perusahaan') ? 'active' : '' }}" href="{{ route('admin.profile-perusahaan', $info_perusahaan->id) }}">
                                                        Tentang Perusahaan
                                                    </a>
                                                </li>
                                            @endif

                                            {{-- LOWONGAN KERJA --}}
                                            @if (Auth::guard('perusahaanmitra')->user())
                                                <li class="nav-item mb-2">
                                                    <a class="navbar-brand nav-underline {{ request()->routeIs('perusahaan.loker.profile') ? 'active' : '' }}" href="{{ route('perusahaan.loker.profile') }}">
                                                        Lowongan Kerja
                                                    </a>
                                                </li>
                                            @elseif (Auth::guard('admin')->user())
                                                <li class="nav-item mb-2">
                                                    <a class="navbar-brand nav-underline {{ request()->routeIs('admin.lowongan-kerja-perusahaan') ? 'active' : '' }}" href="{{ route('admin.lowongan-kerja-perusahaan', $info_perusahaan->id) }}">
                                                        Lowongan Kerja
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>

                                        {{-- TOMBOL EDIT PROFILE --}}
                                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-end">
                                            @if (Auth::guard('perusahaanmitra')->user())
                                                <li class="nav-item me-2">
                                                    <a href="{{ route('perusahaan.profile.edit') }}" class="btn btn-sm btn-warning">
                                                        Edit Profile
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- ================= LIST LOWONGAN KERJA ================= --}}
                @php
                    $isPerusahaan = Auth::guard('perusahaanmitra')->user();
                @endphp

                @foreach($loker as $item)
                    <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
                        <div class="card h-100 loker-card-beranda position-relative">
                            {{-- LINK STRETCHED --}}
                            <a href="{{ $isPerusahaan ? route('perusahaan.loker.tampilan', $item->id) : route('admin.loker.tampilan', $item->id) }}" class="stretched-link"></a>

                            <div class="card-body position-relative">
                                {{-- TANGGAL LOWONGAN --}}
                                <p class="text-end fs-9 mb-2">
                                    {{ \Carbon\Carbon::parse($item->tanggal_mulai_loker)->format('d M Y') }} - {{ \Carbon\Carbon::parse($item->tanggal_berakhir_loker)->format('d M Y') }}
                                </p>

                                {{-- INFO PERUSAHAAN --}}
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <img src="{{ $item->perusahaanMitra->logo_url }}" style="width:60px; height:60px; object-fit:cover;" class="rounded shadow-sm" alt="">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 d-flex align-items-center gap-2 fw-bold">
                                            @php
                                                $profileRoute = $isPerusahaan ? route('perusahaan.profile') : route('admin.profile-perusahaan', $info_perusahaan->id);
                                            @endphp
                                            <a href="{{ $profileRoute }}" class="text-dark link-primary fw-bold position-relative z-3">
                                                {{ $info_perusahaan->nama_perusahaan }}
                                            </a>
                                            <a href="{{ $profileRoute }}" class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-5" style="width:16px; height:16px; font-size:10px; line-height:1;">
                                                i
                                            </a>
                                        </h6>
                                        <p class="mb-1 small">
                                            {{ $item->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                                        </p>
                                        <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                                            <i class="bx bx-location-plus"></i>
                                            <span>{{ $item->kabupaten }}</span>
                                        </p>
                                    </div>
                                </div>

                                {{-- JABATAN & STATUS --}}
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="mb-0">{{ $item->jabatan }}</h5>
                                    <div class="ms-auto pe-5 me-2">
                                        @if($item->status == 'open')
                                            <span class="badge bg-primary fs-6 px-3 py-2">Open</span>
                                        @else
                                            <span class="badge bg-danger fs-6 px-3 py-2">Close</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- MODEL KERJA --}}
                                <p class="d-flex align-items-start gap-2 mb-1">
                                    <i class="bx bx-buildings"></i>
                                    <span>{{ $item->model_kerja }}</span>
                                </p>

                                {{-- MINIMAL PENDIDIKAN --}}
                                <p class="d-flex align-items-start gap-2 mb-1">
                                    <i class="bx bx-book-reader"></i>
                                    <span>{{ $item->minimal_pendidikan }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ================= PAGINATION ================= --}}
            @if ($loker->lastPage() > 1)
                <nav aria-label="Page navigation">
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

        {{-- ================= FOOTER ================= --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">©2026 Yogo & Wahyu</div>
                </div>
            </div>
        </footer>

        <div class="content-backdrop fade"></div>
    </div>
</x-admin_perusahaan.layout>
<x-admin_perusahaan.layout>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                
                {{-- ================= KARTU INFO SINGKAT (KIRI) ================= --}}
                <div class="col-lg-4 mb-5">
                    <div class="card loker-card-beranda h-100">
                        {{-- POSTER LOKER --}}
                        <img src="{{ asset($loker->poster_loker ?: 'admin-perusahaan/assets/img/backgrounds/default_poster_careercenter.jpg') }}" class="card-img-top" alt="Poster Loker">

                        <div class="card-body">
                            {{-- TANGGAL MULAI DAN BERAKHIR LOKER --}}
                            <p class="text-end mb-1 fs-9">
                                {{ \Carbon\Carbon::parse($loker->tanggal_mulai_loker)->format('d M Y') }} - {{ \Carbon\Carbon::parse($loker->tanggal_berakhir_loker)->format('d M Y') }}
                            </p>

                            {{-- NAMA PERUSAHAAN --}}
                            <h5 class="mb-1 d-flex align-items-center gap-2">
                                @php
                                    $isPerusahaanLogin = Auth::guard('perusahaanmitra')->check();
                                    $isAdminLogin = Auth::guard('admin')->check();
                                    $isOwnProfile = $isPerusahaanLogin && Auth::guard('perusahaanmitra')->id() == $info_perusahaan->id;

                                    if ($isPerusahaanLogin) {
                                        $profileRoute = $isOwnProfile
                                            ? route('perusahaan.profile')
                                            : route('perusahaan.profile.lihat', $info_perusahaan->id);
                                    } elseif ($isAdminLogin) {
                                        $profileRoute = route('admin.profile-perusahaan', $info_perusahaan->id);
                                    } else {
                                        $profileRoute = '#';
                                    }
                                @endphp

                                <a href="{{ $profileRoute }}" class="text-dark link-primary fw-bold position-relative z-3">
                                    {{ $info_perusahaan->nama_perusahaan }}
                                </a>
                                <a href="{{ $profileRoute }}" class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-5" style="width:16px; height:16px; font-size:10px; line-height:1;">
                                    i
                                </a>
                            </h5>

                            {{-- JABATAN DAN STATUS LOKER --}}
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="mb-0 text-truncate" style="max-width: 65%;" title="{{ $loker->jabatan }}">
                                    {{ $loker->jabatan }}
                                </h5>

                                <div class="ms-auto pe-2">
                                    @if($loker->status == 'open')
                                        <span class="badge bg-primary fs-6 px-3 py-2">Open</span>
                                    @else
                                        <span class="badge bg-danger fs-6 px-3 py-2">Close</span>
                                    @endif
                                </div>
                            </div>

                            {{-- TIPE LOKER (JOB / INTERNSHIP) --}}
                            <h6 class="mb-1">
                                {{ $loker->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                            </h6>

                            {{-- LOKASI --}}
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-location-plus icon-sm"></i>
                                <span>{{ $loker->kabupaten }}</span>
                            </p>

                            {{-- MODEL KERJA --}}
                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-buildings"></i>
                                <span>{{ $loker->model_kerja }}</span>
                            </p>

                            {{-- PENDIDIKAN MINIMAL --}}
                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-book-reader"></i>
                                <span>{{ $loker->minimal_pendidikan }}</span>
                            </p>

                            {{-- JUMLAH PELAMAR --}}
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-file icon-sm"></i>
                                <span>{{ $loker->apply_count ?? 0 }} Pelamar</span>
                            </p>

                            {{-- JUMLAH TAYANGAN --}}
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-show icon-sm"></i>
                                <span>{{ $loker->tayangan ?? 0 }} Tayangan</span>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- ================= DESKRIPSI LOKER (KANAN) ================= --}}
                <div class="col-lg-8 mb-5">
                    <div class="card loker-card-beranda">
                        <div class="card-body">
                            {{-- DESKRIPSI LENGKAP LOKER --}}
                            <div class="loker-deskripsi mb-4">
                                {!! $loker->deskripsi ?? '-' !!}
                            </div>

                            {{-- TOMBOL KEMBALI / ACTION --}}
                            <div class="d-flex justify-content-end pt-3 border-top">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- ================= FOOTER ================= --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                        ©2026 Yogo & Wahyu
                    </div>
                </div>
            </div>
        </footer>

        <div class="content-backdrop fade"></div>
    </div>
</x-admin_perusahaan.layout>
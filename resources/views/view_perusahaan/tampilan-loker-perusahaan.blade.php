<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <div class="card loker-card-beranda h-100">

                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/background_profile_perusahaan.png') }}"
                            class="card-img-top" alt="">

                        <div class="card-body">

                            {{-- Tanggal --}}
                            <p class="text-end mb-1 fs-9">
                                {{ \Carbon\Carbon::parse($loker->tanggal_mulai_loker)->format('d M Y') }}
                                -
                                {{ \Carbon\Carbon::parse($loker->tanggal_berakhir_loker)->format('d M Y') }}
                            </p>

                            {{-- Nama Perusahaan --}}
                            <h5 class="mb-1 d-flex align-items-center gap-2">
                                @if (Auth::guard('perusahaanmitra')->user())
                                <a href="{{ route('perusahaan.profile') }}"
                                    class="fw-bold text-dark text-decoration-none position-relative z-3">
                                    {{ $info_perusahaan->nama_perusahaan }}
                                </a>
                                @elseif (Auth::guard('admin')->user())
                                <a href="{{ route('admin.profile-perusahaan', $info_perusahaan->id) }}"
                                    class="fw-bold text-dark text-decoration-none position-relative z-3">
                                    {{ $info_perusahaan->nama_perusahaan }}
                                </a>
                                @endif
                                {{-- Icon info --}}
                                @if ((Auth::guard('perusahaanmitra')->user()))
                                <a href="{{ route('perusahaan.profile') }}"
                                    class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-5"
                                    style="width:16px; height:16px; font-size:10px; line-height:1;">
                                    i
                                </a>
                                @elseif((Auth::guard('admin')->user()))
                                <a href="{{ route('admin.profile-perusahaan', $info_perusahaan->id) }}"
                                    class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-5"
                                    style="width:16px; height:16px; font-size:10px; line-height:1;">
                                    i
                                </a>
                                @endif
                            </h5>
                            
                            {{-- Jabatan + Status --}}
                            <div class="d-flex align-items-center mb-3">
                                <h5 class="mb-0">{{ $loker->jabatan }}</h5>
                                <div class="ms-auto pe-4">
                                    @if(now()->between($loker->tanggal_mulai_loker, $loker->tanggal_berakhir_loker))
                                        <span class="badge bg-primary fs-6 px-3 py-2">Open</span>
                                    @else
                                        <span class="badge bg-danger fs-6 px-3 py-2">Close</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Detail --}}
                            <h6 class="mb-1">
                                {{ $loker->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                            </h6>

                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-location-plus icon-sm"></i>
                                <span>{{ $loker->kabupaten }}</span>
                            </p>

                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-buildings"></i>
                                <span>{{ $loker->model_kerja }}</span>
                            </p>

                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-book-reader"></i>
                                <span>{{ $loker->minimal_pendidikan }}</span>
                            </p>

                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-file icon-sm"></i>
                                <span>{{ $loker->apply_count ?? 0 }} Pelamar</span>
                            </p>

                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-show icon-sm"></i>
                                <span>{{ $loker->tayangan ?? 0 }} Tayangan</span>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-8 mb-5">
                    <div class="card loker-card-beranda">
                        <div class="card-body">

                            {{-- DESKRIPSI LOKER --}}
                            <div class="loker-deskripsi mb-4">
                                {!! $loker->deskripsi ?? '-' !!}
                            </div>

                            {{-- ACTION --}}
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
<x-admin_perusahaan.layout>
    <!-- Content wrapper -->
<div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                @foreach($loker as $item)
                <div class="col-lg-4 mb-5">
                    <div class="card loker-card-beranda h-100">

                        <img src="{{ asset('admin-perusahaan/assets/img/backgrounds/back.png') }}"
                            class="card-img-top" alt="">

                        <div class="card-body">

                            {{-- Tanggal --}}
                            <p class="text-end mb-1 fs-9">
                                {{ \Carbon\Carbon::parse($item->tanggal_mulai_loker)->format('d M Y') }}
                                -
                                {{ \Carbon\Carbon::parse($item->tanggal_berakhir_loker)->format('d M Y') }}
                            </p>

                            {{-- Nama Perusahaan --}}
                            <h4 class="mb-1 d-flex align-items-center gap-2">
                                <a href="{{ route('perusahaan.profile') }}"
                                    class="fw-bold text-dark text-decoration-none">
                                    {{ $info_perusahaan->nama_perusahaan }}
                                </a>
                            </h4>

                            {{-- Jabatan + Status --}}
                            <div class="d-flex align-items-center mb-3">

                                <h5 class="mb-0">
                                    {{ $item->jabatan }}
                                </h5>

                                <div class="ms-auto pe-4">
                                    @if(now()->between($item->tanggal_mulai_loker, $item->tanggal_berakhir_loker))
                                        <span class="badge bg-primary fs-6 px-3 py-2">
                                            Open
                                        </span>
                                    @else
                                        <span class="badge bg-danger fs-6 px-3 py-2">
                                            Close
                                        </span>
                                    @endif
                                </div>

                            </div>

                            {{-- Detail --}}
                            <h6 class="mb-1">
                                {{ $item->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                            </h6>

                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-location-plus icon-sm"></i>
                                <span>{{ $item->kabupaten }}</span>
                            </p>

                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-buildings"></i>
                                <span>{{ $item->model_kerja }}</span>
                            </p>

                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-book-reader"></i>
                                <span>{{ $item->minimal_pendidikan }}</span>
                            </p>

                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-file icon-sm"></i>
                                <span>{{ $item->apply_count ?? 0 }} Pelamar</span>
                            </p>

                        </div>
                    </div>
                </div>
                @endforeach

                <div class="col-lg-8 mb-5">
                    <div class="card loker-card-beranda">
                        <div class="card-body">

                            <h4 class="mb-3">Kualifikasi</h4>
                            <p>
                                {!! nl2br(e($loker->first()->deskripsi ?? '-')) !!}
                            </p>

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
<x-pencari_kerja.layout>

<div class="content-wrapper-user">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">

            {{-- LEFT CARD --}}
            <div class="col-lg-4 mb-5">
                <div class="card loker-card-beranda">

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
                                <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}"
                                    class="fw-bold text-dark text-decoration-none position-relative z-3">
                                    {{ $loker->perusahaanMitra->nama_perusahaan ?? '-' }}
                                </a>
                                {{-- Icon info --}}
                                <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}"
                                    class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-5"
                                    style="width:16px; height:16px; font-size:10px; line-height:1;">
                                    i
                                </a>
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


            {{-- RIGHT CARD --}}
            <div class="col-lg-8 mb-5">
                <div class="card loker-card-beranda">
                    <div class="card-body">

                        <div class="loker-deskripsi mb-4">
                                {!! $loker->deskripsi ?? '-' !!}
                            </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">

                            <a href="{{ route('pencarikerja.loker.index') }}"
                                class="btn btn-secondary">
                                Kembali
                            </a>

                            @if($isOpen)
                                <a href="{{ route('pencarikerja.loker.apply.form', $loker) }}"
                                    class="btn btn-primary">
                                    Apply
                                </a>
                            @endif

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

</x-pencari_kerja.layout>

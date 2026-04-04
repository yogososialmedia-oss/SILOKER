<x-pencari_kerja.layout>
    <div class="content-wrapper-user">
        
        {{-- ALERT NOTIFICATION --}}
        @if (session('success'))
            <div id="successAlert" class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}            
            </div>            
        @endif  
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                
                {{-- LEFT COLUMN: LOKER INFO --}}
                <div class="col-lg-4 mb-5">
                    <div class="card loker-card-beranda h-100">
                        {{-- POSTER LOKER --}}
                        <img src="{{ asset($loker->poster_loker ?? 'admin-perusahaan/assets/img/backgrounds/default_poster_careercenter.jpg') }}" class="card-img-top" alt="">

                        <div class="card-body">
                            {{-- Tanggal Mulai & Berakhir Loker --}}
                            <p class="text-end mb-1 fs-9">
                                {{ \Carbon\Carbon::parse($loker->tanggal_mulai_loker)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($loker->tanggal_berakhir_loker)->format('d M Y') }}
                            </p>

                            {{-- NAMA PERUSAHAAN & INFO --}}
                            <h5 class="mb-1 d-flex align-items-center gap-2" style="min-width:0;">
    
                                <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}"
                                class="text-dark link-primary fw-bold text-truncate d-inline-block"
                                style="max-width: 220px;"
                                title="{{ $loker->perusahaanMitra->nama_perusahaan }}">
                                    {{ $loker->perusahaanMitra->nama_perusahaan }}
                                </a>

                                <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}"
                                class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                style="width:16px; height:16px; font-size:10px;">
                                    i
                                </a>

                            </h5>
                            
                            {{-- JABATAN + STATUS LOKER --}}
                            <div class="d-flex align-items-start mb-3" style="min-width:0;">
    
                                <h5 class="mb-0 flex-grow-1 me-2" 
                                    style="
                                        overflow: hidden;
                                        display: -webkit-box;
                                        -webkit-line-clamp: 2;
                                        -webkit-box-orient: vertical;
                                    "
                                    title="{{ $loker->jabatan }}">
                                    {{ $loker->jabatan }}
                                </h5>

                                <div class="flex-shrink-0">
                                    @if($loker->status == 'open')
                                        <span class="badge bg-primary fs-6 px-3 py-2">Open</span>
                                    @else
                                        <span class="badge bg-warning fs-6 px-3 py-2">Closed</span>
                                    @endif
                                </div>

                            </div>

                            {{-- DETAIL DESKRIPSI SINGKAT --}}
                            <h6 class="mb-1">
                                {{ $loker->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                            </h6>

                            {{-- LOKASI --}}
                            <p class="d-flex align-items-center gap-1 mb-1" style="min-width:0;">
                                <i class="bx bx-location-plus icon-sm"></i>
                                <span class="text-truncate d-inline-block" style="max-width: 200px;" 
                                    title="{{ $loker->kabupaten }}">
                                    {{ $loker->kabupaten }}
                                </span>
                            </p>

                            {{-- MODEL KERJA --}}
                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-buildings"></i>
                                <span>{{ $loker->model_kerja }}</span>
                            </p>

                            {{-- MINIMAL PENDIDIKAN --}}
                            <p class="d-flex align-items-start gap-2 mb-1">
                                <i class="bx bx-book-reader"></i>
                                <span>{{ $loker->minimal_pendidikan }}</span>
                            </p>

                            {{-- JUMLAH PELAMAR --}}
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-file icon-sm"></i>
                                <span>{{ $loker->apply_count ?? 0 }} Pelamar</span>
                            </p>

                            {{-- TAYANGAN LOKER --}}
                            <p class="d-flex align-items-center gap-1 mb-1">
                                <i class="bx bx-show icon-sm"></i>
                                <span>{{ $loker->tayangan ?? 0 }} Tayangan</span>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN: DESCRIPTION & ACTION --}}
                <div class="col-lg-8 mb-5">
                    <div class="card loker-card-beranda">
                        <div class="card-body">

                            {{-- DESKRIPSI LOKER --}}
                            <div class="loker-deskripsi mb-4">
                                {!! $loker->deskripsi ?? '-' !!}
                            </div>

                            {{-- ACTION BUTTONS --}}
                            <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                                @php
                                    $from = request('from');
                                    $isOpen = now()->toDateString() <= \Carbon\Carbon::parse($loker->tanggal_berakhir_loker)->toDateString();
                                @endphp

                                {{-- BUTTON KEMBALI --}}
                                @if($from === 'perusahaan')
                                    <a href="{{ route('pencarikerja.loker.profile.perusahaan', request('perusahaan_id')) }}" class="btn btn-secondary">
                                        Kembali
                                    </a>
                                @else
                                    <a href="{{ route('pencarikerja.loker.index', request()->except(['from','perusahaan_id'])) }}" class="btn btn-secondary">
                                        Kembali
                                    </a>
                                @endif

                                {{-- BUTTON APPLY / TUTUP LOKER --}}
                                @if($isOpen)
                                    <a href="{{ route('pencarikerja.loker.apply.form', $loker) }}" class="btn btn-primary">
                                        Apply
                                    </a>
                                @else
                                    <button class="btn btn-secondary" disabled onclick="alert('Lowongan sudah ditutup.')">
                                        Lowongan Ditutup
                                    </button>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- FOOTER --}}
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

    {{-- SCRIPT UNTUK HILANGKAN ALERT --}}
    @push('scripts')
    <script>
        // Hilangkan alert otomatis setelah 3 detik
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('successAlert');
            if (alert) {
                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 300);
                }, 3000);
            }
        });
    </script>
    @endpush
</x-pencari_kerja.layout>
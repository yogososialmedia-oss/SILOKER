<x-pencari_kerja.layout>
    <div class="content-wrapper-user">

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- FORM FILTER LOWONGAN -->
            <form method="GET" action="{{ route('pencarikerja.loker.index') }}">
                <div class="row mb-4">
                    <!-- FILTER PROVINSI -->
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Provinsi</label>
                        <select id="provinsi" name="provinsi" class="form-select">
                            <option value="{{ $filters['provinsi'] ?? '' }}">Pilih Provinsi</option>
                        </select>
                    </div>

                    <!-- FILTER KABUPATEN -->
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Kabupaten</label>
                        <select id="kabupaten" name="kabupaten" class="form-select" disabled>
                            <option value="{{ $filters['kabupaten'] ?? '' }}">Pilih Kabupaten</option>
                        </select>
                    </div>

                    <!-- FILTER KECAMATAN -->
                    <div class="col-md-4 mb-4">
                        <label class="form-label">Kecamatan</label>
                        <select id="kecamatan" name="kecamatan" class="form-select" disabled>
                            <option value="{{ $filters['kecamatan'] ?? '' }}">Pilih Kecamatan</option>
                        </select>
                    </div>

                    <!-- FILTER JABATAN -->
                    <div class="col-md-3 mb-4">
                        <label class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ $filters['jabatan'] ?? '' }}" class="form-control" placeholder="Masukan posisi jabatan">
                    </div>

                    <!-- FILTER TIPE LOWONGAN -->
                    <div class="col-md-3 mb-4">
                        <label class="form-label">Tipe Lowongan</label>
                        <select name="tipe_loker" class="form-select">
                            <option value="">Pilih tipe</option>
                            <option value="internship" {{ ($filters['tipe_loker'] ?? '') == 'internship' ? 'selected' : '' }}>
                                Internship
                            </option>
                            <option value="job_opportunity" {{ ($filters['tipe_loker'] ?? '') == 'job_opportunity' ? 'selected' : '' }}>
                                Job Opportunity
                            </option>
                        </select>
                    </div>

                    <!-- FILTER MODEL KERJA -->
                    <div class="col-md-3 mb-4">
                        <label class="form-label">Model Kerja</label>
                        <select name="model_kerja" class="form-select">
                            <option value="">Pilih model kerja</option>
                            <option value="Work From Office" {{ request('model_kerja') == 'Work From Office' ? 'selected' : '' }}>
                                Work From Office
                            </option>
                            <option value="Work From Home" {{ request('model_kerja') == 'Work From Home' ? 'selected' : '' }}>
                                Work From Home
                            </option>
                            <option value="Hybrid" {{ request('model_kerja') == 'Hybrid' ? 'selected' : '' }}>
                                Hybrid
                            </option>
                        </select>
                    </div>

                    <!-- FILTER MINIMAL PENDIDIKAN -->
                    <div class="col-md-3 mb-4">
                        <label class="form-label">Minimal Pendidikan</label>
                        <select name="minimal_pendidikan" class="form-select">
                            <option value="">Pilih minimal pendidikan</option>
                            <option value="Minimal Pendidikan SMA/sederajat" {{ request('minimal_pendidikan') == 'Minimal Pendidikan SMA/sederajat' ? 'selected' : '' }}>
                                Minimal Pendidikan SMA / Sederajat
                            </option>
                            <option value="Minimal Pendidikan D1" {{ request('minimal_pendidikan') == 'Minimal Pendidikan D1' ? 'selected' : '' }}>
                                Minimal Pendidikan D1
                            </option>
                            <option value="Minimal Pendidikan D2" {{ request('minimal_pendidikan') == 'Minimal Pendidikan D2' ? 'selected' : '' }}>
                                Minimal Pendidikan D2
                            </option>
                            <option value="Minimal Pendidikan D3" {{ request('minimal_pendidikan') == 'Minimal Pendidikan D3' ? 'selected' : '' }}>
                                Minimal Pendidikan D3
                            </option>
                            <option value="Minimal Pendidikan S1" {{ request('minimal_pendidikan') == 'Minimal Pendidikan S1' ? 'selected' : '' }}>
                                Minimal Pendidikan S1
                            </option>
                            <option value="Minimal Pendidikan S2" {{ request('minimal_pendidikan') == 'Minimal Pendidikan S2' ? 'selected' : '' }}>
                                Minimal Pendidikan S2
                            </option>
                            <option value="Minimal Pendidikan S3" {{ request('minimal_pendidikan') == 'Minimal Pendidikan S3' ? 'selected' : '' }}>
                                Minimal Pendidikan S3
                            </option>
                        </select>
                    </div>
                </div>

                <!-- BUTTON RESET & CARI LOWONGAN -->
                <div class="row mb-5">
                    <div class="col-12 d-flex justify-content-end gap-3">
                        <a href="{{ route('pencarikerja.loker.index', ['reset' => 1]) }}" class="btn btn-secondary px-4">
                            Reset
                        </a>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bx bx-search me-1"></i> Cari Lowongan
                        </button>
                    </div>
                </div>
            </form>

            <!-- LIST LOWONGAN -->
            <div class="row">
                @forelse($lokers as $loker)
                    <div class="col-sm-12 col-md-12 col-lg-6 mb-5">
                        <div class="card h-100 loker-card-beranda position-relative">
                            {{-- LINK CARD KE DETAIL LOWONGAN --}}
                            <a href="{{ route('pencarikerja.loker.show', $loker->id) }}?from=beranda&{{ http_build_query(request()->query()) }}" class="stretched-link"></a>

                            <div class="card-body position-relative">
                                {{-- TANGGAL LOWONGAN --}}
                                <p class="text-end fs-9 mb-2">
                                    {{ $loker->tanggal_mulai_loker->format('d M Y') }}
                                    -
                                    {{ $loker->tanggal_berakhir_loker->format('d M Y') }}
                                </p>

                                {{-- HEADER CARD --}}
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <!-- LOGO PERUSAHAAN -->
                                    <img src="{{ $loker->perusahaanMitra->logo_url }}" style="width:60px; height:60px; object-fit:cover;" class="rounded shadow-sm" alt="">

                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 fw-bold d-flex align-items-center gap-2">
                                            {{-- NAMA PERUSAHAAN --}}
                                            <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}" class="text-dark link-primary fw-bold position-relative z-3">
                                                {{ $loker->perusahaanMitra->nama_perusahaan }}
                                            </a>

                                            {{-- ICON INFO --}}
                                            <a href="{{ route('pencarikerja.profile.perusahaan', $loker->perusahaanMitra->id) }}" class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center position-relative z-5" style="width:16px; height:16px; font-size:10px; line-height:1;">
                                                i
                                            </a>
                                        </h6>

                                        {{-- TIPE LOWONGAN --}}
                                        <p class="mb-1 small">
                                            {{ $loker->tipe_loker == 'job_opportunity' ? 'Job Opportunity' : 'Internship' }}
                                        </p>

                                        {{-- LOKASI --}}
                                        <p class="d-flex align-items-center gap-1 mb-0 small text-muted">
                                            <i class="bx bx-location-plus"></i>
                                            <span>{{ $loker->kabupaten }}</span>
                                        </p>
                                    </div>
                                </div>

                                {{-- JABATAN + STATUS LOWONGAN --}}
                                <div class="d-flex align-items-center mb-3">
                                    <h5 class="mb-0">{{ $loker->jabatan }}</h5>
                                    <div class="ms-auto pe-3">
                                        @if($loker->status == 'open')
                                            <span class="badge bg-primary fs-6 px-3 py-2">Open</span>
                                        @else
                                            <span class="badge bg-warning fs-6 px-3 py-2">Closed</span>
                                        @endif
                                    </div>
                                </div>

                                {{-- DETAIL MODEL KERJA & PENDIDIKAN --}}
                                <p class="d-flex align-items-start gap-2 mb-1">
                                    <i class="bx bx-buildings"></i>
                                    <span>{{ $loker->model_kerja }}</span>
                                </p>
                                <p class="d-flex align-items-start gap-2 mb-1">
                                    <i class="bx bx-book-reader"></i>
                                    <span>{{ $loker->minimal_pendidikan }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <p class="text-muted">Belum ada lowongan tersedia.</p>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            @if ($lokers->lastPage() > 1)
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <!-- FIRST PAGE -->
                        <li class="page-item {{ $lokers->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $lokers->url(1) }}">
                                <i class="icon-base bx bx-chevrons-left icon-sm"></i>
                            </a>
                        </li>
                        <!-- PREVIOUS PAGE -->
                        <li class="page-item {{ $lokers->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $lokers->previousPageUrl() }}">
                                <i class="icon-base bx bx-chevron-left icon-sm"></i>
                            </a>
                        </li>
                        <!-- PAGE NUMBERS -->
                        @for ($i = 1; $i <= $lokers->lastPage(); $i++)
                            <li class="page-item {{ $lokers->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $lokers->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <!-- NEXT PAGE -->
                        <li class="page-item {{ $lokers->currentPage() == $lokers->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $lokers->nextPageUrl() }}">
                                <i class="icon-base bx bx-chevron-right icon-sm"></i>
                            </a>
                        </li>
                        <!-- LAST PAGE -->
                        <li class="page-item {{ $lokers->currentPage() == $lokers->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $lokers->url($lokers->lastPage()) }}">
                                <i class="icon-base bx bx-chevrons-right icon-sm"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>

        {{-- FOOTER --}}
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex justify-content-between py-4">
                    ©2026 Yogo & Wahyu
                </div>
            </div>
        </footer>

        <!-- BACKDROP UNTUK EFFECT UI -->
        <div class="content-backdrop fade"></div>
    </div>

    {{-- SCRIPTS: API WILAYAH INDONESIA --}}
    <script>
        // OLD VALUES untuk form filter
        const oldProvinsi = "{{ $filters['provinsi'] ?? '' }}";
        const oldKabupaten = "{{ $filters['kabupaten'] ?? '' }}";
        const oldKecamatan = "{{ $filters['kecamatan'] ?? '' }}";

        document.addEventListener('DOMContentLoaded', function () {
            const provinsi = document.getElementById('provinsi');
            const kabupaten = document.getElementById('kabupaten');
            const kecamatan = document.getElementById('kecamatan');

            // LOAD PROVINSI DARI API
            fetch('https://kanglerian.my.id/api-wilayah-indonesia/api/provinces.json')
                .then(res => res.json())
                .then(data => {
                    let opt = '<option value="">Pilih Provinsi</option>';
                    data.forEach(item => {
                        const selected = item.name === oldProvinsi ? 'selected' : '';
                        opt += `<option value="${item.name}" data-id="${item.id}" ${selected}>${item.name}</option>`;
                    });
                    provinsi.innerHTML = opt;
                    if (oldProvinsi) provinsi.dispatchEvent(new Event('change'));
                });

            // EVENT CHANGE PROVINSI UNTUK LOAD KABUPATEN
            provinsi.addEventListener('change', function () {
                const id = this.selectedOptions[0]?.dataset.id;
                kabupaten.innerHTML = '<option value="">Pilih Kabupaten</option>';
                kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kabupaten.disabled = true;
                kecamatan.disabled = true;

                if (!id) return;

                fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/regencies/${id}.json`)
                    .then(res => res.json())
                    .then(data => {
                        let opt = '<option value="">Pilih Kabupaten</option>';
                        data.forEach(item => {
                            const selected = item.name === oldKabupaten ? 'selected' : '';
                            opt += `<option value="${item.name}" data-id="${item.id}" ${selected}>${item.name}</option>`;
                        });
                        kabupaten.innerHTML = opt;
                        kabupaten.disabled = false;
                        if (oldKabupaten) kabupaten.dispatchEvent(new Event('change'));
                    });
            });

            // EVENT CHANGE KABUPATEN UNTUK LOAD KECAMATAN
            kabupaten.addEventListener('change', function () {
                const id = this.selectedOptions[0]?.dataset.id;
                kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kecamatan.disabled = true;

                if (!id) return;

                fetch(`https://kanglerian.my.id/api-wilayah-indonesia/api/districts/${id}.json`)
                    .then(res => res.json())
                    .then(data => {
                        let opt = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(item => {
                            const selected = item.name === oldKecamatan ? 'selected' : '';
                            opt += `<option value="${item.name}" ${selected}>${item.name}</option>`;
                        });
                        kecamatan.innerHTML = opt;
                        kecamatan.disabled = false;
                    });
            });
        });
    </script>
</x-pencari_kerja.layout>